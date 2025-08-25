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
		<td style="background-image: url('imgs/themes/2/bbox/c1.png'); background-repeat: no-repeat" width="8" height="26">&nbsp;</td>
		<td background="bbox/top.png" height="26" style="background-image: url('imgs/themes/2/bbox/top.png'); background-repeat: repeat-x" width="165">
		<font color="#2A4B82">
		<code><strong>&nbsp;</strong></code></font><code><strong><font color="#2A4B82">Mesaj 
		Sistemi</font></strong></code></td>
		<td background="bbox/top.png" height="26" style="background-image: url('imgs/themes/2/bbox/top.png'); background-repeat: repeat-x">
		&nbsp;</td>
		<td background="bbox/c2.png" style="background-image: url('imgs/themes/2/bbox/c2.png'); background-repeat: no-repeat" width="8" height="26">
		&nbsp;</td>
	</tr>
	<tr>
		<td width="8" style="background-image: url('imgs/themes/2/bbox/left.png'); background-repeat: repeat-y" height="84">&nbsp;</td>
		<td height="84" bgcolor="#F2F2F2" valign="top" colspan="2">&nbsp;<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; height: 50px;" bordercolor="#111111" width="99%" height="85">
      <tr>
        <td width="16%" align="right" height="45" valign="top" style="height: 50px">
        <img border="0" src="imgs/themes/2/msg.gif">&nbsp; </td>
<td width="184%" height="45" valign="top" style="height: 50px">
	<form method="POST" id="msgform" onsubmit="if(document.getElementById('msgtxt').value==0){error('<b>Lütfen mesaj kısmını boş bırakmayın!!!</b>');return false;}else if(document.getElementById('msgkonu').value==0){error('<b>Lütfen mesaj konusunu seçiniz!!!</b>');return false;}else if(document.getElementById('msgalici').value==0){error('<b>Lütfen mesaj alıcısını seçiniz!!!</b>');return false;}else{document.getElementById('msgform').action='msg.php?sum=send';}">


<font face="Trebuchet MS" size="2">&nbsp; Alıcı Personel:


</font>


<select size="1" id="msgalici" name="msgalici">
			<option value=0>Eleman Seçiniz</option>
			<?php echo $listboxcontent; ?>
</select>
<br>
<br>
<font face="Trebuchet MS" size="2">&nbsp;
Konu:


</font>


<select size="1" id="msgkonu" name="msgkonu">
<option value=0>Konu Seçiniz</option>
<option value=1>Uyarı</option>
<option value=2>Mesaj</option>
<option value=3>Dikkat</option>
<option value=4>Acil</option>
<option value=5>Hatırlatma</option>							
<option value=6>Fikir</option>
<option value=7>İpucu</option>
<option value=8>Gönderi</option>							
<option value=9>Sistem Mesajı</option>
</select>&nbsp;&nbsp;&nbsp;
<input type="checkbox" id="sms" name="sms" value="1" disabled><font face="Trebuchet MS" size="2"><font color="#808080">SMS Gönderimi<br>
</font></font>
<br>
<font face="Trebuchet MS" size="2">&nbsp; Mesaj:
<textarea rows="2" name="msgtxt" id="msgtxt" cols="32"></textarea><br>
&nbsp;</font><center>		
			<input border="0" src="imgs/themes/2/gonder.gif" name="msgsubmit" align="right" type="image"></center>
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


<script type="text/javascript" src="js/tipbox.js"></script>
<script>
function msgtimer()
{
setTimeout('msgtimer()', 1000)
if (document.getElementById('dhtmlfloatie').style.display!="block")
{
ShowMSG()
}
}
setTimeout('msgtimer()', 1000)
</script>