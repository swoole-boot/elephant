# elephant
elephant

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
