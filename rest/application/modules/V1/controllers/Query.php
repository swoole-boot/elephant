<?php

/**
 * Class QueryController
 * @datetime 2019/9/18 11:41
 * @author roach
 * @email jhq0113@163.com
 */
class QueryController extends \Yaf\Controller_Abstract
{
    /**
     * @datetime 2019/9/18 11:45
     * @author roach
     * @email jhq0113@163.com
     */
    public function sqlAction()
    {
        $query = new \cockroach\orm\Query();
        $sql['AND']['sql'] = $query->from('users')
            ->where([
                'add_time BETWEEN' => [
                    1568778316,
                    1568779316
                ],
                'id' => 6,
            ])
            ->sql();

        $sql['AND']['params'] = $query->getParams();

        $sql['OR']['sql'] = $query->from('users')
            ->where([
                'name LIKE' => '%哈哈%',
                'id' => [
                    7,
                    8,
                    9
                ],
                'age <>' => 18
            ],true)
            ->group([
                'id',
                'age'
            ])
            ->order([
                'age',
                'id'       => SORT_DESC,
                'add_time' => SORT_ASC
            ])
            ->sql();
        $sql['OR']['params'] = $query->getParams();

        exit(json_encode($sql,JSON_UNESCAPED_UNICODE));
    }
}