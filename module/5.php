		<table border="0" cellspacing="0" cellpadding="0" style="width: 440">
	<tr>
		<td style="background-image: url('imgs/themes/2/bbox/c1.png'); background-repeat: no-repeat" width="8" height="26">
		&nbsp;</td>
		<td background="bbox/top.png" height="26" style="background-image: url('imgs/themes/2/bbox/top.png'); background-repeat: repeat-x">
		<code><font color="#2A4B82"><strong>&nbsp;</strong></font></code><font color="#2A4B82"><code><strong>Tanımlamalar</strong></code></font></td>
		<td background="bbox/top.png" height="26" style="background-image: url('imgs/themes/2/bbox/top.png'); background-repeat: repeat-x" width="165">
		&nbsp;</td>
		<td background="bbox/c2.png" style="background-image: url('imgs/themes/2/bbox/c2.png'); background-repeat: no-repeat" width="8" height="26">
		&nbsp;</td>
	</tr>
	<tr>
		<td width="8" style="background-image: url('imgs/themes/2/bbox/left.png'); background-repeat: repeat-y" height="84">
		&nbsp;</td>
		<td height="84" bgcolor="#F2F2F2" valign="top" colspan="2">&nbsp;<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="99%" height="85" id="table6">
      <tr>
        <td width="16%" align="right" height="45" valign="top">
        <img border="0" src="imgs/themes/2/cog.gif" width="34" height="33">&nbsp;&nbsp; </td>
        <td width="37%" height="45" valign="top">
        <img border="0" src="imgs/ball.png"><font face="Trebuchet MS" size="2">
		<a href="joint.php?sum=add"><font color="#3465A4">Kavşak Tanımlama</font></a></font><br>
		<img border="0" src="imgs/ball.png"><font face="Trebuchet MS" size="2">
		
		<u><font color="#3465A4" style="cursor:pointer;cursor:hand;" onclick="if(document.getElementById('newarea').innerHTML==''){ document.getElementById('newarea').innerHTML=document.getElementById('newareaform').innerHTML;document.getElementById('newareaform').innerHTML='';}else{document.getElementById('newareaform').innerHTML=document.getElementById('newarea').innerHTML;document.getElementById('newarea').innerHTML=''}">
		Bölge Tanımlama</font></u></font><br>
		<img border="0" src="imgs/ball.png"><font face="Trebuchet MS" size="2">
		<a href="user.php?sum=add"><font color="#3465A4">Personel Tanımlama</font></a></font>
		</td>
        <td width="47%" height="45"><span name="newarea" id="newarea"></span><span name="newareaform" id="newareaform" style="visibility:hidden">
        <table border="0" width="100%" cellspacing="0" cellpadding="0" height="68">
	<tr>
		<td width="30" valign="top">
		<img border="0" src="imgs/themes/2/arrow_blue.png" width="23" height="25"></td>
		<td>
        <form method="post" action="area.php?sum=add" onsubmit="if(document.getElementById('areaname').value=='' || document.getElementById('areano').value=='' ){error('<b>Lütfen bölge eklemek için bilgileri eksiksiz girin!!!</b>');return false;}">
        <p align="left"><b><font size="2">Bölge Ad: </font></b> <input type="text" name="areaname" id="areaname" size="11" maxlength="11"><br>
        <b><font size="2">Bölge No: </font></b> 
		<input type="text" name="areano" id="areano" size="1" maxlength="1">
        <input type="submit" value="Ekle">
        </p>
        </form>
</td>
	</tr>
</table>
</span></td>
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