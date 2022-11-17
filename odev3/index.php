<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../odev3/style/style.css">
    <title>GİRİŞ YAP</title>
</head>

<body>
    <div class="formImage">
        <div class="container-text ">
            <div class="container">
                <center>


                    <form action="" class="form" method="post">
                        <h1 class="containerInput">Merhabalar!</h1>
                        <p class="inoText">Profilinize ulaşmak için giriş yapınız.</p>

                        <input class="inputText" type="text" name="userName" id="" placeholder="Kullanıcı Adı">
                        <input class="inputText" type="password" name="password" id="" placeholder="Şifre">
                        <br>

                        <input class="loginButton" name="submit" type="submit" value="Giriş Yap">
                        <br>
                        <a href="register.php"><input class="registerButton" type="button" value="Kayıt Ol"> </a>

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

    $sql = $conn->query("select * from users" ,PDO::FETCH_ASSOC);
    if (isset($_POST["submit"])) {
        $userName = $_POST["userName"];
        $password = $_POST["password"];
        

        if(empty($userName)){
            echo("<div class='alert'><center>Lütfen Kullanıcı Adınızı Giriniz</center></div>");
            }

        elseif(empty($password)){
            echo("<div class='alert'><center>Lütfen şifrenizi giriniz Giriniz.</b></center></div>");
            }

        else {

                $passwordSha1 = sha1($password);
                $state=null;
                    foreach ($sql as $value) 
                    {
                        if ($userName == $value['userName'] && $passwordSha1 == $value["password"]) {
                            $state=true;
                        }
                        else {
                            $state=false;
                        }
                    }
                
                if ($state) {
                    $_SESSION["login"] = "true";
                    $_SESSION["user"] = $userName;
                    $_SESSION["pass"] = $passwordSha1;
                    echo("<div class='success'><center>Giriş yapıldı yönlendiriliyorsunuz</b></center></div>");
                    header("Refresh: 2; url=admin.php");
                }
                else {
                    echo("<div class='alert'><center>Kullanıcı adı veya şifre yanlış.</b></center></div>");
                }
    }
}
    
    echo "</div>
            </div>";




?>