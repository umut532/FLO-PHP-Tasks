<?php 
    include ("../odev3/config/config.php"); 
    include ("../odev3/partials/session.php");
    
    if (isset($_POST["submit"])) 
    {
        
        $customerName = $_POST["customerName"];
        $phoneNumber = $_POST["phoneNumber"];

        
        if(empty($customerName)){
            echo("<div class='alert'><center>Lütfen Kullanıcı Adınızı Giriniz</center></div>");
            }
    
        elseif(empty($phoneNumber)){
            echo("<div class='alert'><center>Lütfen telelfon numarasını Giriniz.</b></center></div>");
            }
        else {
            $sql = $conn->prepare("insert into customer values (?,?,?)"); 
            $add = $sql->execute(array(NULL,"$customerName","$phoneNumber"));

        if ($add) {
                    
            echo("<div class='success'><center>Kayıt işlemi başarılı </b></center></div>");
            header("Refresh: 1; url=form.php");
        } 
        else {
            echo("<div class='alert'><center>Kayıt başarısız</b></center></div>");
        }
        }

        
       
    }
?>