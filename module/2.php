<table border="0" cellspacing="0" cellpadding="0" style="width: 440px">
	<tr>
		<td style="background-image: url('imgs/themes/2/bbox/c1.png'); background-repeat: no-repeat" width="8" height="26">
		&nbsp;</td>
		<td background="bbox/top.png" height="26" style="background-image: url('imgs/themes/2/bbox/top.png'); background-repeat: repeat-x" width="165">
		<code><font color="#2A4B82"><strong>&nbsp;</strong></font></code><font color="#2A4B82"><code><strong>Kavşak 
		Yönetimi</strong></code></font></td>
		<td background="bbox/top.png" height="26" style="background-image: url('imgs/themes/2/bbox/top.png'); background-repeat: repeat-x">       		
			<a href="javascript: if(document.getElementById('bolge1').value!=0){location.href='joint.php?sum=add&id='+document.getElementById('bolge1').value;}else{error('<b>Kavşak girdisi eklemek istediğiniz bölgeyi seçiniz!!!</b>');}">
			<img border="0" src="imgs/themes/2/add.gif" align="absbottom" width="16" height="16"><font color="#3465A4" face="Tahoma" size="2">Kavşak 
		Ekle</font></a></td>
		<td background="bbox/c2.png" style="background-image: url('imgs/themes/2/bbox/c2.png'); background-repeat: no-repeat" width="9" height="26">
		&nbsp;</td>
	</tr>
	<tr>
		<td width="8" style="background-image: url('imgs/themes/2/bbox/left.png'); background-repeat: repeat-y" height="84">
		&nbsp;</td>
		<td height="84" bgcolor="#F2F2F2" valign="top" colspan="2">&nbsp;<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="99%" height="85" id="table6">
      <tr>
        <td width="16%" align="right" height="45" valign="top">
        <img border="0" src="imgs/themes/2/junc.gif">&nbsp;&nbsp; </td>
        <td width="184%" height="45" valign="top">
		<form method="POST" id="myform" onsubmit="if(document.getElementById('kavsak1').value==0){error('<b>Giriş Yapacağınız Kavşağı Seçin!!!</b>');return false;}else{document.getElementById('myform').action='joint.php?sum=view&id='+document.getElementById('kavsak1').value;}">
			<p>
			<select size="1" id="bolge1" name="bolge1" onchange="getByDist(document.getElementById('bolge1').value,1,1);document.getElementById('subcard1').innerHTML='';">
			<option value=0>Bölge Seçiniz</option>
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
echo "'>";
echo $row['bolge_ad'];
echo "</option>";
}
mysql_close($con);
}
?>
</select>
<font id="card1">
<select size="1" id="kavsak1" name="kavsak1" disabled=true>
			<option value=0>Kavşak Seçiniz</option>
			</select>&nbsp; </font>			
			<center>
			<b><font id="subcard1" face="Trebuchet MS" size="2"></font></b></center>
			<input border="0" src="imgs/themes/2/kav_gir.gif" name="I1" width="121" height="19" align="right" type="image">
		</form>
		</td>
      </tr>
      </table>
&nbsp;</td>
		<td width="9" height="84" style="background-image: url('imgs/themes/2/bbox/right.png'); background-repeat: repeat-y">&nbsp;&nbsp;&nbsp; </td>
	</tr>
	<tr>
		<td width="8" style="background-image: url('imgs/themes/2/bbox/c3.png'); background-repeat: no-repeat">
		<font size="1">&nbsp;</font></td>
		<td style="background-image: url('imgs/themes/2/bbox/bottom.png'); background-repeat: repeat-x" colspan="2">
		<font size="1">&nbsp;</font></td>
		<td width="9" background="bbox/c4.png" style="background-image: url('imgs/themes/2/bbox/c4.png'); background-repeat: no-repeat">
		<font size="1">&nbsp;</font></td>
	</tr>
</table>