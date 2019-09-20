<?php

use cockroach\base\Container;

/**
 * Class Model
 * @datetime 2019/9/19 19:26
 * @author roach
 * @email jhq0113@163.com
 */
class ModelController extends \Yaf\Controller_Abstract
{
    /**
     * @datetime 2019/9/20 9:50
     * @author roach
     * @email jhq0113@163.com
     */
    public function createAction()
    {
        /**
         * @var \cockroach\client\SwooleBoot $boot
         */
        $boot = Container::get('boot');
        $result = $boot->call('logic\Create',[
            'phone' => '13589656986',
            'username' => uniqid(),
            'truename' => md5(uniqid())
        ]);
        exit(json_encode($result,JSON_UNESCAPED_UNICODE));
    }

    /**
     * @datetime 2019/9/20 11:11
     * @author roach
     * @email jhq0113@163.com
     */
    public function updateAction()
    {
        /**
         * @var \cockroach\client\SwooleBoot $boot
         */
        $boot = Container::get('boot');
        $result = $boot->call('logic\Update',[
            'id'       => 1,
            'username' => uniqid(),
            'truename' => md5(uniqid())
        ]);
        exit(json_encode($result,JSON_UNESCAPED_UNICODE));
    }

    /**
     * @datetime 2019/9/20 11:31
     * @author roach
     * @email jhq0113@163.com
     */
    public function infoAction()
    {
        /**
         * @var \cockroach\client\SwooleBoot $boot
         */
        $boot = Container::get('boot');
        $result = $boot->call('logic\Info',[
            //'id' => 1
        ]);
        exit(json_encode($result,JSON_UNESCAPED_UNICODE));
    }

    /**
     * @datetime 2019/9/20 9:46
     * @author roach
     * @email jhq0113@163.com
     */
    public function indexAction()
    {
        /**
         * @var \cockroach\client\SwooleBoot $boot
         */
        $boot = Container::get('boot');
        $result = $boot->call('logic\Index',[]);
        exit(json_encode($result,JSON_UNESCAPED_UNICODE));
    }

    /**
     * @datetime 2019/9/20 11:32
     * @author roach
     * @email jhq0113@163.com
     */
    public function removeAction()
    {
        /**
         * @var \cockroach\client\SwooleBoot $boot
         */
        $boot = Container::get('boot');
        $result = $boot->call('logic\Remove',[
            'id' => '1'
        ]);

        exit(json_encode($result,JSON_UNESCAPED_UNICODE));
    }

    /**
     * @datetime 2019/9/20 11:35
     * @author roach
     * @email jhq0113@163.com
     */
    public function deleteAction()
    {
        /**
         * @var \cockroach\client\SwooleBoot $boot
         */
        $boot = Container::get('boot');
        $result = $boot->call('logic\Delete',[
            'id' => '1'
        ]);
        exit(json_encode($result,JSON_UNESCAPED_UNICODE));
    }
}