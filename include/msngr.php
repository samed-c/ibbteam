<?php
include("header.php");
include("mysql.php");
include("session.php");

$sum=$_GET["sum"];
$id=$_GET["id"];

if ($sum=="read")
{
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
mysql_query("update mesajlar set okundu=1 where mid=$id");

$tblcnt=0;
while($msg = mysql_fetch_array($mesajlar))
{
echo "showfloatie('<b>" . $msg["konu"] . ":</b> <code>" . $msg["mesaj"] . "</code> <p align=center><b><font align=right><a href=javascript:hidefloatie();ReadMSG(" . $msg["mid"] . ")><font color=#003162>Tamam</font></a></font></b></p>', event, '#feffdf', 250, 100)";
}
mysql_close();
}


if ($sum=="show")
{
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);

mysql_select_db($mysql_DBadi, $con);

mysql_query("SET NAMES '$mysql_charset'");

$mesajlar = mysql_query("select * from mesajlar where okundu=0 and kid=$loginid order by mid LIMIT 1");

$tblcnt=0;
while($msg = mysql_fetch_array($mesajlar))
{

switch ($msg["konu"])
{

Case 1:
$konu="Uyarı";
Break;

Case 2:
$konu="Mesaj";


Case 3;
$konu="Dikkat";
Break;

Case 4;
$konu="Acil";
Break;

Case 5;
$konu="Hatırlatma";							
Break;

Case 6;
$konu="Fikir";
Break;

Case 7;
$konu="İpucu";
Break;

Case 8;
$konu="Gönderi";							
Break;

Case 9;
$konu="Sistem Mesajı";
Break;

}


echo "showfloatie('<b>" . $konu . ":</b> <code>" . $msg["mesaj"] . "</code> <p align=center><b><font align=right><a href=javascript:hidefloatie();ReadMSG(" . $msg["mid"] . ")><font color=#003162>Tamam</font></a></font></b></p>', event, '#feffdf', 250, 100);";
}
mysql_close();
}
?>
