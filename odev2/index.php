<?php 
session_start();
include("menu.php");

$entity = array();
$entity[0] = array("productName" => "Ülker Çikolatalı Gofret 40 gr." , "price" => "10");
$entity[1] = array("productName" => "Eti Damak Kare Çikolata 60 gr.","price" => "20");
$entity[2] = array("productName" => "Nestle Bitter Çikolata 50 gr.","price" => "20");
$_SESSION['userdata'] = $entity;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödev2</title>
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-sm-3" style="background-color:lavender;"></div>
<div class="col-sm-6" >

  <form action="" method="post">
   
   <table id="customers">
       <tr>
           <th class="col-sm-5">Ürün Adı</th>
           <th class="col-sm-5">Ürün Fiyatı</th>
           <th class="col-sm-2">Adet</tdh>
       </tr>
       <tr>
           <td>  <?php echo $_SESSION['userdata'][0]["productName"];?>  </td>
           <td>  <?php echo $_SESSION['userdata'][0]["price"];?>  </td>
           <td><input class="number-input" type="number" min="0" name="number1"> </td>

       </tr>
       <tr>
           <td>  <?php echo $_SESSION['userdata'][1]["productName"];?>  </td>
           <td>  <?php echo $_SESSION['userdata'][1]["price"];?>  </td>
           <td><input class="number-input" type="number" min="0" name="number2"> </td>
       </tr>
       <tr>
           <td>  <?php echo $_SESSION['userdata'][2]["productName"];?>  </td>
           <td>  <?php echo $_SESSION['userdata'][2]["price"];?>  </td>
           <td><input class="number-input" type="number" min="0" name="number3"> </td>
       </tr>
   </table>

   <input class="successBtn" name="submit" type="submit" value="Ürünü Sepete Ekle">
</form>

<br><br>

<table id="customers">
       <tr>
           <th class="col-sm-5">Ürün Adı</th>
           <th class="col-sm-5">Adet</th>
           <th class="col-sm-2">Toplam</tdh>
       </tr>
       <?php 
        
        if (isset($_POST["submit"])) {

           
            $number1 = $_POST["number1"];
            $number2 = $_POST["number2"];
            $number3 = $_POST["number3"];
           
            $adet = 0;
 
                if ($number1>0) {
           
                        $toplam= $_SESSION['userdata'][0]['price'] * $number1;
                        $_SESSION["toplam1"] = $_SESSION["toplam1"] + $toplam;
                        $_SESSION["adet1"] =$_SESSION["adet1"]+$number1;
                        $adet+=1;
                        
                }
                    
                    

                if ($number2>0) {
                        $toplam= $_SESSION['userdata'][1]['price'] * $number2;
                        $_SESSION["toplam2"] = $_SESSION["toplam2"] + $toplam;
                        $_SESSION["adet2"] = $_SESSION["adet2"] + $number2;
                        $adet+=1;
                        
                }
                
                  
                if ($number3>0) {
                        $toplam= $_SESSION['userdata'][2]['price'] * $number3;
                        $_SESSION["toplam3"] = $_SESSION["toplam3"] + $toplam;
                        $_SESSION["adet3"] = $_SESSION["adet3"] + $number3;
                        $adet+=1;
                        
                }
                $totalPrice=$_SESSION["toplam1"] + $_SESSION["toplam2"] + $_SESSION["toplam3"];

                echo "<tr>
                                <td>".     $_SESSION['userdata'][0]["productName"]."  </td>
                                <td> ".    $_SESSION["adet1"]  ."    </td>   
                                <td>".     $_SESSION["toplam1"]."</td>
                                </tr>";

                                echo "<tr>
                                <td>".     $_SESSION['userdata'][1]["productName"]."  </td>
                                <td> ".    $_SESSION["adet2"]  ."    </td>   
                                <td>".     $_SESSION["toplam2"]."</td>
                                </tr>";

                                echo "<tr>
                                <td>".     $_SESSION['userdata'][2]["productName"]."  </td>
                                <td> ".    $_SESSION["adet3"]  ."    </td>   
                                <td>".     $_SESSION["toplam3"]."</td>
                                </tr>";
                                
                                echo "
                                <td> Genel Toplam </td>
                                <td></td>
                                <td>$totalPrice </td>";
                
        }
        
        
                                
        
        
        
       ?>
   </table>


</div>
</div>
</div>

    

</body>
</html>