<?php
include("include/header.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/alertbox.js"></script>
</head>
<?php
include("include/session.php");
include("include/mysql.php");

$id=$_GET['id'];
$sum=$_GET['sum'];

$mode=$_GET['mode'];
$num=$_GET['num'];

function isNullfunc($str)
{
if ($str=="")
{return "<font color=blue>-</font>";}
else
{return $str;}
}








$kavsak_ad=$_POST['kavsak_ad'];
$kavsak_kod=$_POST['kavsak_kod'];
$kavsak_cihaz=$_POST['kavsak_cihaz'];
$kavsak_grupsayisi=$_POST['kavsak_grupsayisi'];
$kavsak_durumu=$_POST['kavsak_durumu'];
$kavsak_yapimtarihi=$_POST['kavsak_yapimtarihi'];
$kavsak_adres=$_POST['kavsak_adres'];
$kavsak_bolgesi=$id;

$tarih_yil=$_POST['tarih_yil'];
$tarih_ay=$_POST['tarih_ay'];
$tarih_gun=$_POST['tarih_gun'];




if ($sum=="edit" || $sum=="add")
{
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$kavsak_bolgesi=$_POST['kavsak_bolgesi'];


if ($sum=="add")
{
$kavsak_yapimtarihi="$tarih_yil-$tarih_ay-$tarih_gun";

$sumquery="insert into kavsaklar (kavsak_bolgesi,kavsak_kod,kavsak_ad,kavsak_cihaz,kavsak_grupsayisi,kavsak_durumu,kavsak_yapimtarihi,kavsak_adres) values ($kavsak_bolgesi, $kavsak_kod, '$kavsak_ad','$kavsak_cihaz',$kavsak_grupsayisi,$kavsak_durumu,'$kavsak_yapimtarihi','$kavsak_adres')";
$alertmessage="Yeni kav&#351;ak (" . $kavsak_ad . ") sisteme ba&#351;ar&#305;yla eklenmi&#351;tir!";
}
if ($sum=="edit")
{
$sumquery="update kavsaklar set kavsak_bolgesi=$kavsak_bolgesi,kavsak_kod=$kavsak_kod,kavsak_ad='$kavsak_ad',kavsak_cihaz='$kavsak_cihaz',kavsak_grupsayisi=$kavsak_grupsayisi,kavsak_durumu=$kavsak_durumu,kavsak_yapimtarihi='$kavsak_yapimtarihi',kavsak_adres='$kavsak_adres' where kavsak_id=$id";
$alertmessage="Mevcut kav&#351;ak üzerindeki de&#287;i&#351;iklikler sisteme ba&#351;ar&#305;yla kay&#305;t edilmi&#351;tir!";
}

$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
mysql_query($sumquery);
?>
<script>
success("<b><?php echo $alertmessage; ?></b>","index.php");
</script>
<?php
mysql_close($con);
}


}


if ($sum=="edit")
{
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("select (select bolge_no from bolgeler where bolge_id=kavsak_bolgesi),(select bolge_ad from bolgeler where bolge_id=kavsak_bolgesi),kavsak_id,kavsak_kod,kavsak_ad,kavsak_cihaz,kavsak_grupsayisi,kavsak_durumu,kavsak_yapimtarihi,kavsak_adres,kavsak_bolgesi from kavsaklar where kavsak_id=$id");
while($row = mysql_fetch_array($result))
{

$fullkavsak="$row[1]$row[0]$row[kavsak_kod]";
$kavsak_ad=$row["kavsak_ad"];
$kavsak_cihaz=$row["kavsak_cihaz"];
$kavsak_grupsayisi=$row["kavsak_grupsayisi"];
$kavsak_durumu=$row["kavsak_durumu"];
$kavsak_adres=$row["kavsak_adres"];
$kavsak_kod=$row[kavsak_kod];
$kavsak_bolgesi=$row[kavsak_bolgesi];

$kavsak_yapimtarihi=$row["kavsak_yapimtarihi"];

$kavsak_yapimtarihi=explode("-", $kavsak_yapimtarihi);

$tarih_yil=$kavsak_yapimtarihi[0];
$tarih_ay=$kavsak_yapimtarihi[1];
$tarih_gun=$kavsak_yapimtarihi[2];

}
mysql_close($con);
}
}


?>
<script>
function formkontrol()
{

if (document.getElementById('kavsak_ad').value==''){error('Lütfen kav&#351;ak ad&#305;n&#305; giriniz!'); return 1;}
if (document.getElementById('kavsak_kod').value==''){error('Lütfen kav&#351;ak kodunu giriniz!');return 1;}
if (document.getElementById('kavsak_cihaz').value==''){error('Lütfen kav&#351;ak cihaz markas&#305; hakk&#305;nda bilgi veriniz!');return 1;}
if (document.getElementById('kavsak_grupsayisi').value==''){error('Kav&#351;ak grup say&#305;s&#305;n&#305; giriniz!');return 1;}
if (document.getElementById('kavsak_adres').value==''){error('Kav&#351;ak adresini giriniz!');return 1;}

if (document.getElementById('tarih_gun').value==0){error('Lütfen yap&#305;m tarihini eksiksiz giriniz!  (Gün Eksik)'); return 1;}
if (document.getElementById('tarih_ay').value==0){error('Lütfen yap&#305;m tarihini eksiksiz giriniz!  (Ay Eksik)'); return 1;}
if (document.getElementById('tarih_yil').value==0){error('Lütfen yap&#305;m tarihini eksiksiz giriniz!!  (Y&#305;l Eksik)'); return 1;}

if (isNumeric(document.getElementById('kavsak_kod').value)==false){error('Kav&#351;ak Kodu ancak nümerik (rakamlardan olu&#351;an) bir de&#287;er alabilir. Lüften gerekli düzeltmeyi yap&#305;n&#305;z!!'); return 1;}
if (isNumeric(document.getElementById('kavsak_grupsayisi').value)==false){error('Grup Say&#305;s&#305; ancak nümerik (rakamlardan olu&#351;an) bir de&#287;er alabilir. Lüften gerekli düzeltmeyi yap&#305;n&#305;z!!'); return 1;}
}

function isNumeric(value) {
  if (value != null && !value.toString().match(/^[-]?\d*\.?\d*$/)) return false;
  return true;
}
</script>
<body bgcolor="#FBFBFB">

	<table border="0" width="99%" id="table11">
		<tr>
			<td valign="top">
			<?php
			include("include/header.php")
			?>			
			<div align="center">
      <center>
    <div align="center">
      <center>
      <form method="post" onsubmit="if (formkontrol()==1){return false;}" action="">
      <center>
      &nbsp;<?php echo $bolge_ad;?><?php echo $bolge_no; ?></center>
    </div>    
    <div align="center">
    <table border="1" cellspacing="1" width="634" id="table15" bordercolor="#BCBCBC" height="212">
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="303">
							<font size="2" color="#636363"><u>
							<b>Kav&#351;ak Ad&#305;:</b></u></font></td>
							<td align="left" bgcolor="#E1E1E1" width="318">
							<font size="2" color="#636363">
							&nbsp;<input type="text" id="kavsak_ad" value="<?php echo $kavsak_ad;?>" name="kavsak_ad" size="20"></font></td>
						</tr>
							<tr>
							<td align="center" bgcolor="#E1E1E1" width="303"><u>
							<font size="2" color="#636363"><b>Kav&#351;ak Kod:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="318"><font size="2" color="#636363">
									&nbsp;<input type="text" id="kavsak_kod" value="<?php echo $kavsak_kod;?>" name="kavsak_kod" size="20"></font></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="303"><u>
							<font size="2" color="#636363"><b>Kav&#351;ak Bölgesi:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="318"><font size="2" color="#636363">
									
												&nbsp;<select id="kavsak_bolgesi" name="kavsak_bolgesi" size="1">
<?php
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("SELECT * FROM bolgeler order by bolge_id");
while($row = mysql_fetch_array($result))
{
echo "<option value='";
echo $row['bolge_id'];
echo "'"; 
if ($row['bolge_id']==$kavsak_bolgesi){echo " selected";}
echo ">";
echo $row['bolge_ad'];
echo "</option>";
}
mysql_close($con);
}


?>
</select></font></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="303"><u>
							<font size="2" color="#636363"><b>Cihaz:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="318"><font size="2" color="#636363">
									&nbsp;<input type="text" id="kavsak_cihaz" value="<?php echo $kavsak_cihaz;?>" name="kavsak_cihaz" size="20"></font></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="303"><u>
							<font size="2" color="#636363"><b>Grup Say&#305;s&#305;:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="318"><font size="2" color="#636363">
									&nbsp;<input type="text" id="kavsak_grupsayisi" value="<?php echo $kavsak_grupsayisi;?>" name="kavsak_grupsayisi" size="20"></font></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="303"><u>
							<font size="2" color="#636363"><b>Durumu:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="318"><font size="2" color="#636363">

									&nbsp;<select id="kavsak_durumu" name="kavsak_durumu" size="1">
									<option <?php if ($kavsak_durumu==1){echo 'selected';};?> value="1">
									Aktif</option>
									<option <?php if ($kavsak_durumu==0){echo 'selected';};?> value="0">
									Pasif</option></select></font></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="303"><u>
							<font size="2" color="#636363"><b>Yap&#305;m Tarihi:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="318">
							<font size="2" color="#636363">
									&nbsp;<select name="tarih_gun" id="tarih_gun" size="1">
			
			<?php
if ($sum=="add")echo "<option value=0>Gün</option>";


for ($i = 1; $i <= 30; $i++) {

echo "<option value=" . $i;
if ($i==$tarih_gun)echo " selected";
echo">" . $i . "</option>";
}
?>
				</select>
				<select name="tarih_ay" id="tarih_ay" size="1">
				<?php
				if ($sum=="add")echo "<option value=0>Ay</option>";

$yillar=array("Ocak","&#350;ubat","Mart","Nisan","May&#305;s","Haziran","Temmuz","A&#287;ustos","Eylül","Ekim","Kas&#305;m","Aral&#305;k");

for ($i = 1; $i <= 12; $i++) 
{
echo "<option value=" . $i;

if ($i==$tarih_ay)echo " selected";


echo ">" . $yillar[$i-1] . "</option>";
}
?>

				</select>
				
				
				<select name="tarih_yil" id="tarih_yil" size="1">
				
				<?php
if ($sum=="add")echo "<option value=0>Y&#305;l</option>";

for ($i = date("Y"); $i >= date("Y")-20; $i--) 
{
echo "<option value=" . $i;
if ($i==$tarih_yil)echo " selected";
echo ">$i</option>";
}
?>
		</select>&nbsp;
	
									
									</font></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="303"><u>
							<font size="2" color="#636363"><b>Adres:</b></font></u></td>
							<td align="left" bgcolor="#E1E1E1" width="318"><font size="2" color="#636363">
									&nbsp;<input type="text" id="kavsak_adres" value="<?php echo $kavsak_adres;?>" name="kavsak_adres" size="20"></font></td>
						</tr>
					
						
					
						</table>
				
<p align="center">
					<input type="submit" value="Kav&#351;ak <?php if($sum=='add'){echo 'Ekle';} if($sum=='edit'){echo 'Düzenle';} ?>">
	</p>
	<p></form></center>
    </div></center>
    </div>
			<p align="left">&nbsp;<p align="left">&nbsp;</td>
			<td width="210" valign="top">
			<?php include('include/menu.php'); ?>
			</td>
		</tr>
	</table>
</p>




<?php
}





















if ($sum=="list") ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("SELECT * FROM kavsaklar where kavsak_bolgesi=$id order by kavsak_id desc");

$listboxcontent="";
$scriptcontent="";
while($row = mysql_fetch_array($result))
{

$listboxcontent.="<option value='";
$listboxcontent.=$row['kavsak_id'];
$listboxcontent.="'>";

if (strlen($row['kavsak_kod'])==1)
{
$listboxcontent.="0";
}
$listboxcontent.=$row['kavsak_kod'];
$listboxcontent.="</option>";

$scriptcontent.="junclist" . $num . "[". $row['kavsak_id'] . "]=new Array('" . $row['kavsak_ad'] . "');";
}
mysql_close($con);
}
?>
<select size="1" id="kavsak<?php echo $num;?>" name="kavsak<?php echo $num;?>" onchange="if (document.getElementById('kavsak<?php echo $num;?>').value!=0){ var junclist<?php echo $num;?>=new Array();<?php echo $scriptcontent;?>;document.getElementById('subcard<?php echo $num;?>').innerHTML=<?php if ($mode=="1"){ echo "'<img border=0 src=imgs/arrow.png width=16 height=16> ' + ";} ?>  junclist<?php echo $num;?>[document.getElementById('kavsak<?php echo $num;?>').value];}else{document.getElementById('subcard<?php echo $num; ?>').innerHTML='';}">
<option value=0>Kavşak Seçiniz</option>
<?php echo $listboxcontent; ?>
</select>
<?php
}







if ($sum=="delfile") ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");

$result6 = mysql_query("select * from ekler where ek_id=" . $id);
while($row5 = mysql_fetch_array($result6))
{
unlink("files/" . $row5["dosya"]);
}

mysql_query("delete from ekler where ek_id=" . $id);


mysql_close();
?>
<script>
location.href='<?php echo $_SERVER['HTTP_REFERER']; ?>';
</script>
<?php
}

if ($sum=="addfile") ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);

mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");

foreach($_FILES as $name => $value) {

$dokuman_ad=$_FILES[$name]['name'];
if ($dokuman_ad<>'')
{
$OriginalFilename = $FinalFilename = preg_replace('`[^a-z0-9-_.]`i','',$_FILES[$name]['name']); 
$FileCounter = 1; 

while (file_exists( 'files/'.$FinalFilename ))
$FinalFilename = $FileCounter++.'_'.$OriginalFilename; 

move_uploaded_file ( $_FILES[$name]['tmp_name'], "files/$FinalFilename" ); 
mysql_query("insert into ekler (id, dosya, tur) values ($id, '$FinalFilename', 1)");
}
}
mysql_close();
?>
<script>
location.href='<?php echo $_SERVER['HTTP_REFERER']; ?>';
</script>
<?php
}



if ($sum=="exp")  // EXPLANAT&#304;ON//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{

$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result2 = mysql_query("select * from rapor_isler where iid=$id");
while($row = mysql_fetch_array($result2))
{

echo "<html><head><title>";
echo $row["isadi"];
echo "</title></head><body>";

$result3 = mysql_query("select * from raporlar where rapor_id=" . $row["rapor_id"]);
while($row2 = mysql_fetch_array($result3))
{
?>
    <div align="center">
    	<font size="2"><i>GÜNLÜK PLANLAMA<br></i></font><br>
    <table border=1 cellspacing=1 width=408 id=table19 bordercolor=#BCBCBC>

												
	
						<tr bgcolor='#efefef' onmouseover='this.style.background='#ffffff';' onmouseout='this.style.background='#efefef';'>
							<td align='center' width='161' bgcolor='#E1E1E1'>
							<u>
							<font size='2' color='#636363'><b>Ekip Ba&#351;&#305;:</b></font></u></td>
							<td align='left' width='234'>
							<font size='2' color='#636363'>
							&nbsp;<?php
							
							$result4 = mysql_query("SELECT isim FROM kullanicilar where id=" . $row2["ekip_basi"] . " order by isim desc");		
							while($row3 = mysql_fetch_array($result4))
							{
 					   			echo " " . $row3["isim"];					   							   			
 					   		}
 					   		
							?>
</font></td>
						</tr>
		<tr bgcolor='#efefef' onmouseover='this.style.background='#ffffff';' onmouseout='this.style.background='#efefef';'>
							<td align='center' width='161' bgcolor='#E1E1E1'>
							<u>
							<font size='2' color='#636363'><b>Ekip Elemanlar&#305;:</b></font></u></td>
							<td align='left' width='234'>
							<font size='2' color='#636363'>
							&nbsp;<?php 
							
							$ekip_elemanlari = explode(";",$row2["ekip_elemanlari"]);
							$ekip_eleman_isimleri="";
							
							foreach ($ekip_elemanlari as $elemanid) 
							{
							$result5 = mysql_query("SELECT isim FROM kullanicilar where id=$elemanid order by isim desc");		


							
							while($row4 = mysql_fetch_array($result5))
							{
							$ekip_eleman_isimleri=$ekip_eleman_isimleri . " " . $row4["isim"] . ",";		   							   			
 					   		}
			
 					   			
							}
			
 					   		echo trim($ekip_eleman_isimleri,",");	
 	   
						?>
</font></td>
						</tr>
		<tr bgcolor='#efefef' onmouseover='this.style.background='#ffffff';' onmouseout='this.style.background='#efefef';'>
							<td align='center' width='161' bgcolor='#E1E1E1'>
							<u>
							<font size='2' color='#636363'><b>Tarih:</b></font></u></td>
							<td align='left' width='234'>
							<font size='2' color='#636363'>
							&nbsp;<?php echo date('d.m.Y', strtotime($row2["tarih"]));?>
</font></td>
						</tr>
		<tr bgcolor='#efefef' onmouseover='this.style.background='#ffffff';' onmouseout='this.style.background='#efefef';'>
							<td align='center' width='161' bgcolor='#E1E1E1'>
							<u>
							<font size='2' color='#636363'><b>Aç&#305;klama:</b></font></u></td>
							<td align='left' width='234'>
							<font size='2' color='#636363'>
							&nbsp;<?php echo $row2["aciklama"];?>
</font></td>
						</tr>
<tr bgcolor='#efefef' onmouseover='this.style.background='#ffffff';' onmouseout='this.style.background='#efefef';'>
							<td align='center' width='161' bgcolor='#E1E1E1'>
							<u>
							<font size='2' color='#636363'><b>Yap&#305;lacak &#304;&#351;ler:</b></font></u></td>
							<td align='left' width='234'>
							<font size='2' color='#636363'>
							&nbsp;<?php echo $row2["yapilacakisler"];?>
</font></td>
						</tr>

							</table>

		<br>

		<br><font size="2"><i>KAV&#350;AK FAAL&#304;YET B&#304;LG&#304;LER&#304;</i></font><br>

		<br>
    <table border=1 cellspacing=1 width=408 id=table1 bordercolor=#BCBCBC>

												
	
						<tr bgcolor='#efefef' onmouseover='this.style.background='#ffffff';' onmouseout='this.style.background='#efefef';'>
							<td align='center' width='161' bgcolor='#E1E1E1'>
							<u>
							<font size='2' color='#636363'><b>&#304;&#351;in Ad&#305;:</b></font></u></td>
							<td align='left' width='234'>
							<font size='2' color='#636363'>
							&nbsp;<?php echo $row["isadi"];?>
</font></td>
						</tr>

							<tr bgcolor='#efefef' onmouseover='this.style.background='#ffffff';' onmouseout='this.style.background='#efefef';'>
							<td align='center' width='161' bgcolor='#E1E1E1'>
							<u>
							<font size='2' color='#636363'><b>Ba&#351;lama Zaman&#305;:</b></font></u></td>
							<td align='left' width='234'>
							<font size='2' color='#636363'>&nbsp;<?php echo $row["baslama_saati"];?></font></td>
						</tr>
						
							<tr bgcolor='#efefef' onmouseover='this.style.background='#ffffff';' onmouseout='this.style.background='#efefef';'>
							<td align='center' width='161' bgcolor='#E1E1E1'>
							<u>
							<font size='2' color='#636363'><b>Biti&#351; Zaman&#305;:</b></font></u></td>
							<td align='left' width='234'>
							<font size='2' color='#636363'>&nbsp;<?php echo $row["bitis_saati"];?></font></td>
						</tr>
						
							<tr bgcolor='#efefef' onmouseover='this.style.background='#ffffff';' onmouseout='this.style.background='#efefef';'>
							<td align='center' width='161' bgcolor='#E1E1E1' valign="top">
							<u>
							<font size='2' color='#636363'><b>Aç&#305;klama:</b></font></u></td>
							<td align='left' width='234' valign="top"><table border="0" width="100%" id="table18">
								<tr>
									<td><font size='2' color='#636363'>&nbsp;<?php echo $row["aciklama"];?></font></td>
								</tr>
							</table>

							</td>
						</tr>
						</table>
</div>
<?
echo "</body>";
mysql_close($con);
}
}

}

?>
			
<?php
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("select * from ekler where id=$id and tur=2");
$db_recordcount = mysql_num_rows($result);

if ($db_recordcount>0){
?><br><br>
<center><img border="0" src="imgs/attach.gif" align="texttop"><font size="2"><i>KAV&#350;AK FAAL&#304;YET&#304;NE A&#304;T DOSYALAR</i></font></center></center>

    </div><br>
			<div align="center">
      		  <table border="1" cellspacing="1" id="table17" bordercolor="#BCBCBC" style="width: 408px">
				  <tr>
					  <td align="center" bgcolor="#E1E1E1" width="88"><u>
					  <font size="2" color="#636363"><b>Dosya No</b></font></u></td>
					  <td align="center" bgcolor="#E1E1E1" width="94"><u>
					  <font size="2" color="#636363"><b>Dosya Ad</b></font></u></td>
				  </tr>
						
											
<?php
while($row3 = mysql_fetch_array($result))
{
?>			
						<tr bgcolor='#efefef' onmouseover="this.style.background='#ffffff';" onmouseout="this.style.background='#efefef';">
							<td align="center" width="88">
							<font size="2" color="#636363">#<?php echo $row3["ek_id"]; ?></font></td>
							<td align="center" width="94">
							<font size="2" color="#636363">
							<a target="_blank" href="files/<?php echo $row3["dosya"];?>"><?php echo $row3["dosya"];?>
							</a></font></td>
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
<?
}


if ($sum=="view")
{


$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("select (select bolge_no from bolgeler where bolge_id=kavsak_bolgesi),(select bolge_ad from bolgeler where bolge_id=kavsak_bolgesi),kavsak_id,kavsak_kod,kavsak_ad,kavsak_cihaz,kavsak_grupsayisi,kavsak_durumu,kavsak_yapimtarihi,kavsak_adres,kavsak_bolgesi from kavsaklar where kavsak_id=$id");
while($row = mysql_fetch_array($result))
{

$fullkavsak="$row[0]$row[kavsak_kod] ($row[1])";
$kavsakad=$row["kavsak_ad"];
$kavsakcihaz=$row["kavsak_cihaz"];
$kavsakgrupsayisi=$row["kavsak_grupsayisi"];
$kavsakdurumu=$row["kavsak_durumu"];
$kavsakyapimtarihi=$row["kavsak_yapimtarihi"];

$kavsakyapimtarihi=date('d.m.Y', strtotime($kavsakyapimtarihi));


$kavsakadres=$row["kavsak_adres"];
}
mysql_close($con);
}
?>    
<script type="text/javascript">
function expandingWindow(website,yukseklik,genislik) {

// Dikine aç&#305;lma hizi (Yüksek de&#287;er=h&#305;zl&#305;)
var heightspeed = 10;

// Geni&#351;lemesine aç&#305;lma hizi (Yüksek de&#287;er=h&#305;zl&#305;)
var widthspeed = 10;

// Soldan Kaç Piksel solda görünecek
var leftdist = 0;

// Yukar&#305;dan Kaç Piksel a&#351;a&#287;&#305;da görünecek
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
	<body bgcolor="#FBFBFB">
	<table border="0" width="99%" id="table1">
		<tr>
			<td valign="top">
			<?php
			include("include/header.php")
			?>
		
			<p align="left">&nbsp;<div align="center">
      <center>
      <img border="0" src="imgs/joint.gif" width="33" height="20" align="texttop"><i>&nbsp; KAV&#350;AK DETAYLARI</i>&nbsp;&nbsp;&nbsp;<b><?php echo $fullkavsak;?></b></center>
    </div>
			<div align="center">
      <center>
      &nbsp;</center>
    </div>    
    <table border="1" cellspacing="1" width="773" id="table13" bordercolor="#BCBCBC">
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Kav&#351;ak Ad&#305;:</b></font></u></td>
							<td align="center" bgcolor="#E1E1E1" rowspan="6">
							<table border="0" width="100%" id="table14">
								<tr bgcolor="#efefef">
									<td>
							<font size="2" color="#636363">&nbsp;<?php echo $kavsakad;?></font></td>
								</tr>
								<tr bgcolor="#efefef">
									<td><font size="2" color="#636363">&nbsp;<?php echo $kavsakcihaz;?></font></td>
								</tr>
								<tr bgcolor="#efefef">
									<td><font size="2" color="#636363">&nbsp;<?php echo $kavsakgrupsayisi;?></font></td>
								</tr>
								<tr bgcolor="#efefef">
									<td><font size="2" color="#636363">&nbsp;<?php if($kavsakdurumu=="1"){echo "Aktif";}if ($kavsakdurumu==0){echo "Pasif";}?></font></td>
								</tr>
								<tr bgcolor="#efefef">
									<td><font size="2" color="#636363">&nbsp;<?php echo $kavsakyapimtarihi;?></font></td>
								</tr>
								<tr bgcolor="#efefef">
									<td><font size="2" color="#636363">&nbsp;<?php echo $kavsakadres;?></font></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Cihaz:</b></font></u></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Grup Say&#305;s&#305;:</b></font></u></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Durumu:</b></font></u></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Yap&#305;m Tarihi:</b></font></u></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#E1E1E1" width="285"><u>
							<font size="2" color="#636363"><b>Adres:</b></font></u></td>
						</tr>
						</table>
	
	<p align="center">&nbsp;            
            <div align="center">
<?php
$_GET['id'] = $id; 
$_GET['sum'] = 'rep'; 


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
<img border="0" src="imgs/icons_reports.png" width="24" height="20" align="texttop"> FAAL&#304;YET 
RAPORU</i></center>

    </div>
			<div align="center">
      <center>
      &nbsp;</center>
    </div>
    <table border="1" cellspacing="1" width="773" id="table17" bordercolor="#BCBCBC">

	<tr>
							<td align="center" bgcolor="#E1E1E1" width="240"><u>
							<font size="2" color="#636363"><b>&#304;&#351;in Ad&#305;</b></font></u></td>
			
							<td align="center" bgcolor="#E1E1E1" width="240"><u>
							<font size="2" color="#636363"><b>Ekip Ba&#351;&#305;</b></font></u></td>
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
							<font size="2">&nbsp;<?php echo isNullfunc($row[2]); ?></font></td>				
							<td align="center" width="285">
							<font size="2">&nbsp;<?php echo isNullfunc($row[3]);?></font></td>
							<td align="center" width="225">
							<font size="2">&nbsp;<?php echo isNullfunc(date('d.m.Y', strtotime($row[4]))); ?></font></td>
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


?>
            <p align="left">&nbsp;</td>
			<td width="213" valign="top">		
<?php include('include/menu.php'); ?>
	
			
<?php
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("select * from ekler where id=$id and tur=1");
$db_recordcount = mysql_num_rows($result);

if ($db_recordcount>0){
?>
<hr>
      <center>
<img border="0" src="imgs/attach.gif" align="texttop"><i>KAV&#350;A&#286;A A&#304;T DOSYALAR</i></center>
    </div>
			<div align="center">
      <center>
      &nbsp;</center>
    </div>
    <div align="center">
    <table border="1" cellspacing="1" width="281" id="table17" bordercolor="#BCBCBC">
	<tr>
							<td align="center" bgcolor="#E1E1E1" width="88"><u>
							<font size="2" color="#636363"><b>Dosya No</b></font></u></td>
							<td align="center" bgcolor="#E1E1E1" width="94"><u>
							<font size="2" color="#636363"><b>Dosya Ad</b></font></u></td>
						</tr>								
<?php
while($row = mysql_fetch_array($result))
{
?>			
						<tr bgcolor='#efefef' onmouseover="this.style.background='#ffffff';" onmouseout="this.style.background='#efefef';">
							<td align="center" width="88">
							<font size="2" color="#636363">#<?php echo $row["ek_id"]; ?>&nbsp;&nbsp;<a href="joint.php?sum=delfile&id=<?php echo $row["ek_id"];?>"><img border="0" src="imgs/del.gif" width="11" height="11" title="Dosyay&#305; Sil"></a></font></td>
							<td align="center" width="94">
							<font size="2" color="#636363"><a target="_blank" href="files/<?php echo $row["dosya"];?>" title="<?php echo $row["dosya"];?>"><? if (strlen($row["dosya"])>20){
							echo substr(trim($row["dosya"]),0,20);?>..  <?php } else { echo $row["dosya"]; } ?></a></font></td>
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
?><br>

 <form method="post" action="joint.php?id=<?php echo $id; ?>&sum=addfile" enctype="multipart/form-data">
<script>var frmareas=0;

function addattach()
{
frmareas+=1; 
document.getElementById('upsubmit').innerHTML='<br><br><input type=submit align=right value=\'Sisteme Yükle\'>'; 
document.getElementById('upform').innerHTML=document.getElementById('upform').innerHTML + '<br>		<input type=file class=file name=file' + frmareas + '/>';
}

</script>
<font color="#232323" face="Tahoma" size="2"  style="cursor:pointer;cursor:hand;" onclick="addattach();">
<span style="vertical-align: top; font-weight: 700"><font color="#232323">
<img border="0" src="imgs/plus.png" align="absbottom">Dosya Ekle</font></span></font><br>
<span id="upform">
</span>
<span id="upsubmit">
</span>
</form>

<p>
<hr><p align="center">
			<a href="joint.php?sum=edit&id=<?php echo $id;?>">
			<img border="0" src="imgs/edit.jpg"><br><font color="#253749">
			Bu kav&#351;a&#287;&#305;n bilgilerini düzenle</font></a></p>		
			</td>
		</tr>
</table>
<?php
}
?>
</html>