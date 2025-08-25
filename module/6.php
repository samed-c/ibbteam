<?php
$listboxcontent="";
$scriptcontent="";
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
$listboxcontent .= "'>» ";
$listboxcontent .= $row['isim'];
$listboxcontent .= "</option>";
}
mysql_close($con);
}
?>
		
		<table border="0" cellspacing="0" cellpadding="0" style="width: 440">
	<tr>
		<td style="background-image: url('imgs/themes/2/bbox/c1.png'); background-repeat: no-repeat" width="8" height="26">
		&nbsp;</td>
		<td background="bbox/top.png" height="26" style="background-image: url('imgs/themes/2/bbox/top.png'); background-repeat: repeat-x" width="165">
		<code><font color="#2A4B82"><strong>&nbsp;Personel</strong></font></code><font color="#2A4B82"><code><strong> 
		Yönetimi</strong></code></font></td>
		<td background="bbox/top.png" height="26" style="background-image: url('imgs/themes/2/bbox/top.png'); background-repeat: repeat-x">
<a href="user.php?sum=add"><img border="0" src="imgs/themes/2/add.gif" align="absbottom" width="16" height="16"><font face="Tahoma" size="2" color="#3465A4">Personel 
		Ekle</font></a></td>
		<td background="bbox/c2.png" style="background-image: url('imgs/themes/2/bbox/c2.png'); background-repeat: no-repeat" width="8" height="26">
		&nbsp;</td>
	</tr>
	<tr>
		<td width="8" style="background-image: url('imgs/themes/2/bbox/left.png'); background-repeat: repeat-y" height="84">
		&nbsp;</td>
		<td height="84" bgcolor="#F2F2F2" valign="top" colspan="2">
		<form id="myform2" method="post" onsubmit="if(document.getElementById('kullanici').value==0){error('<b>İlgili Personeli Seçin!!!</b>');return false;}else{document.getElementById('myform2').action='user.php?sum=det&id='+document.getElementById('kullanici').value;}">
		<br>
		<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="99%" height="85" id="table6">
      <tr>
        <td width="16%" align="right" height="45" valign="top">
        <img border="0" src="imgs/themes/2/personel.gif" width="35" height="52">&nbsp;&nbsp; </td>
        <td width="184%" height="45" valign="top">
<select size="1" id="kullanici" name="kullanici" onchange="if (document.getElementById('kullanici').value!=0){ var userlist=new Array();<?php echo $scriptcontent;?>;document.getElementById('userlabel').innerHTML='<img border=0 src=imgs/themes/2/arrow.gif>' + userlist[document.getElementById('kullanici').value];}else{document.getElementById('userlabel').innerHTML='';}">
			<option value=0>Eleman Seçiniz</option>
			<?php echo $listboxcontent; ?>
</select><span id="userlabel"></span></b><br><font face="Trebuchet MS" size="2">
        <font color="#0033CC"> &nbsp;</font>[ Toplam:&nbsp;<?php echo $usercount; ?> ]</font><br>
        <p style="text-align: right">
 <input border="0" src="imgs/themes/2/per_det.gif" name="I1" align="center" type="image"></p>
		</td>
      </tr>
      </table>
      </form></td>
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