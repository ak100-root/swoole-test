
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
    function draw(){
        v.addEventListener('play', function() {
            var i = window.setInterval(function() {
                ctx.drawImage(v, 0, 0, 270, 135);
                WC.send(c.toDataURL('image/jpeg',0.8));
            }, 20);

        }, false);
    }
    draw();

    //链接状态
    WC.onopen=function(event){
        alert('链接成功');
    };
    WC.onmessage=function(event){
        draw();
    };

    WC.onclose=function(event){
        alert('链接关闭');
    };

</script>

</html>
<script>
//    var video = document.getElementById('video');
//    var canvas = document.getElementById('canvas');
//    var content = canvas.getContext('2d');
//   // WC = new WebSocket('ws://121.199.4.90:9501/');

//    function draw(){
//        context.drawImage(video,0,0);
//      //  WC.send(canvas,toDataURL('image/jpeg',0,4));
//        setTimeout(draw,80);
//    }


//    WC = new WebSocket('ws://121.199.4.90:9501/');
//
//    //链接状态
//    WC.onopen=function(event){
//        alert('链接成功');
//    }
//
//    WC.onmessage=function(event){
//        draw();
//    }
//
//    WC.onclose=function(event){
//        alert('链接关闭');
//    }
</script>
