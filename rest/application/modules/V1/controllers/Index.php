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
     * @datetime 2019/9/16 15:13
     * @author roach
     * @email jhq0113@163.com
     */
    public function yacAction()
    {
        /**
         * @var \cockroach\cache\Yac $cache
         */
        $cache = Container::get('yac');

        //$cache->info();       查看yac详情
        //$cache->clear();      清空yac

        $key = uniqid().\cockroach\extensions\EHttp::getClientIp().md5(time());

        //获取缓存
        $item = $cache->getItem($key);
        //是否命中
        if(!($item->isHit())) {
            //设置10秒缓存
            $item->set(time())->expiresAfter(10);
            $cache->save($item);
        }
        //获取缓存值
        $dump['get'] = $item->get();

        //--------------------------------延时设置缓存---------------------------------------------
        $deferItem1 = $cache->getItem('defer1');
        $deferItem2 = $cache->getItem('defer2');
        $deferItem3 = $cache->getItem('defer3');
        $deferItem4 = $cache->getItem('defer4');

        if(!$deferItem1->isHit()) {
            $deferItem1->set(uniqid('defer1'))->expiresAfter(1);
            //放入栈中
            $dump['defer1'] = $cache->saveDeferred($deferItem1);
        }

        if(!$deferItem2->isHit()) {
            $deferItem2->set(uniqid('defer2'))->expiresAfter(2);
            $dump['defer2'] = $cache->saveDeferred($deferItem2);
        }

        if(!$deferItem3->isHit()) {
            $deferItem3->set(uniqid('defer3'))->expiresAfter(3);
            $dump['defer3'] = $cache->saveDeferred($deferItem3);
        }

        if(!$deferItem4->isHit()) {
            $deferItem4->set(uniqid('defer4'))->expiresAfter(4);
            $dump['defer4'] = $cache->saveDeferred($deferItem4);
        }

        //提交defer
        $dump['commit']    = $cache->commit();
        var_dump($dump);
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