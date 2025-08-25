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





if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$eid=$_POST["eid"];
$evrakno=$_POST["evrakno"];
$olusturma_tarihi=date('Y-m-d', strtotime($_POST["olusturma_tarihi"]));

$alici=$_POST["alici"];
$geldigi_yer=$_POST["geldigi_yer"];
$aciklama=$_POST["aciklama"];

$evrak_sonucu=$_POST["evrak_sonucu"];
$cikis_tarihi=date('Y-m-d', strtotime($_POST["cikis_tarihi"]));
$yaziisleri_sonuclanmasi=$_POST["yaziisleri_sonuclanmasi"];


if ($sum=="search")
{

$evrakaramakriter=$_GET['val1'];
$evrakaramadeger=$_GET["val2"];

			$sqlwherequery="";
switch ($evrakaramakriter)
{
    		case 1:
			$sqlwherequery.=" where evrakno=$evrakaramadeger";    		
       		break;
        
   			case 2:
   			$sqlwherequery.=" where olusturma_tarihi='$evrakaramadeger'";    
      		break;
        
        	case 3:
        	$sqlwherequery.=" where geldigi_yer like '%" . $evrakaramadeger . "%'"; 
       		break;      
       		
            case 4:
            $sqlwherequery.=" where aciklama like '%" . $evrakaramadeger . "%'"; 
     	    break;
     	    
            case 5:
            $sqlwherequery.=" where evrak_sonucu like '%" . $evrakaramadeger . "%'"; 
     	    break;
        
            case 6:
            $sqlwherequery.=" where cikis_tarihi='$evrakaramadeger'"; 
      		break;
}








$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("select eid,evrakno,olusturma_tarihi,(select isim from kullanicilar where id=alici) from evraklar" . $sqlwherequery);
$db_recordcount = mysql_num_rows($result);
?>
     
	
	<head><META NAME="Content-language" content="tr"><META NAME="Language" CONTENT="utf-8"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Language" content="tr">
	</head>

	<body bgcolor="#FBFBFB">
	<table border="0" width="99%" id="table1">
		<tr>
			<td valign="top">
			<?php
			include("include/label.php")
			?>
			 <center>
<i>
<br>
EVRAK ARAMA</i></center>

    </div>
    
    <?php   
	if ($db_recordcount>0){
    ?>
			<div align="center">
      <center>
       </center>
    </div>
    <table border="1" cellspacing="1" width="773" id="table17" bordercolor="#BCBCBC">

	<tr>
							<td align="center" bgcolor="#E1E1E1" width="240"><u>
							<font size="2" color="#636363"><b>Evrak No</b></font></u></td>
			
							<td align="center" bgcolor="#E1E1E1" width="240"><u>
							<font size="2" color="#636363"><b>Evrak Tarihi</b></font></u></td>
							<td align="center" bgcolor="#E1E1E1" width="240">
							<u><font size="2" color="#636363"><b>Evrak Alıcısı</b></font></u></td>
							<td align="center" bgcolor="#E1E1E1" width="240">
							<u><font size="2" color="#636363"><b>Detay</b></font></u></td>
						</tr>
						
											
<?php
while($row = mysql_fetch_array($result))
{
?>
							<tr bgcolor='#efefef' onmouseover="this.style.background='#ffffff';" onmouseout="this.style.background='#efefef';">
							<td align="center" width="285">
							<font size="2"> <?php echo $row[1]; ?></font></td>				
							<td align="center" width="285">
							<font size="2"> <?php echo date('d.m.Y', strtotime($row[2]));?></font></td>
							<td align="center" width="225">
							<font size="2"> <?php echo $row[3]; ?></font></td>
							<td align="center">
							<a href="paper.php?sum=det&id=<?php echo $row[0];?>"><font size="2" color="#636363">Detay</font></a></td>
						</tr>
<?php
}
?>
						</table>
<?php
}
else
{
echo "<script>success('<b>Arama kriterlerinizle uyuşan evrak bulunamadı!','javascript:history.back(-1)');</script>";
}
mysql_close($con);
?>

		
			
			</td>
			<td width="213" valign="top">
<?php include('include/menu.php'); ?>
			<p align="left">
			 </p>
			<p align="left">
			 </p>
			<p align="center">
			 </p>
					
			</td>
		</tr>
</table>

<?
}


die();
}

if ($sum=="add")
{
$sumquery="insert into evraklar (evrakno,olusturma_tarihi,alici,geldigi_yer,aciklama,evrak_sonucu,cikis_tarihi,yaziisleri_sonuclanmasi) values ($evrakno,'$olusturma_tarihi',$alici,'$geldigi_yer','$aciklama','$evrak_sonucu','$cikis_tarihi',$yaziisleri_sonuclanmasi)";
$alertmessage="Yeni evrak kaydı sisteme başarıyla yüklenmiştir!";
}
if ($sum=="edit")
{
$sumquery="update evraklar set evrakno=$evrakno,olusturma_tarihi='$olusturma_tarihi',alici=$alici,geldigi_yer='$geldigi_yer',aciklama='$aciklama',evrak_sonucu='$evrak_sonucu',cikis_tarihi='$cikis_tarihi',yaziisleri_sonuclanmasi=$yaziisleri_sonuclanmasi where eid=$id";
$alertmessage="Mevcut evrak kaydı güncellenmiştir!";
}

$OriginalFilename = $FinalFilename = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['taranmisevrak']['name']); 
$FileCounter = 1; 
while (file_exists( 'files/'.$FinalFilename ))
$FinalFilename = $FileCounter++.'_'.$OriginalFilename; 
move_uploaded_file ( $_FILES['taranmisevrak']['tmp_name'], "files/$FinalFilename" ); 


$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
mysql_query($sumquery);


$eid = mysql_fetch_object(mysql_query("select eid from evraklar where evrakno=$evrakno and olusturma_tarihi='$olusturma_tarihi' and alici=$alici and geldigi_yer='$geldigi_yer' and aciklama='$aciklama' and evrak_sonucu='$evrak_sonucu' and cikis_tarihi='$cikis_tarihi' and yaziisleri_sonuclanmasi=$yaziisleri_sonuclanmasi"));
$id= $eid->eid;

if($_FILES['taranmisevrak']['name']!="")
{
if ($sum=="edit")
{
$dosya = mysql_fetch_object(mysql_query("select dosya  from ekler where tur=3 and id=$id"));
$dosya= $dosya->dosya;

if ($dosya!="")
{
unlink("files/" . $dosya);
mysql_query("delete from ekler where tur=3 and dosya='$dosya' and id=$id");
}
}

mysql_query("insert into ekler (id, dosya, tur) values ($id, '$FinalFilename', 3)");
}



mysql_close($con);
}
?>
<script>
success('<b><?php echo $alertmessage; ?></b>','index.php');
</script>
<?php
die();
}




if ($sum=="det" || $sum=="edit")
{
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("select * from evraklar where eid=$id");
while($row = mysql_fetch_array($result))
{

$eid=$row["eid"];
$evrakno=$row["evrakno"];
$olusturma_tarihi=date('d.m.Y', strtotime($row["olusturma_tarihi"]));

$alici=$row["alici"];
$geldigi_yer=$row["geldigi_yer"];
$aciklama=$row["aciklama"];

$dosya = mysql_fetch_object(mysql_query("select dosya from ekler where id=$eid and tur=3"));
$dosya = $dosya->dosya;
$taranmisevrak=$dosya;

$evrak_sonucu=$row["evrak_sonucu"];
$cikis_tarihi=date('d.m.Y', strtotime($row["cikis_tarihi"]));
$yaziisleri_sonuclanmasi=$row["yaziisleri_sonuclanmasi"];


if ($sum=="edit")
{
if ($taranmisevrak==""){$taranmisevrak="<font color=gray>Yok</font>";}
$taranmisevrak = "<font size=2><br>  [Mevcut Evrak: $taranmisevrak]</b4></font>";

if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("select id,yetki,isim,(select etiket from rutbeler where rid=yetki) from kullanicilar order by isim");

$usercount=mysql_num_rows($result);
while($row = mysql_fetch_array($result))
{
$scriptcontent.="userlist[". $row['id'] . "] = new Array('" . $row[3] . "');";
$listboxcontent .= "<option value='";
$listboxcontent .= $row['id'];
$listboxcontent .= "' ";
if ($alici==$row['id']){$listboxcontent .= "selected";}
$listboxcontent .= ">» ";
$listboxcontent .= $row['isim'];
$listboxcontent .= "</option>";
}
mysql_close($con);
}
}
if ($sum=="det")
{
if ($yaziisleri_sonuclanmasi=="1"){$yaziisleri_sonuclanmasi="<font color=blue>Sonuçlandı</font>";}
if ($yaziisleri_sonuclanmasi=="0"){$yaziisleri_sonuclanmasi="<font color=red>Sonuçlanmadı</font>";}

$isim = mysql_fetch_object(mysql_query("select isim from kullanicilar where id=$alici"));
$isim = $isim->isim;
$alici=$isim;
}




}
mysql_close($con);
}
}

if ($sum=="add")
{
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("select id,yetki,isim,(select etiket from rutbeler where rid=yetki) from kullanicilar order by isim");

$usercount=mysql_num_rows($result);
while($row = mysql_fetch_array($result))
{
$scriptcontent.="userlist[". $row['id'] . "] = new Array('" . $row[3] . "');";
$listboxcontent .= "<option value='";
$listboxcontent .= $row['id'];
$listboxcontent .= "' ";
$listboxcontent .= ">» ";
$listboxcontent .= $row['isim'];
$listboxcontent .= "</option>";
}
mysql_close($con);
}
}








if ($sum=="det")
{
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
      <i>EVRAK BİLGİLERİ</i></center>
    </div>
			<div align="center">
      <center>
       </center>
    </div>    
    		<div align="left">
    <table border="1" cellspacing="1" width="773" id="table13" bordercolor="#BCBCBC">
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Evrak No:</b></font></u></td>
							<td align="center" bgcolor="#E1E1E1" rowspan="6" valign="top">
		<table border="0" width="100%">
				<tr>
					<td bgcolor="#EFEFEF"> <font size="2" color="#636363"><?php echo $evrakno;?></font></td>
				</tr>
				<tr>
					<td bgcolor="#EFEFEF"> <font size="2" color="#636363"><?php echo $olusturma_tarihi;?></font></td>
				</tr>
				<tr>
					<td bgcolor="#EFEFEF"> <font size="2" color="#636363"><?php echo $alici;?></font></td>
				</tr>
				<tr>
					<td bgcolor="#EFEFEF"> <font size="2" color="#636363"><?php echo $geldigi_yer;?></font></td>
				</tr>
				<tr>
					<td bgcolor="#EFEFEF"> <font size="2" color="#636363"><a href="files/<?php echo $taranmisevrak;?>" target="_blank"><?php echo $taranmisevrak;?></a></font></td>
				</tr>
				<tr>
					<td bgcolor="#EFEFEF"> <font size="2" color="#636363"><?php echo $aciklama;?></font></td>
				</tr>
			</table></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Evrak Tarihi:</b></font></u></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Evrak Alıcısı:</b></font></u></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Evrağın Geldiği 
							Yer:</b></font></u></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Taranmış Evrak:</b></font></u></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Evrak Açıklaması:</b></font></u></td>
						</tr>
						</table>
					
			</div>
			<div align="left">
				<br>
 <table border="1" cellspacing="1" width="773" id="table17" bordercolor="#BCBCBC">
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285" height="19"><u>
							<font size="2" color="#636363"><b>Evrak Sonucu:</b></font></u></td>
							<td align="center" bgcolor="#E1E1E1" rowspan="3" valign="top">
							<table border="0" width="100%" id="table18" height="79">
								<tr bgcolor="#efefef">
									<td>									
							<font size="2" color="#636363"> <?php echo $evrak_sonucu;?></font></td>
								</tr>
								<tr bgcolor="#efefef">
									<td><font size="2" color="#636363"> <?php echo $cikis_tarihi;?></font></td>
								</tr>
								<tr bgcolor="#efefef">
									<td><font size="2" color="#636363"> <?php echo $yaziisleri_sonuclanmasi;?></font></td>
								</tr>
													
							</table>
							</td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Evrak Çıkış Tarihi:</b></font></u></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Yazı işleri 
							Sonuçlanması:</b></font></u></td>
						</tr>
						</table>
					
			</div>
					
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
			<a href="paper.php?sum=edit&id=<?php echo $id;?>">
			<img border="0" src="imgs/edit.jpg">
			<br><font color="#253749">Bu evrak bilgilerini güncelle</font></a></p>
					
			</td>
		</tr>
</table>
<?php
die();
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
      <form enctype="multipart/form-data" method="post" onsubmit="if (document.getElementById('kullaniciadi').value==''){error('<b>Lütfen kullanıcı adını giriniz!</b>'); return false;}if (document.getElementById('parola').value==''){error('<b>Lütfen parola giriniz!</b>');return false;}if (document.getElementById('isim').value==''){error('<b>Lütfen Ad Soyad giriniz!</b>');return false;}if (document.getElementById('yetki').value==''){error('<b>Lütfen sistem kullanıcısının yetkisini giriniz!</b>');return false;}if (document.getElementById('ekipbasi').value==''){error('<b>Lütfen Ekipbaşı yetkisini belirtiniz!</b>');return false;}" action="paper.php?sum=<?php echo $sum; ?>&id=<?php echo $id;?>">
      <center>
       <?php echo $bolge_ad;?><?php echo $bolge_no; ?></center>
    </div>    
    <div align="center">
    <table border="1" cellspacing="1" width="533" id="table15" bordercolor="#BCBCBC" height="89">
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="243" height="20%">
							<u><font size="2" color="#636363"><b>Evrak No:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="277" height="20%">
							<font size="2" color="#636363">
							 
							<input type="text" value="<?php echo $evrakno;?>" name="evrakno" id="evrakno" maxlength="11" size="20"> 
							(sadece rakam.)</font></td>
						</tr>
							<tr>
							<td align="center" bgcolor="#E1E1E1" width="243" height="20%">
							<u>
							<font size="2" color="#636363"><b>Evrak Tarihi:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="277" height="20%"><font size="2" color="#636363">
									 
									<input type="text" id="olusturma_tarihi" value="<?php echo $olusturma_tarihi;?>" name="olusturma_tarihi" maxlength="10" size="20"> 
							(gg.aa.yyyy)</font></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="243" height="20%">
							<u><font size="2" color="#636363"><b>Evrak Alıcısı:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="277" height="20%"><font size="2" color="#636363">
									 
									<select size="1" id="alici" name="alici">
			<option value=0>Eleman Seçiniz</option>
			<?php echo $listboxcontent; ?>
</select></font></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="243" height="20%">
							<u><font size="2" color="#636363"><b>Evrağın Geldiği Yer:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="277" height="20%">
							<font size="2" color="#636363">
							 
							<input type="text" id="geldigi_yer" value="<?php echo $geldigi_yer;?>" name="geldigi_yer" maxlength="20" size="20"></font></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="243" height="20%">
							<u><font size="2" color="#636363"><b>Evrak 
							Açıklaması:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="277" height="20%"><font size="2" color="#636363">
									
	 
									
	</font><textarea rows="5" name="aciklama" id="aciklama" cols="31"><?php echo $aciklama;?></textarea><br>
							<font size="2" color="#636363">
							  (max. 100 karakter)</font></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="243" height="20%">
							<u><font size="2" color="#636363"><b>Taranmış Evrak:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="277" height="20%">
<font size="2" color="#636363"> 
</font><input type="file" name="taranmisevrak" id="taranmisevrak" size="20">
<?php echo $taranmisevrak;?>
</td>
						</tr>
											
						
					
						</table>
				
	<p><br>
 </p>
    <table border="1" cellspacing="1" width="533" id="table16" bordercolor="#BCBCBC" height="89">
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="243" height="20%">
							<u><font size="2" color="#636363"><b>Evrak Sonucu:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="277" height="20%">
							<font size="2" color="#636363">
							 
							<input type="text" id="evrak_sonucu" value="<?php echo $evrak_sonucu;?>" name="evrak_sonucu" size="20" maxlength="50"></font></td>
						</tr>
							<tr>
							<td align="center" bgcolor="#E1E1E1" width="243" height="20%">
							<u>
							<font size="2" color="#636363"><b>Evrak Çıkış Tarihi:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="277" height="20%"><font size="2" color="#636363"> 
									<input type="text" id="cikis_tarihi" value="<?php echo $cikis_tarihi;?>" name="cikis_tarihi" size="20"> 
							(gg.aa.yyyy)</font></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="243" height="20%">
							<u><font size="2" color="#636363"><b>Yazıişleri 
							Sonuçlanması:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="277" height="20%"><font size="2" color="#636363"> 
									<select id="yaziisleri_sonuclanmasi" name="yaziisleri_sonuclanmasi" size="1">
<option value="1" <?php if ($yaziisleri_sonuclanmasi==1){echo 'selected';};?>>Sonuçlandı</option>
<option value="0" <?php if ($yaziisleri_sonuclanmasi==0){echo 'selected';};?>>Sonuçlanmadı</option>
</select></font></td>
						</tr>
																	
						
					
						</table>
				
<p align="center">
					<input type="submit" value="Evrak Bilgisi <?php if($sum=='add'){echo 'Ekle';} if($sum=='edit'){echo 'Düzenle';} ?>" name="submit">
	</p>
	<p></form></center>
    </div></center>
    </div>
</td>
			<td width="210" valign="top">
			<?php include('include/menu.php'); ?>
			</td>
		</tr>
	</table>
</p>
</html>
