<?php

use cockroach\base\Container;

/**
 * Class CacheController
 * @datetime 2019/9/16 18:30
 * @author roach
 * @email jhq0113@163.com
 */
class CacheController extends \Yaf\Controller_Abstract
{
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
        $dump['items']     = $cache->getItems(['defer1','defer2']);
        var_dump($dump);
    }

    /**
     * @datetime 2019/9/16 18:34
     * @author roach
     * @email jhq0113@163.com
     */
    public function redisAction()
    {
        /**
         * @var \cockroach\cache\Redis $cache
         * @example
        'redis' => [
            'class'   => 'cockroach\cache\Redis',
            //负载算法为根据ip做一致性hash
            'servers' => [
                [
                    "host"    => "127.0.0.1",
                    "port"    => 6379,
                    "auth"    => "",
                    'db'      => 1,
                    'timeout' => 3,
                ],
                [
                    "host"    => "127.0.0.1",
                    "port"    => 6380,
                    "auth"    => "",
                    'db'      => 1,
                    'timeout' => 3,
                ],
            ]
        ],
         */
        $cache = Container::get('redis');

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
        $dump['items']     = $cache->getItems(['defer1','defer2']);
        var_dump($dump);
    }

    /**
     * @datetime 2019/9/17 13:29
     * @author roach
     * @email jhq0113@163.com
     */
    public function lockAction()
    {
        /**
         * @var \cockroach\cache\Redis $redis
         * @example
        'redis' => [
            'class'   => 'cockroach\cache\Redis',
            //负载算法为根据ip做一致性hash
            'servers' => [
                [
                    "host"    => "127.0.0.1",
                    "port"    => 6379,
                    "auth"    => "",
                    'db'      => 1,
                    'timeout' => 3,
                ],
                [
                    "host"    => "127.0.0.1",
                    "port"    => 6380,
                    "auth"    => "",
                    'db'      => 1,
                    'timeout' => 3,
                ],
            ]
        ],
         */
        $redis = Container::get('redis');

        $key = 'lock:Distributed';
        $token = $redis->lock($key,2);
        if($token === false) {
            exit('获得锁失败');
        }

        echo '获得锁成功,token:'.$token.'<br/>';

        //释放锁
        $result = $redis->unlock($key,$token);
        var_dump($result);
    }

    /**
     * @datetime 2019/9/17 14:53
     * @author roach
     * @email jhq0113@163.com
     */
    public function levelAction()
    {
        /**
         * @var \cockroach\cache\Level $level
         * @example
        'level' => [
            'class' => 'cockroach\cache\Level',
            'local' => [
                'class' => 'cockroach\cache\Yac'
            ],
            'redis' => [
                'class'   => 'cockroach\cache\Redis',
                //负载算法为根据ip做一致性hash
                'servers' => [
                    [
                        "host"    => "127.0.0.1",
                        "port"    => 6379,
                        "auth"    => "",
                        'db'      => 1,
                        'timeout' => 3,
                    ],
                ]
            ]
        ]
         */
        $level = Container::get('level');

        $data = $level->get('levels:cache',function(){
            return uniqid();
        });

        exit($data);
    }
}