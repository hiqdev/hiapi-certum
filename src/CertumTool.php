<?php
/**
 * hiAPI Certum.eu plugin
 *
 * @link      https://github.com/hiqdev/hiapi-certum
 * @package   hiapi-certum
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2018, HiQDev (http://hiqdev.com/)
 */

namespace hiapi\gogetssl;

/**
 * Certum.eu certificate tool.
 *
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class CertumTool extends \hiapi\components\AbstractTool
{
    protected $api;

    protected $isConnected = null;

    public function __construct($base, $data=null)
    {
        parent::__construct($base, $data);
    }

    /// LOGIN, REQUEST, RESPONSE
    private function login()
    {
        set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__DIR__) . '/lib');
        require_once('certumPartnerAPI/service.php');
        $this->api = new PartnerAPIService($this->data['login'], $this->data['password']);
    }

    private function request($command, $args = [], $loginRequired = false)
    {
        if ($this->isConnected === null) {
            $this->isConnected = $this->login();
        }
        if ($this->isError($this->isConnected, $loginRequired)) {
            return $this->isConnected;
        }

        $res = call_user_func_array([$this->api, $command], $args);

        return $this->response(['command' => $command, 'args' => $args], $res, $loginRequired);
    }

    private function response($data = [], $res = null, $loginRequired = false)
    {
        if (err::is($res)) {
            return $res;
        }
        if ($this->isError($res, $loginRequired)) {
            return err::set($data, $res['description'] ?: 'unknown error');
        }
        if (empty($res)) {
            return err::set($data, 'empty response');
        }

        return $res;
    }

    /// GENERAL COMMANDS
    public function certificateInfo($row)
    {
        $info = $this->request('getOrderStatus', [$row['remoteid']]);
        if (err::is($info)) {
            return $info;
        }
        $info['name'] = $info['domain'];
        $info['begins'] = $info['valid_from'] === '0000-00-00' ? '' : $info['valid_from'];
        $info['expires'] = $info['valid_till'] === '0000-00-00' ? '' : $info['valid_till'];

        return $info;
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

        return $this->request('addSSLOrder', [$data]);
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
