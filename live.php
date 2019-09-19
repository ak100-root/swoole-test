<?php
/**
 * Created by PhpStorm.
 * User: 虎虎虎
 * Date: 2019-09-19
 * Time: 11:28
 */
?>
<html>
    <body>
    <canvas id="myCanvas" width="270" height="135"></canvas>

    </body>

</html>
<script>

    var canvas = document.getElementById('myCanvas');
    var content = canvas.getContext('2d');
    WC = new WebSocket('ws://121.199.4.90:9501/');


    //链接状态
    WC.onopen=function(event){
        alert('链接成功');
    }

    WC.onmessage=function(event){
        console.log(event);
        //content.drawImage(event, 0, 0, 270, 135);
    }

    WC.onclose=function(event){
        alert('链接关闭');
    }
</script>
