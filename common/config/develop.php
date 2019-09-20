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
            'packager' => [
                'class' => 'cockroach\packages\SwooleBoot',
                'serializeId' => '2'
            ]
        ],
        //yac缓存
        'yac' => [
            'class' => 'cockroach\cache\Yac'
        ],
        //redis缓存
        'redis' => [
            'class'   => 'cockroach\cache\Redis',
            //负载算法为根据ip做一致性hash
            'servers' => [
                [
                    "host"    => "10.16.49.100",
                    "port"    => 13006,
                    "auth"    => "browser@360",
                    'db'      => 1,
                    'timeout' => 3,
                ],
                [
                    "host"    => "10.203.151.157",
                    "port"    => 1222,
                    "auth"    => "71ad83e43c8252af",
                    'db'      => 1,
                    'timeout' => 3,
                ],
            ]
        ],
        //多级缓存
        'level' => [
            'class' => 'cockroach\cache\Level',
            'local' => [
                'class' => 'cockroach\cache\Yac'
            ],
            'redis' => [
                'class'   => 'cockroach\cache\Redis',
                //负载算法为根据ip做一致性hash
                'servers' => [
                    [
                        "host"    => "10.203.151.157",
                        "port"    => 1222,
                        "auth"    => "71ad83e43c8252af",
                        'db'      => 1,
                        'timeout' => 3,
                    ],
                ]
            ]
        ]
    ]
];

return EArray::merge($common,$develop);