<?php
use cockroach\base\Container;

/**
 * 定义Application路径
 */
define("APPLICATION_PATH",  dirname(__DIR__));

/**
 *引入应用引导文件
 */
require APPLICATION_PATH.'/config/bootstrap.php';

$app  = new Yaf\Application(APPLICATION_PATH ."/config/application.ini");

/**
 * 将配置放入容器
 */
Container::set('config',require ROOT.'/common/config/'.$app->environ().'.php');

$app->bootstrap();