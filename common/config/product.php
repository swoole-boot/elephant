<?php
use cockroach\extensions\EArray;

/**
 * product环境rest和console共用配置
 */

$common = require __DIR__.'/common.php';

$product = [

];

return EArray::merge($common,$product);