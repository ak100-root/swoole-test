<?php
/**
 * Created by PhpStorm.
 * User: 虎虎虎
 * Date: 2019-09-19
 * Time: 10:47
 */
$server = new swoole_websocket_server('0.0.0.0',9501);

$server->on('message',function($server,$frame){
    $con = $server->connection_list();
    foreach( $con as $fd){
        $server->push($fd,$frame->data);
    }
});
$server->start();