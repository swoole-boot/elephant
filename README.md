# elephant
elephant

# [依赖软件包地址](https://github.com/swoole-boot/soft)

* 1.依赖安装方式可以参考上方地址
* 2.具体依赖项可以参考[cockroach/elephant](https://packagist.org/packages/cockroach/elephant)


# swoole-boot微服务架构图
![架构图](https://github.com/swoole-boot/swoole-boot/blob/master/swoole-boot-micro-server.png?raw=true)

# 安装方式

```bash
#composer create-project cockroach/elephant 目录 版本
#如：
composer create-project cockroach/elephant web 1.0.2
```

# 目录介绍

```
-- yourpath       微服务项目目录

  -- rest             restful应用目录
     -- config          yaf项目配置               
     -- application     应用目录             
        -- controllers     控制器           
        -- plugins         扩展  
        -- modules         模块,模块中可以包含控制器,具体可以参考示例程序
          
  -- common           公用逻辑目录
     -- config           配置,注意和yaf配置做区分
     
  -- console          控制台应用
     -- config           yaf项目配置
     -- application      应用目录
```

# rest

* nginx配置文件示例

```nginx
server {
        listen 80;
        server_name rest.elephant.com;
        root /yourpath/elephant/rest/public;
        index index.php;

        try_files $uri $uri/ @rewrite;

        location @rewrite {
            rewrite ^/(.*)  /index.php/$1 last;
        }

        location ~ \.php {
            fastcgi_index  /index.php;
            fastcgi_pass   127.0.0.1:9000;
            include fastcgi_params;
            fastcgi_split_path_info       ^(.+\.php)(/.+)$;
            fastcgi_param PATH_INFO       $fastcgi_path_info;
            fastcgi_param PATH_TRANSLATED $document_root$fastcgi_path_info;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        }

        access_log /tmp/logs/elephant/rest.elephant.com.log main;
}
```

* 访问示例：
```
http://rest.elephant.com/index/index
http://rest.elephant.com/v1/index/index
```

# console

使用方式：

* 格式：
```
/usr/local/php/bin/php index.php [controllerName] [actionName]  [param1] [param2] [paramN]
```

如：
```bash
/usr/local/php/bin/php index.php index cmd 1 2 3
```

# 调用swoole-boot rpc服务

## 1.直接调用，服务地址配置到配置文件中（不推荐）
* 配置组件

```
    'components' => [
            'boot' => [
                'class' => 'cockroach\client\SwooleBoot',
                'host'  => '127.0.0.1',
                'port'  => 888
            ]
    ]
```

* 调用

```
    /**
     * @var \cockroach\client\SwooleBoot $boot
     */
    $boot = Container::get('boot');
    
    $result = $boot->call('func',[
        'name' => 'func'
    ]);
```

* 响应结果

```json
 {
    "code": "20000",
    "message": "success",
    "data": "Hello World"
 }
```

## 2.服务注册到consul调用方式

* swoole-boot服务注册consul方式可以参考[swoole-boot](https://github.com/swoole-boot/swoole-boot)
* lion网关配置方式可以参考[lion](https://github.com/swoole-boot/lion)

```
     /**
     * @var \cockroach\client\Micro $micro
     */
    $micro = Container::get('swoole-boot');

    $result = $micro->call('v1-GetList',[
        'id'     => '1',
        'name'   => 'func get list 20 test',
        'email'  => 'jhq0113@163.com',
        'age'    => 23,
        'mobile' => '13573898909',
        'order'  => '23492348234234'
    ]);
```

* 响应结果

```json
 {
     "func": {
         "id": 1,
         "name": "func get list 20 test",
         "email": "jhq0113@163.com",
         "age": 23,
         "mobile": 13573898909,
         "order": 23492348234234,
         "requestId": "elephant_5d9c59077f7db_eed1d",
         "clientIp": "172.17.0.1",
         "nickname": null,
         "ip": null,
         "sex": null,
         "logo": null,
         "imgUrl": null,
         "call": null,
         "patter": null
     }
 }
```
