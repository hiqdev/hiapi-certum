<?php
/**
 * hiAPI Certum.eu plugin
 *
 * @link      https://github.com/hiqdev/hiapi-certum
 * @package   hiapi-certum
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2018, HiQDev (http://hiqdev.com/)
 */


namespace hiapi\certum;

use Closure;
use dot;
use err;
use arr;
use PartnerAPIService;

/**
 * Certum.eu certificate tool.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class CertumTool extends \hiapi\components\AbstractTool
{

    const LANG = 'en';
    public $debug = true;
    protected $service = null;

    protected function connect() {
        if ($this->service === null) {
            set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__DIR__) . '/src/lib/');
            require_once "certumPartnerAPI/service.php";
            $this->service = new PartnerAPIService($this->data['login'], $this->data['password'], $this->debug ? PartnerAPIService::WSDL_TEST : PartnerAPIService::WSDL_PROD, CertumTool::LANG);
            $this->service->setCatchSoapFault(TRUE);
        }

        return $this->service;
    }

    public function request($command, $args = [])
    {
        $this->connect();
        $op = $this->service->{"operation$command"}();
        foreach ($args as $key => $value) {
            $op->{$key}($value);
        }
        $op->call();

        return $this->response($op);
    }

    protected function response($op)
    {
        if ($op->isSuccess()) {
            return [
                'array' => $op->getOutputDataAsArray(),
                'object' => $op,
            ];
        }

        return err::set([], arr::cjoin(arr::get_sub($op->getErrorTexts(), 'text'), '; '));
    }

    /***
      * Getting basic data for certificate
      */
    private function _prepareOrderData($row)
    {
        $contact = $this->_prepareOrderContacts($row);
        if (err::is($contact)) {
            return err::set($row, err::get($contact));
        }

        $contact =  $contact[$row['admin_id']];
        return [
            'setProductCode' => $row['product_no'] + $row['amount'] - 1,
            'setCSR' => $row['csr'],
            'setCustomer' => $contact['client'],
            'setHashAlgorithm' => "SHA2",
            'setEmail' => $contact['email'],
            'setRequestorInfo' => [
                $contact['first_name'],
                $contact['last_name'],
                $contact['email'],
                $contact['phone'],
                strtoupper($contact['country']),
                $contact['postal_code'],
                $contact['city'],
                $contact['street1'],
            ],
            'setLanguage' => CertumTool::LANG,
            'setVerificationNotificationEnabled' => true,
            'addApprover' => [
                $row['fqdn'],
                $row['approver_email'],
                strtoupper($row['dcv_method']),
            ],
            'addSANEntry' => $row['fqdn'],
        ];
    }

    public function certificateGetWebserverTypes()
    {
        return [];
    }

    protected function getProductsList($row)
    {
        $res = $this->request('GetProductList', [
            'setHashAlgorigthm' => true,
        ]);
        if (err::is($res)) {
            return err::set($row, err::get($res));
        }

        return $res;
    }

    protected function _prepareOrderContacts($row)
    {
        if (empty($row['admin_id'])) {
            return err::set($row, 'no data given', ['field' => "admin"]);
        }

        return $this->base->contactsSearch(['ids' => $row['admin_id']]);
    }

    /// GENERAL COMMANDS
    public function certificatesGetAllProducts($jrow = [])
    {
        $res = $this->request('GetProductList', [
            'setHashAlgorigthm' => true,
        ]);
        if (err::is($res)) {
            return err::set($row, err::get($res));
        }

        foreach ($res['array']['getProductListResponse']['products']['product'] as $product) {
            $_res["certum_{$product['code']}"] = [
                'code' => $product['code'],
                'type' => $product['type'],
                'period' => $product['validityPeriod'],
                'defaultHashAlgorithm' => $product['defaultHashAlgorithm'],
                'supportedHashAlgorithms' => $product['supportedHashAlgorithms'],
            ];
        }
        return $_res;
    }

    public function certificateInfo($row)
    {
        $res = $this->request('GetOrderByOrderID', [
            'setOrderID' => $row['remoteid'],
            'setOrderStatus' => true,
            'setCertificateDetails' => true,
            'setOrderDetails' => true,
        ]);

        if (err::is($res)) {
            return err::set($row, err::get($res));
        }

        $cert = $res['object']->getOrders()->certificateDetails;
        if ($cert == null) {
            return $row;
        }

        return [
            'id' => $row['id'],
            'crt_code' => $cert->X509Cert,
            'ca_code' => $op->getCaBundle(),
            'state' => $cert->certificateStatus,
            'begins' => $cert->startDate,
            'expires' => $cert->endDate,
            'serial' => $cert->serialNumber,
        ];
    }

    public function certificateGetDomainEmails($row)
    {
        $res = $this->request('getDomainEmails', [$row['domain']]);
        $emails = [];
        foreach ($res as $list) {
            if (is_array($list)) {
                $emails = array_merge($emails, $list);
            }
        }

        return array_unique($emails);
    }

    /// ISSUE, REISSUE, RENEW
    public function certificateIssue($row = [])
    {
        $data = $this->_prepareOrderData($row);
        if (err::is($data)) {
            return $data;
        }

        foreach ($data as $key => &$value) {
            $value = is_array($value) ? $value : [$value];
        }

        $res = $this->request('QuickOrder', $data);
        if (err::is($res)) {
            return err::set($row, err::get($res));
        }

        $this->request('VerifyDomain', [
            'setCode' => $res['array']['quickOrderResponse']['verifications']['verification']['code'],
        ]);

        return err::is($res) ? err::set($row, err::get($res)) : [
            'order_id' => $res['array']['quickOrderResponse']['orderID'],
            'code' => $res['array']['quickOrderResponse']['verifications']['verification']['code'],
        ];
    }

    public function certificateRenew($row = [])
    {
        $data = $this->_prepareOrderData($row);
        if (err::is($data)) {
            return $data;
        }

        $op = $this->service->operationRenewCertificate();

        return $this->request('addSSLRenewOrder', [$data]);
    }

    public function certificateReissue($row)
    {
        $response = $this->request('reIssueOrder', [$row['order_id'], $row]);

        return $response;
    }

    /// CANCEL
    public function certificateCancel($row)
    {
        return $this->request('cancelSSLOrder', [$row['remoteid'], $row['reason']]);
    }
}
