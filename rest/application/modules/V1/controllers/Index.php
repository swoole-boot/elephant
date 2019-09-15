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
        $result['getList'] = $boot->call('getList',[
            'name' => 'getList',
            'data' => '粘包测试adfasdfasfdasfasdfasfdasdfasdfasdfasdfasdfasfdasdfasfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
            'data0' => 'adfasdfasfdasfasdfasfdasdfa啥都发发阿斯顿sdfasdfasdfasdfasfdasdfasfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
            'data1' => 'adfasdfasfdasfasdfasfdasdfasdfasdfasdfasdfasfdasdf撒旦法阿萨德萨芬安抚按时asfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
            'data2' => 'adfasdfasfdasfasdfasfdasdfasdf挺好的asdfasdfasdfasfdasdfasfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
            'data3' => 'adfasdfasfdasfasdfasfdasdfasdfasdfasdfasdfasfdasdfasfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
            'data4' => 'adfasdfasfdasfasdfasfdasdfasdfas我也是dfasdfasdfasfdasdfasfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
            'data5' => 'adfasdfasfdasfasdfasfdasdfasdfasdfasdfasdfasfd撒旦法撒旦法是发asdfasfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
            'data6' => 'adfasdfasfdasfasdfasfda所发生的啊sdfasdfasdfasdfasdfasfdasdfasfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
            'data7' => 'adfasdfasfdasfasdfasfdasdfasdfasdfasdfasdfasfdasdfasfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
            'data8' => 'adfasdfasfdasfasdfasfd是的发生按时asdfasdfasdfasdfasdfasfdasdfasfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
            'data9' => 'adfasdfasfdasfasdfasfdasdfasdfasdfasdfasdfasfdasdfasfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
            'data10' => 'adfasdfasfdasfasdfasfd撒旦法asdfasdfasdfasdfasdfasfdasdfasfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
            'data11' => 'adfasdfasfdasfasdfasfdasdfasdfasdfasdfasdfasfdasdfasfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
            'data12' => 'adfasdfasfdasfasdfas是啊啊 ad方法fdasdfasdfasdfasdfasdfasfdasdfasfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
            'data13' => 'adfasdfasfdasfasdfasfdasdfasdfasdfas士大夫撒旦法dfasdfasfdasdfasfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
            'data14' => 'adfasdfasfdasfasdfasfdasdfasdfasdfasdfasdfasfdasdfasfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
            'data15' => 'adfasdfasfdasfasdfasfdasdfasdfasdfasdfa大撒旦法收到sdfasfdasdfasfdasdfasdfasdfsdfasdfasfdasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasf',
        ]);

        $result['func'] = $boot->call('func',[
            'name' => 'func'
        ]);

        exit(json_encode($result,JSON_UNESCAPED_UNICODE));
    }
}