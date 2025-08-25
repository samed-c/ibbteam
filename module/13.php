	<?php
$listboxcontent="";
$scriptcontent="";
$con = mysql_connect($mysql_hostadi,$mysql_kullaniciadi,$mysql_parola);
if ($con){
mysql_select_db($mysql_DBadi, $con);
mysql_query("SET NAMES '$mysql_charset'");
$reportcount=mysql_num_rows(mysql_query("select iid from rapor_isler"));
mysql_close($con);
}
?>
	
	<table border="0" cellspacing="0" cellpadding="0" style="width: 440">
	<tr>
		<td style="background-image: url('imgs/themes/2/bbox/c1.png'); background-repeat: no-repeat" width="8" height="26">&nbsp;</td>
		<td background="bbox/top.png" height="26" style="background-image: url('imgs/themes/2/bbox/top.png'); background-repeat: repeat-x" width="165">
		<code><font color="#2A4B82"><strong>&nbsp;Ekip Raporu</strong></font></code></td>
		<td background="bbox/top.png" height="26" style="background-image: url('imgs/themes/2/bbox/top.png'); background-repeat: repeat-x">
		<code><font color="#2A4B82"><strong> <a href="rep_add.php">
		<img border="0" src="imgs/themes/2/add.gif" align="absbottom" width="16" height="16"></a></strong><a href="rep.php?sum=add"><font face="Tahoma" size="2" color="#3465A4">Rapor 
		Ekle</font></a></font></code></td>
		<td background="bbox/c2.png" style="background-image: url('imgs/themes/2/bbox/c2.png'); background-repeat: no-repeat" width="8" height="26">&nbsp;</td>
	</tr>
	<tr>
		<td width="8" style="background-image: url('imgs/themes/2/bbox/left.png'); background-repeat: repeat-y" height="84">
		&nbsp;</td>
		<td height="84" bgcolor="#F2F2F2" valign="top" colspan="2">&nbsp;<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; height: 86px;" bordercolor="#111111" width="99%" id="table6">
      <tr>
        <td width="16%" align="right" height="86" valign="top">
        <img border="0" src="imgs/themes/2/teamrep.gif" width="37" height="36">&nbsp;&nbsp; </td>
        <td width="184%" height="86" valign="top">
        <p style="margin-top: 0; margin-bottom: 0; height: 43px;">
        <img border="0" src="imgs/ball.png">
        <a href="rep.php?sum=list">
		<font color="#3465A4">Faaliyet Dökümü</font></a><font face="Trebuchet MS" size="2" color="#0033CC"> </font><font face="Trebuchet MS" size="2">
		[ Toplam:&nbsp;<?php echo $reportcount; ?> ]</font><br>
&nbsp;</td>
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