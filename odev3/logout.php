<?php
 
session_start();
 
ob_start();
 
session_destroy();
 
echo "<center>Çıkış Yaptınız .Giriş Sayfasına Yönlendiriliyorsunuz</center>";
 
header("Refresh: 2; url=index.php");
 
?>