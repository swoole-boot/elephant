<?php
use cockroach\extensions\EArray;

/**
 * develop环境rest和console共用配置
 */
$common = require __DIR__.'/common.php';

$develop = [

];

return EArray::merge($common,$develop);