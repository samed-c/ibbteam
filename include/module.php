<?php
session_start();
include("include/mysql.php");
include("include/session.php");

$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");

if ($module=="")
{
$parent_filename = explode("/", strrev($_SERVER['PHP_SELF']));
$parent_filename = strrev($parent_filename[0]);
$parent_filename=strtolower($parent_filename);

$result = mysql_query("select * from moduller where dosya='$parent_filename' and tip=1");
$row = mysql_fetch_object($result);
$module=$row->mid;
$fullcontent=1;
}
else
{
$fullcontent=0;

$result = mysql_query("select * from moduller where mid=$module");
$row = mysql_fetch_object($result);
$dosya=$row->dosya;
}


$result = mysql_num_rows(mysql_query("select * from yetkiler where rid=$login_yetki and mid=$module"));
if ($result==1)
{
$contvisible=1;
}
else
{
$contvisible=0;
}




if ($contvisible==0 and $fullcontent==1)
{
die("<center>Bu alana girmeye yetkiniz yok</center>");
}


if ($contvisible==1 &&  $fullcontent==0)
{
include("module/" . $dosya);
}
?>