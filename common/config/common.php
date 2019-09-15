<?php
return [
    //组件在bootstrap的时候会被初始化到Container,可以直接Container::get()使用
    //如：Container::get('logger')
    'components' => [
        'logger' => [
            'class' => 'cockroach\log\Seaslog',
            'basePath' => '/tmp/logs/elephant',
            'app'   => 'elephant_',
            'level' => 8
        ]
    ]
];