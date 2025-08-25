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




if ($sum=="det")
{
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("select * from kullanicilar where id=$id");
while($row = mysql_fetch_array($result))
{

$isim=$row["isim"];
$kullaniciadi=$row["kullaniciadi"];
$parola=$row["parola"];
$ekipbasi=$row["ekipbasi"];

$yetki=$row["yetki"];


$etiket = mysql_fetch_object(mysql_query("select etiket from rutbeler where rid=$yetki"));
$etiket = $etiket->etiket;
}
mysql_close($con);
}

?>
	<body bgcolor="#FBFBFB">
	<table border="0" width="99%" id="table1">
		<tr>
			<td valign="top">
			<?php
			include("include/label.php")
			?>
		
			<p align="left"> <div align="center">
      <center>
      <i>PERSONEL DETAYLARI</i></center>
    </div>
			<div align="center">
      <center>
       </center>
    </div>    
    <table border="1" cellspacing="1" width="773" id="table13" bordercolor="#BCBCBC">
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Ad Soyad:</b></font></u></td>
							<td align="center" bgcolor="#E1E1E1" rowspan="5" valign="top">
							<table border="0" width="100%" id="table14">
								<tr bgcolor="#efefef">
									<td>
							<font size="2" color="#636363"><?php echo $isim;?></font></td>
								</tr>
								<tr bgcolor="#efefef">
									<td><font size="2" color="#636363"><?php echo $kullaniciadi;?></font></td>
								</tr>
								<tr bgcolor="#efefef">
									<td><font size="2" color="#636363"><?php echo $parola;?></font></td>
								</tr>
								<tr bgcolor="#efefef">
									<td><font size="2" color="#636363">
									
									<?php echo $etiket;?>


</font></td>
								</tr>
								<tr bgcolor="#efefef">
									<td><font size="2" color="#636363">
									
								<?php if ($ekipbasi==1){echo 'Var';};?>
								<?php if ($ekipbasi==0){echo 'Yok';};?>
								</font></td>
								</tr>
					
							</table>
							</td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Kullanıcı Adı:</b></font></u></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Sistem Erişim Parolası</b></font></u></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Sistem Erişim 
							Yetkisi:</b></font></u></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Ekip Başı Yetkisi:</b></font></u></td>
						</tr>
						</table>
					
	<p align="center">             
            <div align="center">
            <p align="left"> </td>
			<td width="213" valign="top">
<?php include('include/menu.php'); ?>
			<p align="left">
			 </p>
			<p align="left">
			 </p>
			<p align="center">
			<a href="user.php?sum=edit&id=<?php echo $id;?>">
			<img border="0" src="imgs/edit.jpg">
			<br><font color="#253749">Bu personel bilgilerini güncelle</font></a></p>
					
			</td>
		</tr>
</table>
<?php
die();
}








$kullaniciadi=$_POST['kullaniciadi'];
$parola=$_POST['parola'];
$isim=$_POST['isim'];
$yetki=$_POST['yetki'];
$ekipbasi=$_POST['ekipbasi'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

if ($sum=="add")
{
$sumquery="insert into kullanicilar (kullaniciadi,parola,isim,yetki,ekipbasi) values ('$kullaniciadi','$parola','$isim',$yetki,$ekipbasi)";
$alertmessage="Yeni sistem kullanıcısı başarıyla eklenmiştir!";
}
else
{
$sumquery="update kullanicilar set kullaniciadi='$kullaniciadi',parola='$parola',isim='$isim',yetki=$yetki,ekipbasi=$ekipbasi where id=$id";
$alertmessage="Mevcut sistem kullanıcısı başarıyla güncellenmiştir!";
}

$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
mysql_query($sumquery);
mysql_close($con);
}
?>
<script>
success('<b><?php echo $alertmessage; ?></b>','index.php');
</script>
<?php
die();
}


if ($sum=="edit")
{
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("select * from kullanicilar where id=$id");
while($row = mysql_fetch_array($result))
{

$isim=$row["isim"];
$kullaniciadi=$row["kullaniciadi"];
$parola=$row["parola"];
$yetki=$row["yetki"];
$ekipbasi=$row["ekipbasi"];
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
			<div align="center">
      <center>
    <div align="center">
      <center>
      <form method="post" onsubmit="if (document.getElementById('kullaniciadi').value==''){error('<b>Lütfen kullanıcı adını giriniz!</b>'); return false;}if (document.getElementById('parola').value==''){error('<b>Lütfen parola giriniz!</b>');return false;}if (document.getElementById('isim').value==''){error('<b>Lütfen Ad Soyad giriniz!</b>');return false;}if (document.getElementById('yetki').value==''){error('<b>Lütfen sistem kullanıcısının yetkisini giriniz!</b>');return false;}if (document.getElementById('ekipbasi').value==''){error('<b>Lütfen Ekipbaşı yetkisini belirtiniz!</b>');return false;}" action="user.php?sum=<?php echo $sum; ?>&id=<?php echo $id;?>">
      <center>
       <?php echo $bolge_ad;?><?php echo $bolge_no; ?></center>
    </div>    
    <div align="center">
    <table border="1" cellspacing="1" width="533" id="table15" bordercolor="#BCBCBC" height="89">
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="243" height="20%"><u>
							<font size="2" color="#636363"><b>Ad Soyad:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="277" height="20%">
							<font size="2" color="#636363">
							 
							<input type="text" id="isim" value="<?php echo $isim;?>" name="isim" size="20"></font></td>
						</tr>
							<tr>
							<td align="center" bgcolor="#E1E1E1" width="243" height="20%"><u>
							<font size="2" color="#636363"><b>Kullanıcı Adı:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="277" height="20%"><font size="2" color="#636363">
									 
									<input type="text" id="kullaniciadi" value="<?php echo $kullaniciadi;?>" name="kullaniciadi" size="20"></font></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="243" height="20%"><u>
							<font size="2" color="#636363"><b>Sistem Erişim Parolası</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="277" height="20%"><font size="2" color="#636363">
									 
									<input type="text" id="parola" value="<?php echo $parola;?>" name="parola" size="20"></font></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="243" height="20%"><u>
							<font size="2" color="#636363"><b>Sistem Erişim 
							Yetkisi:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="277" height="20%"><font size="2" color="#636363">
									
	 
									
	<select id="yetki" name="yetki" size="1">
<?php
$listboxcontent="";
$scriptcontent="";
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("select* from rutbeler order by rid");
while($row = mysql_fetch_array($result))
{

echo "<option value=" . $row['rid'];

if ($row['rid']==$yetki)
{
echo " selected";
}
echo ">" . $row['etiket'] . "</option>";

}
mysql_close($con);
}
?>
</select></font></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="243" height="20%"><u>
							<font size="2" color="#636363"><b>Ekip Başı Yetkisi:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="277" height="20%">
<font size="2" color="#636363">
 
<select id="ekipbasi" name="ekipbasi" size="1">
<option value="1" <?php if ($ekipbasi==1){echo 'selected';};?>>Var</option>
<option value="0" <?php if ($ekipbasi==0){echo 'selected';};?>>Yok</option>
</select></font></td>
						</tr>
											
						
					
						</table>
				
<p align="center">
					<input type="submit" value="Ekip Elemanı <?php if($sum=='add'){echo 'Ekle';} if($sum=='edit'){echo 'Düzenle';} ?>">
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
