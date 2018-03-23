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
            if (is_callable([$op, $key]) ) {
                call_user_func_array([$op, $key], is_array($value) ? $value : [$value]);
            }
        }
        try {
            $op->call();
        } catch (\PartnerAPIException $e) {
            return err::set([], $e->getMessage());
        }

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
    private function _prepareOrderData($row, $shift = 0)
    {
        if (empty($row['admin_id']) && empty($row['client_id'])) {
            return err::set($row, 'no requestor info');
        }

        $row['contact_id'] = isset($row['admin_id']) ? $row['admin_id'] : $row['client_id'];
        $contact = $this->_prepareOrderContacts($row);
        if (err::is($contact)) {
            return err::set($row, err::get($contact));
        }

        $codes = array_flip(include "CertumCertificatesCode.php");
        return array_filter([
            'setProductCode' => $codes[$row['product']] + $row['amount'] - 1 + $shift,
            'setCSR' => $shift === 0 || isset($row['csr']) ? $row['csr'] : null,
            'setCustomer' => $contact['client'],
            'setHashAlgorithm' => "SHA2",
            'setEmail' => $shift === 0 ? $contact['email'] : null,
            'setSerialNumber' => $shift !== 0 && !isset($row['csr']) ? $row['serial'] : null,
            'setRequestorInfo' => $shift === 0 ? [
                $contact['first_name'],
                $contact['last_name'],
                $contact['email'],
                $contact['phone'],
                strtoupper($contact['country']),
                $contact['postal_code'],
                $contact['city'],
                $contact['street1'],
            ] : null,
            'setLanguage' => $shift === 0 ? CertumTool::LANG : null,
            'setVerificationNotificationEnabled' => true,
            'addApprover' => [
                $row['fqdn'],
                $row['approver_email'],
                strtoupper($row['dcv_method'] ? : 'DNS'),
            ],
            'addSANEntry' => $shift === 0 ? $row['fqdn'] : null,
        ]);
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
        $contacts = $this->base->contactsSearch(['ids' => $row['contact_id']]);
        if (err::is($contacts)) {
            return err::set($row, err::get($contacts));
        }

        return array_shift($contacts);
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

        return [
            'order_id' => $res['array']['quickOrderResponse']['orderID'],
            'code' => $res['array']['quickOrderResponse']['verifications']['verification']['code'],
            'name' => $row['fqdn'],
        ];
    }

    public function certificateRenew($row = [])
    {
        if (empty($row)) {
            return err::set($row, 'no data given');
        }

        $data = $this->certificateInfo($row);
        if (err::is($data)) {
            return err::set($row, err::get($data));
        }

        $row = array_merge($row, array_filter($data));
        $data = $this->_prepareOrderData($row, 5);
        if (err::is($data)) {
            return $data;
        }

        $res = $this->request('RenewCertificate', $data);
        if (err::is($res)) {
            return err::set($row, err::get($res));
        }

        return [
            'id' => $row['id'],
            'order_id' => $res['object']->getOrderID(),
            'dns_names' => arr::cjoin(array_keys($res['object']->getVerifications())),
        ];
    }

    public function certificateReissue($row)
    {
        $data = $this->certificateInfo($row);
        if (err::is($data)) {
            return err::set($row, err::get($data));
        }

        $res = $this->request('ReissueCertificate', array_filter([
            'setSerialNumber' => $data['serial'],
            'setHashAlgorithm' => "SHA2",
            'setCSR' => $row['csr'],
        ]));

        if (err::is($res)) {
            return err::set($row, err::get($res));
        }

        return [
            'id' => $row['id'],
            'order_id' => $res['object']->getOrderID(),
        ];
    }

    /// CANCEL
    public function certificateCancel($row)
    {
        return $this->request('CancelOrder', [
            'setOrderID' => $row['remoteid'],
            'setNote' => $row['reason'],
        ]);
    }
}
