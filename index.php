<?php
include("include/header.php");
include("include/session.php");

if ($_GET["logout"]=="ok"){
session_unset();
?>
<script>location.href='index.php'</script>
<?
}
include_once("include/mysql.php");


function mod($module)
{
include("include/module.php");
}
mod();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/alertbox.js"></script>
</head>
<body bgcolor="#FBFBFB">

	<table border="0" width="99%" id="table11">
		<tr>
			<td valign="top">
			<?php
			include("include/label.php")
			?> 
			<table style="width: 100%">		
<?php
include("include/modules.php");
?>			
			</table>
			</td>
			<td width="210" valign="top"><?php include('include/menu.php'); ?>
			<br>
<p align="center">
<a href="rep.php?sum=add"><img src="imgs/add.png" width="118" height="94" border="0"><br>
<strong><span style="color: #808080; font-family: Times New Roman, Times, serif;	font-size: smaller; text-decoration:underline">EKİP RAPORU EKLE</span></strong></a></p>
			</td>
		</tr>
	</table>
	</body>
	</html>
