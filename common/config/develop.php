<?php
use cockroach\extensions\EArray;

/**
 * develop环境rest和console共用配置
 */
$common = require __DIR__.'/common.php';

$develop = [
    'components' => [
        //yac缓存
        'yac' => [
            'class' => 'cockroach\cache\Yac',
            'prefix' => 'ele:dev:'
        ],
    ]
];

return EArray::merge($common,$develop);