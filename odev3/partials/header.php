<?php 
include ("../odev3/config/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8a00a64138.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../odev3/style/admin.css">
    <title>Document</title>
</head>
<body>

        <div class="header">
            <?php 
               // echo "<div class='userText'>".$_SESSION["user"]."</div> ";
                echo "
                <div class='userText'>".$_SESSION["user"]." Çıkış Yap</div>
                <a href='logout.php'><i class='fa-sharp fa-solid fa-right-from-bracket fa-xl icon'></i></a>
                ";
            ?>
          
        </div>
</body>
</html>