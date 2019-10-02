<?php
use cockroach\extensions\EArray;

/**
 * product环境rest和console共用配置
 */

$common = require __DIR__.'/common.php';

$product = [
    'components' => [
        //yac缓存
        'yac' => [
            'class'  => 'cockroach\cache\Yac',
            'prefix' => 'ele:pro:'
        ]
    ]
];

return EArray::merge($common,$product);