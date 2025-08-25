document.write("<span id=flashsoundtab2 style=visibility:hidden> </span>");
function playsound2()
{
document.getElementById('flashsoundtab2').innerHTML='<object id="flash2" id="flashsound2" data="sound/sound2.swf" style="width: 1px; height: 1px" type="application/x-shockwave-flash"><param name="movie" value="sound/sound2.swf" /></object>';
}

document.write("<div id=dhtmlfloatie style='position: absolute;left: 0;left: -900px;filter:alpha(opacity=0);-moz-opacity:0;border: 2px solid black;padding: 5px;z-index: 100;'></div>");
var floattext=new Array()

var floatiewidth="250px"
var floatieheight="60px"
var floatiebgcolor="lightyellow"
var fadespeed=70

var baseopacity=0
function slowhigh(which2){
imgobj=which2
browserdetect=which2.filters? "ie" : typeof which2.style.MozOpacity=="string"? "mozilla" : ""
instantset(baseopacity)
highlighting=setInterval("gradualfade(imgobj)",fadespeed)
}

function instantset(degree){
cleartimer()
if (browserdetect=="mozilla")
imgobj.style.MozOpacity=degree/100
else if (browserdetect=="ie")
imgobj.filters.alpha.opacity=degree
}

function cleartimer(){
if (window.highlighting) clearInterval(highlighting)
}

function gradualfade(cur2){
if (browserdetect=="mozilla" && cur2.style.MozOpacity<1)
cur2.style.MozOpacity=Math.min(parseFloat(cur2.style.MozOpacity)+0.1, 0.99)
else if (browserdetect=="ie" && cur2.filters.alpha.opacity<100)
cur2.filters.alpha.opacity+=10
else if (window.highlighting)
clearInterval(highlighting)
}

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function paramexists(what){
return(typeof what!="undefined" && what!="")
}

function showfloatie(thetext, e, optbgColor, optWidth, optHeight){
playsound2();
var dsocx=(window.pageXOffset)? pageXOffset: ietruebody().scrollLeft;
var dsocy=(window.pageYOffset)? pageYOffset : ietruebody().scrollTop;
var floatobj=document.getElementById("dhtmlfloatie")
floatobj.style.left="-900px"
floatobj.style.display="block"
floatobj.style.backgroundColor=paramexists(optbgColor)? optbgColor : floatiebgcolor
floatobj.style.width=paramexists(optWidth)? optWidth+"px" : floatiewidth
floatobj.style.height=paramexists(optHeight)? optHeight+"px" : floatieheight!=""? floatieheight : ""
floatobj.innerHTML=thetext
var floatWidth=floatobj.offsetWidth>0? floatobj.offsetWidth : floatobj.style.width
var floatHeight=floatobj.offsetHeight>0? floatobj.offsetHeight : floatobj.style.width
var winWidth=document.all&&!window.opera? ietruebody().clientWidth : window.innerWidth-20
var winHeight=document.all&&!window.opera? ietruebody().clientHeight : window.innerHeight
e=window.event? window.event : e
floatobj.style.left=dsocx+winWidth-floatWidth-5+"px"
if (e.clientX>winWidth-floatWidth && e.clientY+20>winHeight-floatHeight)
floatobj.style.top=dsocy+5+"px"
else
floatobj.style.top=dsocy+winHeight-floatHeight-5+"px"
slowhigh(floatobj)
}

function hidefloatie(){
var floatobj=document.getElementById("dhtmlfloatie")
floatobj.style.display="none"
}
