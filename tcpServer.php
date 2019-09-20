<?php
$swoole = new swoole_server('0.0.0.0','9501');

$swoole->on('connect',function($ser,$fd){
    echo 'Client number '.$fd .' is clienting'.PHP_EOL;
});

$swoole->on('receive',function($ser,$fd,$from_id,$data){
        echo 'Client number '.$fd .'send info is ['.$data.'] '.PHP_EOL;
});

$swoole->on('close',function($ser,$fd){
    echo 'Client number '.$fd .' is closed'.PHP_EOL;
});

$swoole->start();