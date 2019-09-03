<?php
define("APPLICATION_PATH",  dirname(__DIR__));
define("ROOT",dirname(APPLICATION_PATH));

/**
 * 引入composer autoload
 */
require ROOT.'/vendor/autoload.php';

$app  = new Yaf\Application(ROOT ."/common/conf/application.ini");
$app->bootstrap();