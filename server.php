<?php
/**
 * test 1
 * 对应的文档
 * https://wiki.swoole.com/wiki/page/p-server.html
 * https://wiki.swoole.com/wiki/page/142.html
 *
 * 客户端测试： 浏览器火狐 http://121.199.4.90:9501/
 */
$serv = new Swoole\Server('0.0.0.0', 9501);
$serv->on('connect', function ($serv, $fd){
    echo $fd."Client:Connect".PHP_EOL;
});
$serv->on('receive', function ($serv, $fd, $from_id, $data) {
    echo $data; //打印 接收到的数据

    $serv->send($fd, 'Default Setting：'.json_encode($serv->setting)); //发送字符串给客户端

    $serv->close($fd); // 注意：官方并不建议在这里关闭掉
});
$serv->on('close', function ($serv, $fd) {
    echo "Client: Close.\n";
});
$serv->start();

