<?php if (!defined('THINK_PATH')) exit();?>            <form action="/love/index.php/Home/index/poem" method="post">
                <textarea name="poem" rows="11" ></textarea>
                <button type="submit" >生成</button>
                </form>

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
newDiv.innerHTML = "<img src=\"http://qr.liantu.com/api.php?text=x\"></img>";
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
<body>
<input type="button"  value="  点这里  " onclick="openNewDiv(1)" />