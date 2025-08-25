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

$areaname=$_POST['areaname'];
$areano=$_POST['areano'];
$sum=$_GET['sum'];

function mod($module)
{
include("include/module.php");
}

mod();

if ($sum=="add")
{
$sumquery="insert into bolgeler (bolge_no,bolge_ad) values ('$areano','$areaname')";
$alertmessage="Yeni bölge " . $areaname . " (" . $areano . ") sisteme başarıyla eklenmiştir!";
}

$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
mysql_query($sumquery);
?>
<script>
success('<?php echo $alertmessage; ?>','index.php');
</script>
<?php
mysql_close($con);
}
?>
</html>
