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
use hiapi\certum\lib\PartnerAPIService;

/**
 * Certum.eu certificate tool.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class CertumTool extends \hiapi\components\AbstractTool
{

    const LANG = 'en';
    public $debug = false;
    protected $service = null;

    public function __construct($base, $data=null)
    {
        parent::__construct($base, $data);
        $this->login();
    }

    protected function login() {
        try {
            if ($this->service === null) {
                $this->service = new PartnerAPIService($this->data['login'], $this->data['password'], $this->debug ? PartnerAPIService::WSDL_TEST : PartnerAPIService::WSDL_PROD, CertumTool::LANG);
                $this->service->setCatchSoapFault(TRUE);
            }
        } catch (PartnerAPIException $e) {
            $this->service = err::set([], $e->getMessage());
        }

        return $this->service;
    }

    protected function request($op)
    {
        $op->call();
        return $op;
    }

    protected function response($op)
    {
        if ($op->isSuccess()) {
            return $op->getOutputDataAsArray();
        }

        return err::set([], arr::cjoin(arr::get_sub($op->getErrorTexts(), 'text'), '; ');
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

        $res = [
            'setCSR' => $row['csr'],
            'setCustomer' => $contact['client'],
            'setHashAlgorithm' => "SHA1",
            'setEmail' => $contact['email'],
            'setRequestorInfo' => [
                $contact['first_name'],
                $contact['last_name'],
                $contact['email'],
                $contact['phone'],
                $contact['country_name'],
                $contact['postal_code'],
                $contact['city'],
                $contact['street1'],
            ],
            'setLanguage' => CertumTool::LANG,
            'setVerificationNotificationEnabled' => true,
            'addApprover' => [
                $row['name'],
                $row['approver_email'],
                $row['dcv_method'],
            ],
        ];
    }

    protected function _prepareOrderContacts($row)
    {
        if (empty($row['admin_id'])) {
            return err::set($row, 'no data given', ['field' => "admin"]);
        }

        return $this->base->contactsSearch('ids' => $row['admin_id']);
    }



    /// GENERAL COMMANDS
    public function certificateInfo($row)
    {
        $op = $this->service->operationGetCertificate();
        $op->setOrderID($row['remoteid']);
        $res = $this->response($this->request($op));
        if (err::is($res)) {
            return err::set($row, err::get($res));
        }

        $cert = $op->getCertificateDetails();

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

        $op = $this->service->operationQuickOrder();
        foreach ($data as $key => $value) {
            call_user_func_array([$op, $key], is_array($value) ? $value : [$value]);
        }

        $res = $this->response($this->request($op));
        return [
            // Init
        ];
    }

    public function certificateRenew($row = [])
    {
        $data = $this->_prepareOrderData($row);
        if (err::is($data)) {
            return $data;
        }

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
