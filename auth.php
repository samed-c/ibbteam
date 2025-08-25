<?php
include("include/header.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/alertbox.js"></script>
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

$yetkietiket=$_POST['yetkietiket'];



if ($sum<>"")
{
if ($sum=="add")
{
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);

mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
mysql_query("insert into rutbeler (etiket) values ('$yetkietiket');");


foreach($_POST as $name => $value) {
if ($value=="[$$-modul-$$]")
{
mysql_query("insert into yetkiler (mid, rid) values ($name, (select rid from rutbeler where etiket='$yetkietiket' order by rid desc LIMIT 1));");
}
}

mysql_close($con);
$alertmessage="Yeni yetki alanı sisteme başarıyla eklenmiştir!!";
}


if ($sum=="edit")
{
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
mysql_query("update rutbeler set etiket='$yetkietiket' where rid=$id");

mysql_query("delete from yetkiler where rid=$id");

foreach($_POST as $name => $value) {
if ($value=="[$$-modul-$$]")
{
mysql_query("insert into yetkiler (mid, rid) values ($name, $id);");
}
}

mysql_close($con);
$alertmessage="Mevcut yetki alanı başarıyla güncellenmiştir!";
}
}
?>
<script>
success('<b><?php echo $alertmessage; ?></b>','index.php');
</script>
<?php
die();
}







if ($sum=="")
{
$autofill="";	
if ($id<>"")
{
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");

$result = mysql_query("select * from rutbeler where rid=$id");
while($row = mysql_fetch_array($result))
{
$yetkietiket=$row["etiket"];
}

$result = mysql_query("select * from yetkiler where rid=$id");
$autofill=$autofill . "<script" . ">";
while($row = mysql_fetch_array($result))
{
$autofill=$autofill . "document.getElementById(\"". $row["mid"] . "\").checked=true;";
}
$autofill=$autofill . "</script" . ">";
mysql_close($con);
}
$sum="edit";
$btnvalue="Yetki Alanını Güncelle";
}
else
{
$sum="add";
$btnvalue="Yeni Yetki Alanı Ekle";
}


$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("select * from moduller");

$modüllistesi="";
while($row = mysql_fetch_array($result))
{
$dosya=$row["dosya"];
$etiket=$row["etiket"];
$tip=$row["tip"];
$mid=$row["mid"];

$modüllistesi = $modüllistesi . "     <input type='checkbox' id='$mid' name='$mid' value='[$$-modul-$$]'> ";

if ($tip==1){$modüllistesi = $modüllistesi = $modüllistesi . "<img border='0' src='imgs/page.gif' title='İşlev Sayfası: $dosya'>";}
if ($tip==2){$modüllistesi = $modüllistesi = $modüllistesi . "<img border='0' src='imgs/box.gif' title='Modül Kutusu: $dosya'>";}

$modüllistesi = $modüllistesi . "  $etiket";
$modüllistesi = $modüllistesi . "<br>";

}
mysql_close($con);
}
}
?>
<body bgcolor="#FBFBFB">

	<table border="0" width="99%" id="table11">
		<tr>
			<td valign="top">
			<?php
			include("include/label.php")
			?>			
			<br>
 <div align="center">
      <center>
    <div align="center">
      <center>
      <form method="post" onsubmit="if (document.getElementById('yetkietiket').value==''){error('<b>Lütfen oluşturmak istediğiniz yetki alanına ilişkin \'Rütbe İsmi\' giriniz!</b>'); return false;}" action="auth.php?sum=<?php echo $sum; ?>&id=<?php echo $id;?>">
      <center>
      <i> <?php echo $bolge_ad;?><?php echo $bolge_no; ?>YENİ YETKİ ALANI</i></center>
    </div>    
    <div align="center">
    <table border="1" cellspacing="1" width="677" id="table15" bordercolor="#BCBCBC" height="89">
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="243" height="20%">
							<u><font size="2" color="#636363"><b>Rütbe Adı:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="421" height="20%">
							<font size="2" color="#636363">
							 
							<input type="text" id="yetkietiket" value="<?php echo $yetkietiket;?>" name="yetkietiket" size="20"> 
							(Orn: Yönetici, Memur, Stajyer.. )</font></td>
						</tr>
							<tr>
							<td align="center" bgcolor="#E1E1E1" width="243" height="20%" valign="top"><u>
							<font size="2" color="#636363"><b><br>
							Erişime İzni Verilen Modüller:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="421" height="20%" style="text-indent: 15;">
							<br>
							<font size="2" color="#636363"><?php echo $modüllistesi;?></font>
							<br>
							</td>
						</tr>
<?php echo $autofill; ?>
						</table>
				
<p align="center">
<input type="submit" value="<?php echo $btnvalue;?>">
	</p>
	<p></form></center>
    </div></center>
    </div>
			<p align="left"> <p align="left"> </td>
			<td width="210" valign="top">
			<?php include('include/menu.php'); ?>
			</td>
		</tr>
	</table>
</p>
</html>


