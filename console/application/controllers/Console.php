<?php
/**
 * Class ConsoleController
 * @datetime 2019/9/10 10:19
 * @author roach
 * @email jhq0113@163.com
 */
class ConsoleController extends \Yaf\Controller_Abstract
{
    /**
     * @var array
     * @datetime 2019/9/10 10:19
     * @author roach
     * @email jhq0113@163.com
     */
    public $params = [];

    /**
     * @datetime 2019/9/10 10:20
     * @author roach
     * @email jhq0113@163.com
     */
    public function init()
    {
        $this->params = $this->_request->getParams();
    }
}