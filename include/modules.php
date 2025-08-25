<?php
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$moduller = mysql_query("select * from moduller where tip=2 order by mid");
$tblcnt=0;
while($modul = mysql_fetch_array($moduller))
{

if ($tblcnt==0)
{
echo "<tr>";
}
echo "<td>";
mod($modul["mid"]);
echo "</td>";
$tblcnt+=1;

if ($tblcnt==2)
{
echo "</tr>";
$tblcnt=0;
}
}
mysql_close();
?>