<?php

use cockroach\base\Container;

/**
 * Class Index
 * @datetime 2019/9/9 14:16
 * @author roach
 * @email jhq0113@163.com
 */
class IndexController extends \Yaf\Controller_Abstract
{
    /**
     * @datetime 2019/9/9 14:16
     * @author roach
     * @email jhq0113@163.com
     */
    public function indexAction()
    {
        echo "Welcome to V1";
    }

    /**
     * @datetime 2019/9/13 17:28
     * @author roach
     * @email jhq0113@163.com
     */
    public function bootAction()
    {

        /**
         * @var \cockroach\client\SwooleBoot $boot
         */
        $boot = Container::get('boot');

        $result['func'] = $boot->call('func',[
            'name' => 'func'
        ]);

        exit(json_encode($result,JSON_UNESCAPED_UNICODE));
    }
}