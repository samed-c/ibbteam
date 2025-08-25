		<p align="center">
			<br>
			<img border="0" src="imgs/ibb_logo.gif" align="middle"></p>

<br>


	&nbsp;


	<img border="0" src="imgs/multiply.gif" align="absbottom" width="19" height="17">&nbsp;<a href="index.php?logout=ok"><font color="#253749">Oturumu 
			Kapat</font></a>&nbsp;&nbsp;&nbsp;&nbsp;
			<font color="#253749"> <img border="0" src="imgs/print.gif" width="18" height="14"><font color="#253749">
			<a href="javascript:print();"><font color="#253749">Yazdır</font></a></font><br>
&nbsp;</font><table border="1" width="281" bgcolor="#E1E1E1" bordercolor="#808080" id="table3">
<tr>
<td width="271">
<p align="center"><br>

<?php
$arrStr = array_reverse(explode("/", $_SERVER['PHP_SELF'] ) ); 
if ($arrStr[0]=="index.php")
{
?>
	Hoşgeldiniz 	<br>
	<?php

	}
	?>
<b><?php echo $login_isim;?> [<?php echo $login_kullaniciadi;?>]<br>
&nbsp;</b></p>
</td>
</tr>
</table>
<p align="left">
&nbsp;
<?php
$arrStr = array_reverse(explode("/", $_SERVER['PHP_SELF'] ) ); 
if ($arrStr[0]!="index.php")
{
?>
<img border="0" src="imgs/back.gif" align="absbottom" width="16" height="16">
<a href="index.php"><font color="#253749">Ana Sayfaya Geri Dön</font></a>
<?php
}
?>