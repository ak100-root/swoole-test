<?php
$serv = new Swoole\Server('0.0.0.0', 9501);
$serv->on('connect', function ($serv, $fd){
    echo "Client:Connect".PHP_EOL;
});
$serv->on('receive', function ($serv, $fd, $reactor_id, $data) {
    $serv->send($fd, 'Swoole: '.$data);
    $serv->close($fd);
});
$serv->on('close', function ($serv, $fd) {
    echo "Client $fd : Close".PHP_EOL;
});
$serv->start();