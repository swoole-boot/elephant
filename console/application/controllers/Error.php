<?php

use cockroach\extensions\ECli;

/**
 * Class ErrorController
 * @datetime 2019/9/9 13:21
 * @author roach
 * @email jhq0113@163.com
 */
class ErrorController extends \Yaf\Controller_Abstract
{
    /**
     * @param \Exception $exception
     * @datetime 2019/9/9 13:23
     * @author roach
     * @email jhq0113@163.com
     */
    public function errorAction($exception)
    {
        ECli::error($exception->getMessage());
    }
}