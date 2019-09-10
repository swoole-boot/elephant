<?php
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

    /**初始化路由
     * @param \Yaf\Dispatcher $dispatcher
     * @datetime 2019/8/31 4:48 PM
     * @author roach
     * @email jhq0113@163.com
     */
    public function _initRoute(\Yaf\Dispatcher $dispatcher)
    {
        $controller = isset($_SERVER['argv'][1]) ? $_SERVER['argv'][1] : 'index';
        $action     = isset($_SERVER['argv'][2]) ? $_SERVER['argv'][2] : 'cmd';
        $request = new \Yaf\Request\Simple('cli','Index',$controller,$action,array_slice($_SERVER['argv'],3));

        $dispatcher->dispatch($request);
    }

    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initComponents(\Yaf\Dispatcher $dispatcher)
    {

    }
}