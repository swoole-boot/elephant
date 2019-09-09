<?php
/**
 * Class Runtime
 * @datetime 2019/9/9 13:41
 * @author roach
 * @email jhq0113@163.com
 */
class RuntimePlugin extends \Yaf\Plugin_Abstract
{
    /**在路由之前触发
     * @param \Yaf\Request_Abstract $request
     * @param \Yaf\Response_Abstract $response
     * @datetime 2019/9/9 13:42
     * @author roach
     * @email jhq0113@163.com
     */
    public function routerStartup(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response)
    {
    }

    /**路由结束之后触发
     * @param \Yaf\Request_Abstract $request
     * @param \Yaf\Response_Abstract $response
     * @datetime 2019/9/9 13:42
     * @author roach
     * @email jhq0113@163.com
     */
    public function routerShutdown(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response)
    {
    }

    /**分发循环开始之前被触发
     * @param \Yaf\Request_Abstract $request
     * @param \Yaf\Response_Abstract $response
     * @datetime 2019/9/9 13:44
     * @author roach
     * @email jhq0113@163.com
     */
    public function dispatchLoopStartup(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response)
    {
    }

    /**分发之前触发
     * @param \Yaf\Request_Abstract $request
     * @param \Yaf\Response_Abstract $response
     * @datetime 2019/9/9 13:44
     * @author roach
     * @email jhq0113@163.com
     */
    public function preDispatch(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response)
    {
    }

    /**分发结束之后触发
     * @param \Yaf\Request_Abstract $request
     * @param \Yaf\Response_Abstract $response
     * @datetime 2019/9/9 13:44
     * @author roach
     * @email jhq0113@163.com
     */
    public function postDispatch(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response)
    {
    }

    /**分发循环结束
     * @param \Yaf\Request_Abstract $request
     * @param \Yaf\Response_Abstract $response
     * @datetime 2019/9/9 13:44
     * @author roach
     * @email jhq0113@163.com
     */
    public function dispatchLoopShutdown(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response)
    {
    }
}