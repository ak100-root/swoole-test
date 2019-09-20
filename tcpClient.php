<?php
$client = new swoole_client(SWOOLE_SOCK_TCP);
$conn = $client->connect('121.199.4.90',9501);
if(!$conn){
    exit ('链接失败');
}
$client->send(' hahaha');
echo $client->recv() . PHP_EOL;
$client->close();