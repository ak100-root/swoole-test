<?php
/**
 * Created by PhpStorm.
 * User: 虎虎虎
 * Date: 2019-09-19
 * Time: 11:28
 */
?>

<script>
    WC = new WebSocket('ws://121.199.4.90:9501/');

    //链接状态
    WC.onopen=function(event){
        alert('链接成功');
    }

    WC.onmessage=function(event){
        alert('链接成功');
    }
</script>
