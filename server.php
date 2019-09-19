<?php
$serv = new Swoole\Server('121.199.4.90', 9501);
$serv->on('connect', function ($serv, $fd){
    echo $fd."Client:Connect".PHP_EOL;
});
$serv->on('receive', function ($serv, $fd, $from_id, $data) {
    echo $data; //打印 接收到的数据

    $serv->send($fd, "I am swoole"); //发送字符串给客户端

    $serv->close($fd); // 注意：官方并不建议在这里关闭掉
});
$serv->on('close', function ($serv, $fd) {
    echo "Client $fd : Close".PHP_EOL;
});
$serv->start();