<?php
/**
 * Created by PhpStorm.
 * User: Jiang Haiqiang
 * Date: 2019/10/2
 * Time: 12:54 PM
 */
use cockroach\base\Container;

/**
 * Class Micro
 * @datetime 2019/10/2 12:54 PM
 * @author roach
 * @email jhq0113@163.com
 */
class MicroController extends \Yaf\Controller_Abstract
{
    /**依赖lion网关传送配置
     * @throws \cockroach\exceptions\ConfigException
     * @throws \cockroach\exceptions\RuntimeException
     * @datetime 2019/10/2 12:56 PM
     * @author roach
     * @email jhq0113@163.com
     */
    public function indexAction()
    {
        /**
         * @var \cockroach\client\Micro $micro
         */
        $micro = Container::get('micro:boot');

        $result['func'] = $micro->call('v1-getList',[
            'id'     => '1',
            'name'   => 'func get list 20 test',
            'email'  => 'jhq0113@163.com',
            'age'    => 23,
            'mobile' => '13573898909',
            'order'  => '23492348234234'
        ]);

        exit(json_encode($result,JSON_UNESCAPED_UNICODE));
    }
}