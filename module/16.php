<?php
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$result = mysql_query("SELECT * FROM evraklar");
$pagecount=mysql_num_rows($result);
?>
		<table border="0" cellspacing="0" cellpadding="0" style="width: 440">
	<tr>
		<td style="background-image: url('imgs/themes/2/bbox/c1.png'); background-repeat: no-repeat" width="8" height="26">&nbsp;</td>
		<td background="bbox/top.png" height="26" style="background-image: url('imgs/themes/2/bbox/top.png'); background-repeat: repeat-x" width="165">
		<font color="#2A4B82">
		<code><strong>&nbsp;Evrak</strong></code></font></td>
		<td background="bbox/top.png" height="26" style="background-image: url('imgs/themes/2/bbox/top.png'); background-repeat: repeat-x">
		<code>
<a href="paper.php?sum=add">
		<img border="0" src="imgs/themes/2/add.gif" align="absbottom" width="16" height="16"><font face="Tahoma" size="2" color="#3465A4">Evrak Kaydı Ekle</font></a></code></td>
		<td background="bbox/c2.png" style="background-image: url('imgs/themes/2/bbox/c2.png'); background-repeat: no-repeat" width="8" height="26">
		&nbsp;</td>
	</tr>
	<tr>
		<td width="8" style="background-image: url('imgs/themes/2/bbox/left.png'); background-repeat: repeat-y" height="84">&nbsp;</td>
		<td height="84" bgcolor="#F2F2F2" valign="top" colspan="2">&nbsp;<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; height: 58px;" bordercolor="#111111" width="99%">
      <tr>
        <td width="16%" align="right" valign="top" style="height: 58px">
        <img border="0" src="imgs/themes/2/docreg.gif" width="29" height="30">&nbsp;&nbsp; </td>
        <td width="184%" valign="top" style="height: 58px">
        <form method="post" id="evrakform" onsubmit="if(document.getElementById('evrakaramakriter').value==0 || document.getElementById('evrakaramadeger').value=='' || document.getElementById('evrakaramadeger').value==' '){error('<b>Arama kriterlerini doğru girin!!!</b>');return false;}else{document.getElementById('evrakform').action='paper.php?sum=search&val1='+document.getElementById('evrakaramakriter').value + '&val2=' + document.getElementById('evrakaramadeger').value;}">
        <img border="0" src="imgs/ball.png">
		<font face="Trebuchet MS" size="2"><font color="#3465A4"> 
<font color="#3465A4">Evrak Arama</font></font><font color="#0033CC"> </font>[ 
		Toplam: <?php echo $pagecount;?> ]<br>
&nbsp;</font><select size="1" name="evrakaramakriter" id="evrakaramakriter">
<option value=0>Kriter Seçiniz</option>
<option value="1">Evrak No</option>
<option value="2">Oluşturma Tarihi</option>
<option value="3">Evrağın Geldiği Yer</option>
<option value="4">Evrak Açıklaması</option>
<option value="5">Evrak Sonucu</option>
<option value="6">Evrak Çıkış Tarihi</option>
</select> 
<input type="text" name="evrakaramadeger" id="evrakaramadeger">
			<input border="0" src="imgs/themes/2/ara.gif" type="image" name="submit" align="absmiddle"></form></td>
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