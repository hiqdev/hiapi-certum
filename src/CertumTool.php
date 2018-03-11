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
}
