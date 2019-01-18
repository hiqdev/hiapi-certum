<?php
/**
 * hiAPI Certum.eu plugin
 *
 * @link      https://github.com/hiqdev/hiapi-certum
 * @package   hiapi-certum
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2018, HiQDev (http://hiqdev.com/)
 */

$definitions = [
    'certumTool' => [
        '__class' => \hiapi\certum\CertumTool::class,
    ],
];

return class_exists('Yii') ? ['container' => ['definitions' => $definitions]] : $definitions;
