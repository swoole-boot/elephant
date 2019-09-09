<?php
/**
 * 定义Application路径
 */
define("APPLICATION_PATH",  dirname(__DIR__));

/**
 *引入应用引导文件
 */
require APPLICATION_PATH.'/config/bootstrap.php';

$app  = new Yaf\Application(ROOT ."/common/conf/application.ini");
$app->bootstrap()
    ->run();