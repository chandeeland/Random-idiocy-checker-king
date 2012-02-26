<?php if (!array_key_exists('i',$_REQUEST)) { header('Location: /index.php'); } else {$i = $_REQUEST['i']; } ?>
<!DOCTYPE html>
<title>Fun Fun Fun Fun Fun PHD</title>

<style>

body {
    background: black;
}

#c {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: 100%;
}

#v {
    position: absolute;
    top: 50%;
    left: 50%;
    margin: -180px 0 0 -240px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function(){
    var v = document.getElementById('v');
    var canvas = document.getElementById('c');
    var context = canvas.getContext('2d');

    var cw = Math.floor(canvas.clientWidth / 1);
    var ch = Math.floor(canvas.clientHeight / 1);
    canvas.width = cw;
    canvas.height = ch;

    var dancer = document.getElementById('dancer');
    v.addEventListener('play', function(){
        draw(this,canvas,context,cw,ch, dancer, 5);
    },false);

},false);

function draw(v,canvas,c,w,h, dancer, x) {
    var xx= x + 10;
    if(v.paused || v.ended) return false;
    c.drawImage(v,0,0,w,h);
    x += 10;
    if (x > canvas.width - dancer.width) {
	xx = (canvas.width - dancer.width) +((x - (canvas.width - dancer.width)) * -1);
    }
    if (x > 2 * (canvas.width - dancer.width)) x = 0;
    c.drawImage(dancer, xx, canvas.height - dancer.height);
    setTimeout(draw,20,v,canvas,c,w,h, dancer, x);
}

</script>
<img src=/mask.php?i=<?= $i; ?>" id="dancer">
<video id=v autoplay controls loop>
    <source src=video.mp4 type=video/mp4>
</video>
<canvas id=c></canvas>
