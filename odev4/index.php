<?php 
    require_once('sinif.php');
    include('menu.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <center>
            <b>Ad Soyad:</b> <br>
            <input type="text" name="userName" id="" required> <br>
            <b>Tc Kimlik Numarası:</b>   <br>
            <input button type="text" name="nationalId" id="" required> <br><br>
            <input class="loginButton" type="submit" name="submit" value="Doğrula ve Kaydet" ></div>
        </center>

       
    </form>
</body>
</html>
<?php 
   

    if (isset($_POST["submit"])) {
        $register = new WebSitesi();
        $register->control();
    }
    $listOfData = new WebSitesi(); 
    echo "<br>";
    $listOfData->selectData();

    
?>