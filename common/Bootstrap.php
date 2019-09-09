<?php
namespace common;

/**注意，common下的_init*方法 在 application中的_init*方法执行后 再执行
 * Class Bootstrap
 * @package common
 * @datetime 2019/8/31 4:52 PM
 * @author roach
 * @email jhq0113@163.com
 */
class Bootstrap extends  \Yaf\Bootstrap_Abstract
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
}