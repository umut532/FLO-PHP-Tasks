<?php include ("../odev3/partials/session.php");
      include ("../odev3/config/config.php"); 
      include ("../odev3/partials/header.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../odev3/style/admin.css">

    <title>ANASAYFA</title>
</head>

<body>

    <div class="main-content">

        <div class="wrapper">
            <h1>Müşteri Paneli</h1>
            <br></br>

            <a href="form.php" class="btn-primary">Müşteri Ekle</a>

            <br></br>

            <div class="manage">
                <table class="tbl-full ">

                    <tr class="">
                        <th>Adı Soyadı</th>
                        <th>Telefon Numarası</th>
                        <th class="text-left">İşlem</th>

                    </tr>


                    <?php 
            
            $sql = $conn->query("select * from customer" ,PDO::FETCH_ASSOC);
            foreach ($sql as $value) {
                
   
            
                echo   "<tr>
                            <td class='managetable'> ". $value['customerName'] ." </td>
                            <td class='managetable'> ". $value['phoneNumber'] ."</td>
                            <td class=''>
                                <a href='update.php?id=$value[id]'class='btn-secondary'>Update </a> 
                                <a href='delete.php?id=$value[id]'class='btn-danger'> Delete</a>
                            </td>
                        </tr>";
                        "<tr>
                            echo 'kimse bulunamadı';
                        </tr>";
            } 
           
            echo "
            <td colspan='2' class='managetable' >Sistemde Toplam ".$sql->rowCount()." Kayıt Var.</td>";
            
            
              ?>

                </table>

            </div>
        </div>
</body>

</html>