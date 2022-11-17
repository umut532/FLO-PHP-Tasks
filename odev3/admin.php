<?php
 
    include("index.php");
    //eğer login session kaydı yapılmadan yani giriş yapmadan admin.php sayfamıza erişmek isterlerse buna engel oluyoruz.
    if(!isset($_SESSION["login"])){
        header("Location:index.php");
    }else{
        header("Location:form.php");
        echo "Admin sayfası<br>";
        echo "<a href='logout.php'>Çıkış Yap</a>";
    }
    
?>