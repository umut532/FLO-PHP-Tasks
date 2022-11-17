<?php include ("../odev3/config/config.php"); ?>
<?php include ("../odev3/partials/session.php");?>
<?php include ("../odev3/partials/header.php");

    $id=$_GET["id"];   
    $sql = $conn->query("select * from customer where id=$id" ,PDO::FETCH_ASSOC);
    foreach ($sql as $value) {
        $customerName = $value['customerName'];
        $phoneNumber = $value['phoneNumber'];
    } 
  
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../odev3/style/admin.css">
    <title>KULLANICI GÜNCELLE</title>
</head>
<body>
<div class="main-content">
    <div class="wrapper">
    
        <h1>Müşteri Güncelle</h1>
        <br><br>
        <a href="list.php" class="btn-primary">Müşteriler</a>
        <form action="" method="post">
        <br><br>
            <table class="tbl-30 ">
                <tr>
                    <td>Adı Soyadı</td>
                   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $customerName;?></td>
                </tr>

                <tr>
                    <td>Telefon Numarası</td>
                    <td> <input class="form1" type="text" name="newPhoneNumber" placeholder="<?php echo "&nbsp;&nbsp;&nbsp;".$phoneNumber;?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                    &nbsp <input type="submit" name="submit" value="Güncelle" class="btn-submit">
                    </td>
                </tr>

            </table>
           
        </form>
        
        
</body>
</html>
<?php 

        
    if (isset($_POST["submit"])) {
           
            
            $newphoneNumber=$_POST["newPhoneNumber"];
            
            echo $newphoneNumber;
           

                    $sql = $conn->prepare("update customer set phoneNumber=? where id=$id");

                    if (empty($newPhoneNumber)) {
                        echo "Lütfen telefon numarasını girin!.";
                    }
                    else {
                        $update = $sql->execute(array($newphoneNumber));
                        if ($update) {
                            echo "Güncellendi";
                            header("Location:list.php");
                        }
                        else{
                            echo "hata";
                        }
                    }
            }
            
            
        
    
?>
