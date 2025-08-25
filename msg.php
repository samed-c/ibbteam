<?php
include("include/header.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/alertbox.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
</head>
<?php
include("include/session.php");
include("include/mysql.php");

$id=$_GET['id'];
$sum=$_GET['sum'];

function mod($module)
{
include("include/module.php");
}
mod();

$msgalici=$_POST['msgalici'];
$msgkonu=$_POST['msgkonu'];
$msgtxt=$_POST['msgtxt'];


if ($sum=="send")
{
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
$sumquery="insert into mesajlar (kid,mesaj,konu) values ($msgalici,'$msgtxt',$msgkonu)";
$alertmessage="Mesajınız ilgili personele gönderilmiştir.";

mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
mysql_query($sumquery);
mysql_close($con);
}

?><body>
<script>
success('<b><?php echo $alertmessage; ?></b>','index.php');
</script>
</body>
</html>
<?php
die();
}
?>