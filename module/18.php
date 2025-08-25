<?php
$listboxcontent="";
$scriptcontent="";

$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("SELECT * FROM rutbeler order by etiket");
$authcount=mysql_num_rows($result);



while($row = mysql_fetch_array($result))
{
$scriptcontent.="authlist[". $row['rid'] . "] = new Array('" .  mysql_num_rows(mysql_query("select * from kullanicilar where yetki=" . $row['rid'])) . "');";

$listboxcontent .=  "<option value='";
$listboxcontent .=  $row['rid'];
$listboxcontent .=  "'>";
$listboxcontent .=  "» ";
$listboxcontent .= $row['etiket'];
$listboxcontent .=  "</option>";
}
mysql_close($con);
}
?>

		<table border="0" cellspacing="0" cellpadding="0" style="width: 440">
	<tr>
		<td style="background-image: url('imgs/themes/2/bbox/c1.png'); background-repeat: no-repeat" width="8" height="26">&nbsp;</td>
		<td background="bbox/top.png" height="26" style="background-image: url('imgs/themes/2/bbox/top.png'); background-repeat: repeat-x" width="165">
		<font color="#2A4B82">
		<code><strong>&nbsp;Yetkiler</strong></code></font></td>
		<td background="bbox/top.png" height="26" style="background-image: url('imgs/themes/2/bbox/top.png'); background-repeat: repeat-x">
		<code>		
		<a href="auth.php">	
		<font face="Tahoma" size="2" color="#3465A4">	
		<img border="0" src="imgs/themes/2/add.gif" align="absbottom" width="16" height="16">Yeni 
		Yetki Alanı Ekle</font></a></code></td>
		<td background="bbox/c2.png" style="background-image: url('imgs/themes/2/bbox/c2.png'); background-repeat: no-repeat" width="8" height="26">
		&nbsp;</td>
	</tr>
	<tr>
		<td width="8" style="background-image: url('imgs/themes/2/bbox/left.png'); background-repeat: repeat-y" height="84">&nbsp;</td>
		<td height="84" bgcolor="#F2F2F2" valign="top" colspan="2">&nbsp;<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; height: 50px;" bordercolor="#111111" width="99%" height="85">
      <tr>
        <td width="16%" align="right" height="45" valign="top" style="height: 50px">
        <img border="0" src="imgs/themes/2/img_security.gif">&nbsp;&nbsp; </td>
<td width="184%" height="45" valign="top" style="height: 50px">
	<form method="POST" id="yetkiform" onsubmit="if(document.getElementById('rutbeler').value==0){error('<b>Düzenlemek istediğiniz Yetki Düzeyini Seçin!!!</b>');return false;}else{document.getElementById('yetkiform').action='auth.php?id='+document.getElementById('rutbeler').value;}">


<select size="1" id="rutbeler" name="rutbeler" onchange="if (document.getElementById('rutbeler').value!=0){ var authlist=new Array();<?php echo $scriptcontent;?>;document.getElementById('authlabel').innerHTML='<img border=0 src=imgs/themes/2/arrow.gif>' + authlist[document.getElementById('rutbeler').value] + ' personel bu yetkiyi kullanıyor.';}else{document.getElementById('authlabel').innerHTML='';}">
<option value=0>Rütbe Seçiniz</option>
<?php echo $listboxcontent; ?>
</select><span id="authlabel"></span>
<br>


        <font face="Trebuchet MS" size="2"><font color="#0033CC"> &nbsp;</font>[ 
Toplam:&nbsp; <?php echo $authcount; ?> ]</font>
<center>		
			<input border="0" src="imgs/themes/2/yet_gun.gif" name="I1" align="right" type="image"></center><br>
		</form>
		</td>
      </tr>
      </table>
&nbsp;</td>
		<td width="8" height="84" style="background-image: url('imgs/themes/2/bbox/right.png'); background-repeat: repeat-y">&nbsp;&nbsp;&nbsp; </td>
	</tr>
	<tr>
		<td width="8" style="background-image: url('imgs/themes/2/bbox/c3.png'); background-repeat: no-repeat">
		<font size="1">&nbsp;</font></td>
		<td style="background-image: url('imgs/themes/2/bbox/bottom.png'); background-repeat: repeat-x" colspan="2">
		<font size="1">&nbsp;</font></td>
		<td width="8" background="bbox/c4.png" style="background-image: url('imgs/themes/2/bbox/c4.png'); background-repeat: no-repeat">
		<font size="1">&nbsp;</font></td>
	</tr>
</table>