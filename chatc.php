
<!DOCTYPE html>
<html>

<body>
<video id="video1" controls width="270" autoplay src="m.mp4"></video>

<canvas id="myCanvas" width="270" height="135"></canvas>
</body>
<script>

    WC = new WebSocket('ws://121.199.4.90:9501/');
    var v = document.getElementById("video1");
    var c = document.getElementById("myCanvas");
    ctx = c.getContext('2d');

    //链接状态
    WC.onopen=function(event){
        alert('链接成功');
    };
    WC.onmessage=function(event){
        v.addEventListener('play', function() {
            var i = window.setInterval(function() {
                ctx.drawImage(v, 0, 0, 270, 135);
                WC.send(c.toDataURL('image/jpeg',0.8));
            }, 20);

        }, false);
    };

    WC.onclose=function(event){
        alert('链接关闭');
    };

</script>

</html>
<
