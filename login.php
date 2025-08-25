<?php
include("include/header.php");
session_start();

include("include/mysql.php");

if ($_GET['login']=="ok")
{

$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");

$loginusername = $_POST['username'];
$loginpassword = $_POST['password'];


$result = mysql_query("SELECT * FROM kullanicilar where kullaniciadi='$loginusername' and parola='$loginpassword'");


while($row = mysql_fetch_array($result))
{

$_SESSION['login_code']="k!2'kLKFDS^1??NBXa9�cTT?R";
$_SESSION['login_id']=$row['id'];
$_SESSION['login_yetki']=$row['yetki'];
$_SESSION['login_isim']=$row['isim'];
$_SESSION['login_kullaniciadi']=$row['kullaniciadi'];




function mod($module)
{
include("include/module.php");
}
mod();


$isregistered="true";



?>
<script>location.href='index.php'</script>
<?
}


mysql_close($con);
}

if ($isregistered=="")
{
$message="<b>Yanlış kullanıcı veya şifre!</b> <br>Lütfen kullanıcı adınızı ve şifrenizi kontol ederek dikkatli şekilde yazız. <br>Eğer sorun devam ederse departman ile irtibata geçiniz.";
}

}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
input {border: 1px solid #666153; background-color:#FBFBFB}
</style>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/alertbox.js"></script>
</head>
<body bgcolor="#FBFBFB">
<div align="center">
	<p>
	<img border="0" src="imgs/ibb_logo.gif"></p>
	<table border="1" width="281" bgcolor="#E1E1E1" bordercolor="#808080">
	<tr>
		<td width="271">
		<br>
				<form method="POST" action="login.php?login=ok">
								
		<table border="0" width="100%" id="table1">
			<tr>
				<td width="37%">

	<p align="right"><font color="#2C3B2B">Kullanıcı Adı:</font></p>
				</td>
				<td width="2%" align="center"> </td>
				<td width="56%" align="left">
				<input type="text" name="username" size="12" value="mudur"></td>
			</tr>
			<tr>
				<td height="25" width="37%">
				<p align="right"><font color="#2C3B2B">Şifre:</font></td>
				<td width="2%" height="25" align="center"> </td>
				<td width="56%" height="25" align="left">
				<input type="password" name="password" size="13" value="123456789"></td>
			</tr>
			<tr>
				<td colspan="3" align="center">
				<p><br>				
				<input style="border-width: 0px 0px 0px 0px;" border="0" src="imgs/giris.png" name="I1" width="80" height="20" type="image"></td>
			</tr>
		</table>
		
		</form>
		
</td>
	</tr>
</table>
	<p> </div>



<?php
if ($message<>"")
{
?>
<script>
error('<?php echo $message; ?>');
</script>
<?php
}
?>
<p align="center"><font size="2">Tasarım ve Uygulama </font><span lang="en">
<font size="2" face="Times New Roman">® Samed Cansın ESKİOĞLU</font></span></p>

</body>
</html>


