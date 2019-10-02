<?php
use cockroach\base\Container;

/**
 * Class Bootstrap
 * @datetime 2019/8/31 4:42 PM
 * @author roach
 * @email jhq0113@163.com
 */
class Bootstrap extends \Yaf\Bootstrap_Abstract
{
    /**
     * 引用trait
     */
    use \cockroach\events\Event;

    /**禁用视图
     * @param \Yaf\Dispatcher $dispatcher
     * @datetime 2019/8/31 4:53 PM
     * @author roach
     * @email jhq0113@163.com
     */
    public function _initView(\Yaf\Dispatcher $dispatcher)
    {
        $dispatcher->autoRender(false);
        $dispatcher->disableView();
    }

    /**初始化微服务
     * @param \Yaf\Dispatcher $dispatcher
     * @datetime 2019/10/2 12:00 PM
     * @author roach
     * @email jhq0113@163.com
     */
    public function _initMicro(\Yaf\Dispatcher $dispatcher)
    {
        $headerKey = $dispatcher->getApplication()->getConfig()->micro->headerKey;

        if(isset($_SERVER[ $headerKey ])) {
            $microServices = json_decode($_SERVER[ $headerKey ],true);
            if(is_array($microServices)) {
                foreach ($microServices as $serviceName => $servers) {
                    //如果设置了协议
                    if(isset($servers[0]['protocol'])) {
                        //将服务注册到容器
                        Container::set($serviceName,[
                            'class' => 'cockroach\client\Micro',
                            'servers' => $servers
                        ]);
                    }
                }
            }
        }
    }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initComponents(\Yaf\Dispatcher $dispatcher)
    {
        $components = Container::get('config')['components'];
        foreach ($components as $key => $config) {
            Container::set($key,$config);
        }
    }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @datetime 2019/9/10 14:00
     * @author roach
     * @email jhq0113@163.com
     */
    public function _initPlugin(\Yaf\Dispatcher $dispatcher)
    {
        //注册生命周期钩子
        $dispatcher->registerPlugin(new RuntimePlugin());
    }
}