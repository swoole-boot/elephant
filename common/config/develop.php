<?php
use cockroach\extensions\EArray;

/**
 * develop环境rest和console共用配置
 */
$common = require __DIR__.'/common.php';

$develop = [
    'components' => [
        'boot' => [
            'class' => 'cockroach\client\SwooleBoot',
            'host'  => '127.0.0.1',
            'port'  => 888,
            //默认使用cockroach\packages\SwooleBoot包 json序列化
            /*'packager' => [
                'class' => 'cockroach\packages\SwooleBoot',
                'serializeId' => '1'
            ]*/
        ],
        'yac' => [
            'class' => 'cockroach\cache\Yac'
        ]
    ]
];

return EArray::merge($common,$develop);