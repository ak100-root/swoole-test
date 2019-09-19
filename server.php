<?php
/**
 * test 1
 * 对应的文档
 * https://wiki.swoole.com/wiki/page/p-server.html
 * https://wiki.swoole.com/wiki/page/142.html
 *
 * 客户端测试：
 * 浏览器火狐 http://121.199.4.90:9501/
 * 或
 * curl 121.199.4.90:9501/
 */

//*
//0.0.0.0 表示同时监听 本机的本地IP地址  和 本机的外网IP地址【如设置为127.0.0.1 则只能内网访问 curl 本机内网IP:9501/ 或者 浏览器】
$serv = new Swoole\Server('0.0.0.0', 9501);
// $fd : 是一个自增数,TCP客户端连接的标识符，在Server实例中是唯一的，在多个进程内不会重复,是复用的，当连接关闭后fd会被新进入的连接复用
//[如果业务中需要发送广播，需要用apc、redis、MySQL、memcache、Swoole\Table将fd的值保存起来。]
$serv->on('connect', function ($serv, $fd){
    echo $fd.":Client:Connect".PHP_EOL;
});
$serv->on('receive', function ($serv, $fd, $from_id, $data) {
    echo $data; //打印 接收到的数据

    $serv->send($fd, 'Default Setting:'.json_encode($serv->setting)); //发送字符串给客户端

    $serv->close($fd); // 注意：官方并不建议在这里关闭掉
});
$serv->on('close', function ($serv, $fd) {
    echo "Client: Close".PHP_EOL;
});
$serv->start();
//*

