<?php

use cockroach\extensions\ECli;

/**
 * Class IndexController
 * @datetime 2019/8/31 4:45 PM
 * @author roach
 * @email jhq0113@163.com
 */
class IndexController extends ConsoleController
{
    /**
     * @datetime 2019/9/10 10:07
     * @author roach
     * @email jhq0113@163.com
     */
    public function cmdAction()
    {
        ECli::info('Welcome to console!');
        ECli::warn('params:'.json_encode($this->params,JSON_UNESCAPED_UNICODE));
    }
}