# elephant
elephant

# [依赖软件包地址](https://github.com/swoole-boot/soft)

# swoole-boot微服务架构图
![架构图](https://github.com/swoole-boot/swoole-boot/blob/master/swoole-boot-micro-server.png?raw=true)

# 安装方式

```bash
#composer create-project cockroach/elephant 目录 版本
#如：
composer create-project cockroach/elephant web 1.0.1
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
