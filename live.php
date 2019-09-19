<?php
/**
 * Created by PhpStorm.
 * User: 虎虎虎
 * Date: 2019-09-19
 * Time: 11:28
 */
?>

<script>
    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var content = canvas.getContext('2d');
    WC = new WebSocket('ws://121.199.4.90:9501/');

    function draw(){
        context.drawImage(video,0,0);
        WC.send(canvas,toDataURL('image/jpeg',0,4));
        setTimeout(draw,80);
    }


    WC = new WebSocket('ws://121.199.4.90:9501/');

    //链接状态
    WC.onopen=function(event){
        alert('链接成功');
    }

    WC.onmessage=function(event){
        draw();
    }

    WC.onclose=function(event){
        alert('链接关闭');
    }
</script>
