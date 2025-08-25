<?php
include("include/header.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/alertbox.js"></script>
<?php
include("include/session.php");
include("include/mysql.php");

$sum=$_GET['sum'];
$id=$_GET['id'];

function mod($module)
{
include("include/module.php");
}
mod();

function isNullfunc($str)
{if ($str=="")
{return "<font color=blue>-</font>";}
else
{return $str;}
}

$ekipbasi=$_POST['ekipbasi'];

$tarih=$_POST['tarih_yil'] . "-" . $_POST['tarih_ay'] . "-" . $_POST['tarih_gun'];
$aciklama=$_POST['aciklama'];
$yapilacakisler=$_POST['yapilacakisler'];

$elemansayisi=$_POST['elemansayisi'];
$issayisi=$_POST['issayisi'];


if ($sum=="")
{
echo "<script>location.href='rep.php?sum=list';</script>";
}

				
if ($sum=="rep"){

?>
</head>

<div align="center">
<?php
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){


mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("select iid,rapor_id,isadi,(select isim from kullanicilar where id=(select ekip_basi from raporlar where rapor_id=rapor_isler.rapor_id)),((select tarih from raporlar where rapor_id=rapor_isler.rapor_id)) from rapor_isler where kavsak=$id order by iid desc");
$db_recordcount = mysql_num_rows($result);

if ($db_recordcount>0){
?>
      <center>
<i>
<img border="0" src="imgs/icons_reports.png" width="24" height="20" align="texttop"> FAALİYET 
RAPORU</i></center>

    </div>
			<div align="center">
      <center>
       </center>
    </div>
    <table border="1" cellspacing="1" width="773" id="table17" bordercolor="#BCBCBC">

	<tr>
							<td align="center" bgcolor="#E1E1E1" width="240"><u>
							<font size="2" color="#636363"><b>İşin Adı</b></font></u></td>
			
							<td align="center" bgcolor="#E1E1E1" width="240"><u>
							<font size="2" color="#636363"><b>Ekip Başı</b></font></u></td>
							<td align="center" bgcolor="#E1E1E1" width="240">
							<u><font size="2" color="#636363"><b>Tarih</b></font></u></td>
							<td align="center" bgcolor="#E1E1E1" width="240">
							<u><font size="2" color="#636363"><b>Detay</b></font></u></td>
						</tr>
<?php
while($row = mysql_fetch_array($result))
{
?>
							<tr bgcolor='#efefef' onmouseover="this.style.background='#ffffff';" onmouseout="this.style.background='#efefef';">
							<td align="center" width="285">
							<font size="2"> <?php echo isNullfunc($row[2]);?></font></td>				
							<td align="center" width="285">
							<font size="2"> <?php echo isNullfunc($row[3]);?></font></td>
							<td align="center" width="225">
							<font size="2"> <?php echo isNullfunc(date('d.m.Y', strtotime($row[4]))); ?></font></td>
							<td align="center">
							<a href="javascript:expandingWindow('joint.php?id=<?php echo $row[0];?>&sum=exp',600,455);"><font size="2" color="#636363">Detay</font></a></td>
						</tr>
<?php
}
mysql_close($con);
?>
</table>
<?php
}
}





}






if ($sum=="jobmask")
{
$starthourcontent="";
$startminutecontent="";
$endhourcontent="";
$endminutecontent="";

for ($i = 0; $i <= 23; $i++) {


if ($i<10)
{
$printnum="0$i";
}
else
{
$printnum=$i;
}

$starthourcontent .="<option value=$printnum>$printnum</option>";
}




for ($i = 0; $i <= 59; $i++) {


if ($i<10)
{
$printnum="0$i";
}
else
{
$printnum=$i;
}

$startminutecontent .= "<option value=$printnum>$printnum</option>";
}


$endhourcontent=$starthourcontent;
$endminutecontent=$startminutecontent;






$listboxcontent3="";
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("SELECT * FROM bolgeler order by bolge_id");
while($row = mysql_fetch_array($result))
{
$listboxcontent3 .="<option value='";
$listboxcontent3 .=$row['bolge_id'];
$listboxcontent3 .="'>";
$listboxcontent3 .=$row['bolge_ad'];
$listboxcontent3 .="</option>";
}
mysql_close($con);
}


for ($i=1;$i<=$id;$i++)
{
?>
<font color="#FF0000">*</font>  <font size="2" color="#636363"><b>» FAALİYET-<?php echo $i; ?></b></font>
		<table border="1" cellspacing="1" width="588" id="table36" bordercolor="#BCBCBC" height="286">
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Bölge:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="290">
							<font size="2" color="#636363">
									
											
  <select size="1" id="bolge<?php echo $i; ?>" name="bolge<?php echo $i; ?>" onchange="getByDist(document.getElementById('bolge<?php echo $i; ?>').value,'','<?php echo $i; ?>');document.getElementById('subcard<?php echo $i; ?>').innerHTML='';">
			<option value=0>Bölge Seçiniz</option>
<?php echo $listboxcontent3; ?>
</select>
</font></td>
						</tr>
							<tr>
							<td align="center" bgcolor="#E1E1E1" width="285" height="25">
							<u><font size="2" color="#636363"><b>Kavşak:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="290" height="25">
							<font size="2" color="#636363"> <font id="card<?php echo $i; ?>">
							<select size="1" id="kavsak<?php echo $i; ?>" name="kavsak<?php echo $i; ?>" disabled=true>
			<option value=0>Kavşak Seçiniz</option>
			</select>  		
			</font><b>
			<font id="subcard<?php echo $i; ?>" face="Trebuchet MS" size="2"></font></b>

</font></td>
						</tr>
											
						
					
							<tr>
							<td align="center" bgcolor="#E1E1E1" width="285" height="25">
							<u><font size="2" color="#636363"><b>Başlama Saati:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="290" height="25">
							<font size="2" color="#636363">
									
											
									 
									
																
																
<select size="1" id="baslama_saat<?php echo $i; ?>" name="baslama_saat<?php echo $i; ?>">
<?php echo $starthourcontent; ?>
</select>

							:

<select size="1" id="baslama_dakika<?php echo $i; ?>" name="baslama_dakika<?php echo $i; ?>">
<?php echo $startminutecontent; ?>
</select>
			
			
									</font></td>
						</tr>
											
						
					
							<tr>
							<td align="center" bgcolor="#E1E1E1" width="285" height="25">
							<u><font size="2" color="#636363"><b>Bitiş Saati:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="290" height="25">
							<font size="2" color="#636363">
									
											
									  
							<select size="1" id="bitis_saat<?php echo $i; ?>" name="bitis_saat<?php echo $i; ?>">
<?php echo $endhourcontent; ?></select>

							:

<select size="1" id="bitis_dakika<?php echo $i; ?>" name="bitis_dakika<?php echo $i; ?>">
<?php echo $endminutecontent; ?></select></font></td>
						</tr>
											
						
					
							<tr>
							<td align="center" bgcolor="#E1E1E1" width="285" height="25">
							<u><font size="2" color="#636363"><b>İşin Adı:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="290" height="25">
							<font size="2" color="#636363">
									
											
									 <input type="text" id="isadi<?php echo $i; ?>" name="isadi<?php echo $i; ?>" size="20" maxlength="100"></font></td>
						</tr>
											
						
					
							<tr>
							<td align="center" bgcolor="#E1E1E1" width="285" height="162">
							<u><font size="2" color="#636363"><b>İşin Detayı:</b></font></u></td>
							<td align="center" bgcolor="#E1E1E1" width="290" height="162" valign="top">
							<p align="left"> <textarea rows="10" id="aciklama<?php echo $i; ?>" name="aciklama<?php echo $i; ?>" cols="28"></textarea><br>
 </td>
						</tr>
										
										




	
						<tr>
							<td align="center" bgcolor="#E1E1E1" height="75" width="285" valign="top">
							<u><font size="2" color="#636363"><b><br>
							Ekli Dökümanlar:</b></font></u><p>
							<span style="vertical-align: middle">
							<font size="2" color="#636363">Döküman</font></span><font size="2" color="#636363"><span style="vertical-align: middle"> 
							Sayısı</span>

								<select size="1" id="dokumansayisi_is<?php echo $i; ?>" name="dokumansayisi_is<?php echo $i; ?>" onchange="dokumanlistesi(document.getElementById('dokumansayisi_is<?php echo $i; ?>').value, <?php echo $i; ?>);">
<?php
for ($d = 1; $d <= 20; $d++) 
{
echo "<option value=$d>$d</option>";
}
?>
							</select>							<br>
							 </font></td>
							<td align="center" bgcolor="#E1E1E1">
					
					
<table border="0" width="100%" id="table35">
								<tr>
									<td height="39">
							
<span id="dokumanlar_is<?php echo $i; ?>">
<input type="file" name="dokuman1_is<?php echo $i; ?>" id="dokuman1_is<?php echo $i; ?>" size="20">
</span>			
							
							
							
							
							
							
							
							
							</td>
								</tr>
								</table>							</td>
						</tr>
						
						
						








		

					
						</table><br>
						<?
}

}






if ($sum=="list")
{
?>
<body bgcolor="#FBFBFB">
<script type="text/javascript">
function expandingWindow(website,yukseklik,genislik) {

// Dikine açılma hizi (Yüksek değer=hızlı)
var heightspeed = 10;

// Genişlemesine açılma hizi (Yüksek değer=hızlı)
var widthspeed = 10;

// Soldan Kaç Piksel solda görünecek
var leftdist = 0;

// Yukarıdan Kaç Piksel aşağıda görünecek
var topdist = 0; 

if (document.all) {
var winwidth = genislik;
var winheight = yukseklik;
var sizer = window.open("","","left=" + leftdist + ",top=" + topdist + ",width=1,height=1,scrollbars=no, location=no, status=no, toolbar=no,menubar=no");
for (sizeheight = 1; sizeheight < winheight; sizeheight += heightspeed) {
sizer.resizeTo("1", sizeheight);
}
for (sizewidth = 1; sizewidth < winwidth; sizewidth += widthspeed) {
sizer.resizeTo(sizewidth, sizeheight);
}
sizer.location = website;
}
else
window.open(website,'mywindow','width=' + genislik + ',height=' + yukseklik)
}
</script>
<div align="center">
<?php
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){


mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("select iid,rapor_id,isadi,(select isim from kullanicilar where id=(select ekip_basi from raporlar where rapor_id=rapor_isler.rapor_id)),((select tarih from raporlar where rapor_id=rapor_isler.rapor_id)) from rapor_isler order by iid desc");
$db_recordcount = mysql_num_rows($result);

if ($db_recordcount>0){
?>
	<table border="0" width="99%" id="table11">
		<tr>
			<td valign="top">
			<?php
			include("include/label.php")
			?>			

	
	
	
      <center>
<i>
<br>
<br>
<img border="0" src="imgs/icons_reports.png" width="24" height="20" align="texttop"> 
	  FAALİYET DÖKÜMÜ<br>
 </i></center>

    </div>
        <div align="center">
        <table border="1" cellspacing="1" width="773" bordercolor="#BCBCBC">
	<tr>
							<td align="center" bgcolor="#E1E1E1" width="240"><u>
							<font size="2" color="#636363"><b>İşin Adı</b></font></u></td>
			
							<td align="center" bgcolor="#E1E1E1" width="240"><u>
							<font size="2" color="#636363"><b>Ekip Başı</b></font></u></td>
							<td align="center" bgcolor="#E1E1E1" width="240">
							<u><font size="2" color="#636363"><b>Tarih</b></font></u></td>
							<td align="center" bgcolor="#E1E1E1" width="240">
							<u><font size="2" color="#636363"><b>Detay</b></font></u></td>
						</tr>

<?php
while($row = mysql_fetch_array($result))
{
?>
							<tr bgcolor='#efefef' onmouseover="this.style.background='#ffffff';" onmouseout="this.style.background='#efefef';">
							<td align="center" width="285">
							<font size="2"> <?php echo isNullfunc($row[2]);?></font></td>				
							<td align="center" width="285">
							<font size="2"> <?php echo isNullfunc($row[3]);?></font></td>
							<td align="center" width="225">
							<font size="2"> <?php echo isNullfunc(date('d.m.Y', strtotime($row[4]))); ?></font></td>
							<td align="center">
							<a href="javascript:expandingWindow('joint.php?id=<?php echo $row[0];?>&sum=exp',600,425);"><font size="2" color="#636363">Detay</font></a></td>
						</tr>
<?php
}
mysql_close($con);
?>
						</table>
</div>

<?php
}
}
?>
</td>
			<td width="210" valign="top">
			<?php include('include/menu.php'); ?>
			</td>
		</tr>
	</table>

<?php
}



if ($sum=="add")
{


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);

mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");



//RAPORDA GEÇEN EKİP ELEMANLARI DÖKÜMLENİYOR
$ekip_elemanlari="";
for ( $counter = 1; $counter <= $elemansayisi; $counter++) 
{
if ($_POST['ekipelemani' . $counter]<>'')
{
$ekip_elemanlari = $ekip_elemanlari . $_POST['ekipelemani' . $counter] . ";";
}
}


//RAPORUN GENEL BİLGİLERİ GENEL RAPOR TABLOSUNA EKLENİYOR
mysql_query("insert into raporlar (ekip_basi,ekip_elemanlari,tarih,aciklama,yapilacakisler) values ($ekipbasi,'$ekip_elemanlari', '$tarih', '$aciklama', '$yapilacakisler')");


//RAPORUN RAPOR ID Sİ ELDE TUTULUYOR (DOSYA ADI OLUŞTURMADA KULLANILIYOR)
$rapor_id = mysql_fetch_object(mysql_query("select rapor_id from raporlar where ekip_basi=$ekipbasi and ekip_elemanlari='$ekip_elemanlari' and tarih='$tarih' and aciklama='$aciklama' and yapilacakisler='$yapilacakisler' order by rapor_id desc"));
$rapor_id=$rapor_id->rapor_id;












//RAPORDA GEÇEN HER İŞİN KAYDI İLGİLİ TABLOYA EKLENİYOR
for ( $counter = 1; $counter <= $issayisi; $counter++) 
{
mysql_query("insert into rapor_isler (rapor_id, kavsak, baslama_saati, bitis_saati, isadi, aciklama) values ($rapor_id , " . $_POST['kavsak' . $counter] . ",'" . $_POST['baslama_saat' . $counter] . ":" . $_POST['baslama_dakika' . $counter] . "','" .  $_POST['bitis_saat' . $counter] . ":" . $_POST['bitis_dakika' . $counter] .  "', '" . $_POST['isadi' . $counter] . "', '" . $_POST['aciklama' . $counter] . "')") ;


//HER İŞİN ID Sİ ELDE TUTULUYOR (DOSYA ADI OLUŞTURMADA KULLANILIYOR)
$dokuman_id = mysql_fetch_object(mysql_query("select iid from rapor_isler where kavsak=" . $_POST['kavsak' . $counter] . " and baslama_saati='" . $_POST['baslama_saat' . $counter] . ":" . $_POST['baslama_dakika' . $counter] . "' and bitis_saati='" .  $_POST['bitis_saat' . $counter] . ":" . $_POST['bitis_dakika' . $counter] .  "' and isadi='" . $_POST['isadi' . $counter] . "' and aciklama='" . $_POST['aciklama' . $counter] . "' order by iid desc"));
$dokuman_id=$dokuman_id->iid;


$dokumansayisi=$_POST['dokumansayisi_is' . $counter];

//RAPORDA GEÇEN DÖKÜMANLAR UPLOAD EDİLİP KAYDA GİRİLİYOR
for ( $counter2 = 1; $counter2 <= $dokumansayisi; $counter2++) 
{
$dokuman_ad=$_FILES["dokuman" . $counter2 . "_is" . $counter]['name'];
if ($dokuman_ad<>'')
{
echo $dokuman_ad . "<br>";
$OriginalFilename = $FinalFilename = preg_replace('`[^a-z0-9-_.]`i','',$_FILES["dokuman" . $counter2 . "_is" . $counter]['name']); 
$FileCounter = 1; 

while (file_exists( 'files/'.$FinalFilename ))
$FinalFilename = $FileCounter++.'_'.$OriginalFilename; 

move_uploaded_file ( $_FILES["dokuman" . $counter2 . "_is" . $counter]['tmp_name'], "files/$FinalFilename" ); 
mysql_query("insert into ekler (id, dosya, tur) values ($dokuman_id, '$FinalFilename', 2)");

}
}




}

?>
<script>
success("<b>Ekip raporunuz sisteme başarıyla kayıt edilmiştir!!!</b>","index.php");
</script>
<?php
die();
}
	

	

$listboxcontent="";
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("select * from kullanicilar where ekipbasi=1 order by id");

while($row = mysql_fetch_array($result))
{
$listboxcontent .= "<option value='";
$listboxcontent .= $row['id'];
$listboxcontent .= "'>";
$listboxcontent .= $row['isim'];
$listboxcontent .= "</option>";
}
mysql_close($con);
}

$listboxcontent2="";
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("select * from kullanicilar where ekipbasi=0 order by id");

while($row = mysql_fetch_array($result))
{
$listboxcontent2 .= "<option value='";
$listboxcontent2 .= $row['id'];
$listboxcontent2 .= "'>";
$listboxcontent2 .= $row['isim'];
$listboxcontent2 .= "</option>";
}
mysql_close($con);
}
?>

<script type="text/javascript" src="js/ajax.js"></script>
<script>

function elemanlistesi(sayi)
{
var tumelemanlar="";

for (i=1;i<=sayi;i++)
{
tumelemanlar = tumelemanlar + "  <select id=ekipelemani" + i + " name=ekipelemani" + i + " size=1><option value=0>Seçiniz</option><?php echo $listboxcontent2;?></select><br>";
}
document.getElementById('elemanlar').innerHTML="<br>" + tumelemanlar + "<br>";
}

function dokumanlistesi(sayi, is)
{
var tumdokumanlar="";

for (i=1;i<=sayi;i++)
{
tumdokumanlar= tumdokumanlar+ "  <input type=file name=dokuman" + i + "_is" + is + " id=dokuman" + i + "_is" + is + " size=20><br>";
}
document.getElementById('dokumanlar_is' + is).innerHTML="<br>" + tumdokumanlar + "<br>";
}


function formkontrol()
{


if (document.getElementById('ekipbasi').value=='0'){error('<b>Lütfen ekip başı olan personeli seçiniz!</b>'); return 1;}
if (document.getElementById('ekipelemani1').value=='0'){error('<b>Lütfen en az 1 ekip elemanı giriniz!</b>'); return 1;}
 
if (document.getElementById('tarih_gun').value=='0'){error('<b>Lütfen rapor Gün`ünü giriniz!</b>'); return 1;}
if (document.getElementById('tarih_ay').value=='0'){error('<b>Lütfen rapor Ay`ını giriniz!</b>'); return 1;}
if (document.getElementById('tarih_yil').value=='0'){error('<b>Lütfen rapor Yıl`ını giriniz!</b>'); return 1;}

if (document.getElementById('kavsak1').value=='0'){error('<b>Lütfen #1 nolu işin hangi kavşakta yapıldığını giriniz!</b>'); return 1;}

 
return 0;
}


function isNumeric(value) {
  if (value != null && !value.toString().match(/^[-]?\d*\.?\d*$/)) return false;
  return true;
}
</script>

<body bgcolor="#FBFBFB">

	<table border="0" width="99%" id="table11">
		<tr>
			<td valign="top" align="center">
			<div align="center">
<?php
include("include/label.php")
?>
    </div>
			<div align="center">
      <center>
    <div align="center">
    <font color="#808080"><b><u><i><br>
		EKİP RAPORU EKLEME</i></u></b></font>
    
    <p align="left"><br>
	<font color="#FF0000">*</font> Zorunlu Alanlar</p>
    
    <form method="post" onsubmit="if (formkontrol()==1){return false;}" action="" enctype="multipart/form-data">

      <p align="left" style="color: #636363; font-weight: bold;">

      <span style="font-size: medium;" lang="en-us">» </span>GÜNLÜK PLANLAMA</p>
		<p align="left">

        <font color="#636363"><u><b>Ekip Bilgisi:</b></u></font>

	    
    </p>
		<div align="left">

	    
    <table border="1" cellspacing="1" width="587" id="table15" bordercolor="#BCBCBC" height="122">
		<tr>
			<td align="center" bgcolor="#E1E1E1" width="285">
			<font color="#FF0000">*</font> <u>
			<font size="2" color="#636363"><b>Ekip Başı:</b></font></u></td>
			<td align="center" bgcolor="#E1E1E1" width="289">
			<table border="0" width="100%" id="table30">
				<tr>
					<td><font size="2" color="#636363">
					<select id="ekipbasi" name="ekipbasi" size="1">
					<option value="0">Seçiniz</option>
<?php echo $listboxcontent;?></select> </font></td>
				</tr>
			</table></td>
		</tr>
		<tr>
			<td align="center" bgcolor="#E1E1E1" width="285" height="85" valign="top">
			<u><font size="2" color="#636363"><b><br></b></font></u>
			<font color="#FF0000">*</font> <u><font size="2" color="#636363"><b>
			Ekip Elemanları:</b></font></u><p>
			<font size="2" color="#636363"><span style="vertical-align: middle">
			Eleman Sayısı</span>
			<select size="1" id="elemansayisi" name="elemansayisi" onchange="elemanlistesi(document.getElementById('elemansayisi').value);">
							<?php

for ($i = 1; $i <= 20; $i++) {

echo "<option value=$i>$i</option>";
}
?></select> </font></td>
			<td align="center" bgcolor="#E1E1E1" width="289" height="85">
			<font size="2" color="#636363">
			<table border="0" width="100%" id="table29">
				<tr>
					<td height="39"><span id="elemanlar">  <select id="ekipelemani1" name="ekipelemani1" size="1">
					<option value="0">Seçiniz</option>
<?php echo $listboxcontent2;?></select> </span>
</font></p></td>
				</tr>
			</table></td>
		</tr>
	</table>
				
      </div>
		<p align="left">
				
      <font color="#636363"><u><b><br>
		Rapor Detayları:</b></u></font>

	    
    </p>
		<div align="left">

	    
    <table border="1" cellspacing="1" width="587" id="table18" bordercolor="#BCBCBC" height="159">
						<tr>
							<td align="center" bgcolor="#E1E1E1" height="28">
							<font color="#FF0000">*</font> <u>
							<font size="2" color="#636363"><b>Tarih:</b></font></u></td>
							<td align="center" bgcolor="#E1E1E1" height="28">
					
					
<table border="0" width="100%" id="table31">
								<tr>
									<td>
							<font size="2" color="#636363">
		<select name="tarih_gun" id="tarih_gun" size="1">
				<option value="0">Gün</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
				</select>
				<select name="tarih_ay" id="tarih_ay" size="1">
				<option value="0">Ay</option>
				<option value="1">Ocak</option>
				<option value="2">Şubat</option>
				<option value="3">Mart</option>
				<option value="4">Nisan</option>
				<option value="5">Mayıs</option>
				<option value="6">Haziran</option>
				<option value="7">Temmuz</option>
				<option value="8">Ağustos</option>
				<option value="9">Eylül</option>
				<option value="10">Ekim</option>
				<option value="11">Kasım</option>
				<option value="12">Aralık</option>
				</select>
				<select name="tarih_yil" id="tarih_yil" size="1">
				<option value="0">Yıl</option>
				
				<?php
for ($i = date("Y"); $i >= date("Y")-5; $i--) 
{
echo "<option value=$i>$i</option>";
}
?>
		</select> 
</font></td>
								</tr>
								</table>							</td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285" height="23">
							<u><font size="2" color="#636363"><b>Açıklama:</b></font></u></td>
							<td align="center" bgcolor="#E1E1E1" width="289" height="23">
					
					
<table border="0" width="100%" id="table32">
								<tr>
									<td>
							<font size="2" color="#636363">
									
											
<input type="text" id="aciklama" name="aciklama" size="20" maxlength="250">
</font></td>
								</tr>
								</table>							</td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285" height="108" valign="top">
							<u><font size="2" color="#636363"><b>Yapılacak 
							İşler:</b></font></u><p> </td>
							<td align="center" bgcolor="#E1E1E1" width="289" height="108" valign="top">
							<p align="left"> <textarea rows="10" name="yapilacakisler" id="yapilacakisler" cols="28"></textarea><font size="1"><br>
							</font><br>
							 </td>
						</tr>
																		
						
					
						</table>
				
		<div align="left">

	    
				
			<br>

      <p align="left" style="color: #636363; font-weight: bold;">

      <span style="font-size: medium;" lang="en-us">» </span>EKİP RAPORU</p>

	    
				
		</div>

				
		</div>
		<p align="left"><u><font size="2" color="#636363"><b>
		<br>
		</b></font></u><span style="vertical-align: middle">
		<font size="2" color="#636363">Yapılan Faaliyet</font></span><font size="2" color="#636363"><span style="vertical-align: middle"> 
		Sayısı</span>

								<select size="1" id="issayisi" name="issayisi" onchange="getJobs(document.getElementById('issayisi').value);">
<?php
for ($i = 1; $i <= 10; $i++) 
{
echo "<option value=$i>$i</option>";
}
?>
							</select>
							
							<script>
							getJobs(document.getElementById('issayisi').value);
							</script>

							<br>
		 </font> </p>

	<div align="left">
<span id="card_jobs">&nbsp;</span>

		<div align="left">

			 </div>
		<div align="left">

	    
		
				
	    
		<p><br>
		 </div>

				
<p align="center">
					<input type="submit" value="Ekip Raporu Ekle">
	</p>
	<p></form></center>
    </div></center>
    </div>
			<p align="left"> <p align="left"> </td>
			<td width="210" valign="top">
			<?php include('include/menu.php');?>
			</td>
		</tr>
	</table>
	
</p>
</body>
<?php 	
}  
?></html>
