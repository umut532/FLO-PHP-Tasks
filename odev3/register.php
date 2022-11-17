
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../odev3/style/style.css">
    <title>KAYIT OL</title>
</head>
<body>
<div class="formImage"> <div class="container-text">
<div class="container"> 
    <center>
        
        <form action="" class="form" method="post">
            <h1 class="containerInput">Kayıt Ol</h1>
            <a href="index.php"><i class='fas fa-arrow-left backButton' style='font-size:19px;color:green;'></i></a>
            <br>
            <input class="inputText" type="text" name="userName" id="" placeholder="Kullanıcı Adı"> 
            <input class="inputText" type="email" name="mail" id="" placeholder="E-Mail">
            <input class="inputText" type="password" name="password" id="" placeholder="Şifre">
            <input class="inputText" type="password" name="password2" id="password2" placeholder="Şifre Tekrar">
                <br><br>
            <input class="loginButton" name="submit" type="submit" value="Kayıt Ol"> 
            
        </form>
    </center>
    
</div>
</body>
</html>
<?php 
    include ("../odev3/config/config.php");
    session_start();
    if(isset($_SESSION["login"])){
    
        header("Location:form.php");
    }
    else {
        # code...
    }
    $sql = $conn->query("select * from users" ,PDO::FETCH_ASSOC);

    if (isset($_POST["submit"])) 
    {
        
        $userName = $_POST["userName"];
        $mail = $_POST["mail"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];

        if(empty($userName)){
            echo("<div class='alert'><center>Lütfen Kullanıcı Adınızı Giriniz</center></div>");
            }
    
        elseif(empty($mail)){
            echo("<div class='alert'><center>Lütfen Email adresinizi giriniz Giriniz.</b></center></div>");
            }
            
        elseif(empty($password)){
            echo("<div class='alert'><center>Lütfen Şifrenizi giriniz</b></center></div>");
        }
        
        elseif ($password != $password2) {
            echo "<div class='alert'><center>Şifreleriz eşleşmiyor</center></div>";
        }

        
        else {
                $durum=true;
                foreach ($sql as $value) {
                    if ($userName == $value['userName'] || $mail == $value["mail"]) {
                        echo("<div class='alert'><center>Kullanıcı adı veya email kullanılıyor.</b></center></div>");
                        $durum=false;
                        break;
                    }
                } 
            
            if ($durum) {
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
               
                $sql = $conn->prepare("insert into users values (?,?,?,?)"); 
                $password =sha1($password);
                $add = $sql->execute(array(NULL,"$userName","$mail","$password"));
            
                if ($add) {
                    
                    echo("<div class='success'><center>Kayıt işlemi başarılı.</b></center></div>");
                    header("Refresh: 2; url=index.php");
                }
                else {
                    echo("<div class='alert'><center>Kayıt başarısız lütfen giriş yapın.</b></center></div>");
                }
            }
        }  
    

    }
              
    
   

    echo "</div>
        </div>";


?>
