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