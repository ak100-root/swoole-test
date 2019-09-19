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
    <img id="img" width="270" height="135">
    </body>

</html>
<script>

   var img = document.getElementById('img');
    WC = new WebSocket('ws://121.199.4.90:9501/');


    //链接状态
    WC.onopen=function(event){
        alert('链接成功');
    }

    WC.onmessage=function(event){
        img.src=event;
    }

    WC.onclose=function(event){
        alert('链接关闭');
    }
</script>
