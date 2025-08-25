
function stateChanged() 
{ 

if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
document.getElementById('card' + suffix).innerHTML= xmlHttp.responseText
}
 
} 




function GetXmlHttpObject()
{ 
var objXMLHttp=null
if (window.XMLHttpRequest)
{
objXMLHttp=new XMLHttpRequest()
}
else if (window.ActiveXObject)
{
objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
}
return objXMLHttp
}



function getByDist(id, mode, num)
{ 
xmlHttp=GetXmlHttpObject()

var url="joint.php?sum=list&" 

if (mode==1)
{
url = url + "mode=1&"
}

url= url + "id=" + id

if (num!=='')
{
url= url + "&num=" + num
suffix=num
}


xmlHttp.onreadystatechange=function()
{
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
document.getElementById('card' + suffix).innerHTML= xmlHttp.responseText
}
}


xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}




function getJobs(id, num)
{ 
xmlHttp=GetXmlHttpObject()

var url="rep.php?sum=jobmask&id=" + id
suffix="_jobs"

xmlHttp.onreadystatechange=function()
{
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{ 
document.getElementById('card' + suffix).innerHTML= xmlHttp.responseText
}
}
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}






function ShowMSG()
{ 
xmlHttp=GetXmlHttpObject()
var url="include/msngr.php?sum=show"

xmlHttp.onreadystatechange=function()
{
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{
eval(xmlHttp.responseText);
}
}

xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}


function ReadMSG(id)
{ 
xmlHttp=GetXmlHttpObject()

var url="include/msngr.php?sum=read&id=" + id

xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}