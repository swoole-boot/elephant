<?php
/**
 * Class Bootstrap
 * @datetime 2019/8/31 4:42 PM
 * @author roach
 * @email jhq0113@163.com
 */
class Bootstrap extends \common\Bootstrap
{
    /**
     * @param \Yaf\Dispatcher $dispatcher
     * @author Jiang Haiqiang
     * @email  jhq0113@163.com
     */
    public function _initComponents(\Yaf\Dispatcher $dispatcher)
    {
        //注册生命周期钩子
        $dispatcher->registerPlugin(new RuntimePlugin());
    }
}