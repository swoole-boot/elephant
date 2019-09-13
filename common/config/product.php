<?php
use cockroach\extensions\EArray;

/**
 * product环境rest和console共用配置
 */

$common = require __DIR__.'/common.php';

$product = [
    'components' => [
        'boot' => [
            'class' => 'cockroach\client\SwooleBoot',
            'host'  => '127.0.0.1',
            'port'  => 888
        ]
    ]
];

return EArray::merge($common,$product);