<?php
session_start();

$loginid=$_SESSION['login_id'];
$login_yetki=$_SESSION['login_yetki'];
$login_isim=$_SESSION['login_isim'];
$login_kullaniciadi=$_SESSION['login_kullaniciadi'];

if ($_SESSION['login_code'] != "k!2'kLKFDS^1??NBXa9öcTT?R")
{
die("<script>location.href='login.php';</script>");
}
?>