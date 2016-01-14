<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo ($data["myname"]); ?>与<?php echo ($data["taname"]); ?>的❤爱情树❤ - So爱</title>

<link type="text/css" rel="stylesheet" href="<?php echo (RES_HOME); ?>css/default.css">
<script type="text/javascript" src="<?php echo (RES_HOME); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo (RES_HOME); ?>js/jscex.min.js"></script>
<script type="text/javascript" src="<?php echo (RES_HOME); ?>js/jscex-parser.js"></script>
<script type="text/javascript" src="<?php echo (RES_HOME); ?>js/jscex-jit.js"></script>
<script type="text/javascript" src="<?php echo (RES_HOME); ?>js/jscex-builderbase.min.js"></script>
<script type="text/javascript" src="<?php echo (RES_HOME); ?>js/jscex-async.min.js"></script>
<script type="text/javascript" src="<?php echo (RES_HOME); ?>js/jscex-async-powerpack.min.js"></script>
<script type="text/javascript" src="<?php echo (RES_HOME); ?>js/functions.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo (RES_HOME); ?>js/love.js" charset="utf-8"></script>
<style type="text/css"><!--
.STYLE1 {color: #666666}
--></style>

<style type="text/css">
    body,h1,ul{margin:0;}
    #header{width:100%;border-top:solid 1px #D74452;border-bottom:solid 1px #D74452;text-align:center;}
    h1{padding:10px 0;color:#D74452;}
    .nav{text-align:center;}
    .nav button, .button:visited {
    background: #D74452 url(overlay.png) repeat-x;
    display: inline-block;
    padding: 8px 14px 9px;
    font-size: 34px;
    color: #fff;
    text-decoration: none;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
    -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
    text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
    border-bottom: 1px solid rgba(0,0,0,0.25);
    position: relative;
    cursor: pointer
}

</style>
<!--百度统计-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?53ed1c7812649230cc03576b2ed13626";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</head>
<body>

<div id="header"><h1><?php echo ($data["myname"]); ?>与<?php echo ($data["taname"]); ?>的❤爱情树❤</h1></div><!--header-->
<div class="nav">
        <a href="/love/index.php/Home/Index/register"><button>点击种下我们的爱情树</button><a>
        <button onclick="openNewDiv(1)">点击生成爱情树二维码</button>
</div>

<audio autoplay="autopaly">
<source src="<?php echo (RES_HOME); ?>mp3/1.mp3" type="audio/mp3"/>
</audio>
<div id="main">
<div id="error">本页面采用HTML5编辑，目前您的浏览器无法显示，请换成谷歌(<a href="http://www.google.cn/chrome/intl/zh-CN/landing_chrome.html?hl=zh-CN&brand=CHMI">Chrome</a>)或者火狐(<a href="http://firefox.com.cn/download/">Firefox</a>)浏览器，或者其他游览器的最新版本。</div>
<div id="wrap">
<div id="text">
<div id="code">
<?php if(is_array($data['content'])): foreach($data['content'] as $key=>$v): ?><span class="say"><?php echo ($v); ?></span><br>
<span class="say"> </span><br><?php endforeach; endif; ?>
</div>
</div>
<div id="clock-box">
<?php echo ($data["myname"]); ?><span class="STYLE1">与</span> <?php echo ($data["taname"]); ?><span class="STYLE1">已经相识了</span>
<div id="clock"></div>
</div>
<canvas id="canvas" width="1100" height="680"></canvas>
</div>
</div>
<script>
    (function(){
        var canvas = $('#canvas');
		
        if (!canvas[0].getContext) {
            $("#error").show();
            return false;
        }
        var width = canvas.width();
        var height = canvas.height();
        
        canvas.attr("width", width);
        canvas.attr("height", height);
        var opts = {
            seed: {
                x: width / 2 - 20,
                color: "rgb(190, 26, 37)",
                scale: 2
            },
            branch: [
                [535, 680, 570, 250, 500, 200, 30, 100, [
                    [540, 500, 455, 417, 340, 400, 13, 100, [
                        [450, 435, 434, 430, 394, 395, 2, 40]
                    ]],
                    [550, 445, 600, 356, 680, 345, 12, 100, [
                        [578, 400, 648, 409, 661, 426, 3, 80]
                    ]],
                    [539, 281, 537, 248, 534, 217, 3, 40],
                    [546, 397, 413, 247, 328, 244, 9, 80, [
                        [427, 286, 383, 253, 371, 205, 2, 40],
                        [498, 345, 435, 315, 395, 330, 4, 60]
                    ]],
                    [546, 357, 608, 252, 678, 221, 6, 100, [
                        [590, 293, 646, 277, 648, 271, 2, 80]
                    ]]
                ]] 
            ],
            bloom: {
                num: 700,
                width: 1080,
                height: 650,
            },
            footer: {
                width: 1200,
                height: 5,
                speed: 10,
            }
        }
        var tree = new Tree(canvas[0], width, height, opts);
        var seed = tree.seed;
        var foot = tree.footer;
        var hold = 1;
        canvas.click(function(e) {
            var offset = canvas.offset(), x, y;
            x = e.pageX - offset.left;
            y = e.pageY - offset.top;
            if (seed.hover(x, y)) {
                hold = 0; 
                canvas.unbind("click");
                canvas.unbind("mousemove");
                canvas.removeClass('hand');
            }
        }).mousemove(function(e){
            var offset = canvas.offset(), x, y;
            x = e.pageX - offset.left;
            y = e.pageY - offset.top;
            canvas.toggleClass('hand', seed.hover(x, y));
        });
        var seedAnimate = eval(Jscex.compile("async", function () {
            seed.draw();
            while (hold) {
                $await(Jscex.Async.sleep(10));
            }
            while (seed.canScale()) {
                seed.scale(0.95);
                $await(Jscex.Async.sleep(10));
            }
            while (seed.canMove()) {
                seed.move(0, 2);
                foot.draw();
                $await(Jscex.Async.sleep(10));
            }
        }));
        var growAnimate = eval(Jscex.compile("async", function () {
            do {
    	        tree.grow();
                $await(Jscex.Async.sleep(10));
            } while (tree.canGrow());
        }));
        var flowAnimate = eval(Jscex.compile("async", function () {
            do {
    	        tree.flower(2);
                $await(Jscex.Async.sleep(10));
            } while (tree.canFlower());
        }));
        var moveAnimate = eval(Jscex.compile("async", function () {
            tree.snapshot("p1", 240, 0, 610, 680);
            while (tree.move("p1", 500, 0)) {
                foot.draw();
                $await(Jscex.Async.sleep(10));
            }
            foot.draw();
            tree.snapshot("p2", 500, 0, 610, 680);
            // 会有闪烁不得意这样做, (＞﹏＜)
            canvas.parent().css("background", "url(" + tree.toDataURL('image/png') + ")");
            canvas.css("background", "#ffe");
            $await(Jscex.Async.sleep(300));
            canvas.css("background", "none");
        }));
        var jumpAnimate = eval(Jscex.compile("async", function () {
            var ctx = tree.ctx;
            while (true) {
                tree.ctx.clearRect(0, 0, width, height);
                tree.jump();
                foot.draw();
                $await(Jscex.Async.sleep(25));
            }
        }));
        var textAnimate = eval(Jscex.compile("async", function () {
		    var together = new Date();
		    together.setFullYear(<?php echo (date("Y",$data["lovetime"])); ?>,<?php echo (date("m",$data['lovetime'])); ?>-1 , <?php echo (date("d",$data["lovetime"])); ?>); 			//时间年月日
		    together.setHours(0);						//小时	
		    together.setMinutes(0);					//分钟
		    together.setSeconds(0);					//秒前一位
		    together.setMilliseconds(0);				//秒第二位
		    $("#code").show().typewriter();
            $("#clock-box").fadeIn(500);
            while (true) {
                timeElapse(together);
                $await(Jscex.Async.sleep(1000));
            }
        }));
        var runAsync = eval(Jscex.compile("async", function () {
            $await(seedAnimate());
            $await(growAnimate());
            $await(flowAnimate());
            $await(moveAnimate());
            textAnimate().start();
            $await(jumpAnimate());
        }));
        runAsync().start();
    })();
</script>
        <div id="copyright">
            Inspired by <a href="/love">Soi.so</a> project.<br />
            Copyright © 2013 <?php echo ($data["myname"]); ?> ❤ <?php echo ($data["taname"]); ?> 不离不弃，<a href="/love">So爱</a>见证
        </div>
 <!--弹出二维码-->
<script>
var docEle = function() {
return document.getElementById(arguments[0]) || false;
}
function openNewDiv(_id) {
var m = "mask";
if (docEle(_id)) document.removeChild(docEle(_id));
if (docEle(m)) document.removeChild(docEle(m));
// 新激活图层
var newDiv = document.createElement("div");
newDiv.id = _id;
newDiv.style.position = "absolute";
newDiv.style.zIndex = "9999";
newDiv.style.width = "300px";
newDiv.style.height = "320px";
newDiv.style.top = "100px";
newDiv.style.left = (parseInt(document.body.scrollWidth) - 300) / 2 + "px"; // 屏幕居中
newDiv.style.background = "#EFEFEF";
newDiv.style.border = "1px solid #860001";
newDiv.style.padding = "5px";
newDiv.innerHTML = "<img src=\"http://qr.liantu.com/api.php?text=http://<?php echo ($_SERVER['SERVER_NAME']); echo ($_SERVER['PHP_SELF']); echo ($_SERVER['QUERY_STRING']); ?>\"></img>";
document.body.appendChild(newDiv);
// mask图层
var newMask = document.createElement("div");
newMask.id = m;
newMask.style.position = "absolute";
newMask.style.zIndex = "1";
newMask.style.width = document.body.scrollWidth + "px";
newMask.style.height = document.body.scrollHeight + "px";
newMask.style.top = "0px";
newMask.style.left = "0px";
newMask.style.background = "#000";
newMask.style.filter = "alpha(opacity=40)";
newMask.style.opacity = "0.40";
document.body.appendChild(newMask);
// 关闭mask和新图层
var newA = document.createElement("a");
newA.href = "#";
newA.innerHTML = "<b>点击关闭</b>";
newA.onclick = function() {
document.body.removeChild(docEle(_id));
document.body.removeChild(docEle(m));
return false;
}
newDiv.appendChild(newA);
}
</script>
</head>
    </body>

    </html>