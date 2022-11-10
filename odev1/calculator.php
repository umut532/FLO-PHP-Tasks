<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <div class="containerSuccess"> 
        <center>
<?php 
    $place =$_GET["place"];
    $totalSheep =$_GET["totalSheep"];
    $capacity =$_GET["capacity"];

    $totalCapacity = $capacity * $place;

    echo "Toplam Ağil: ".$place."<br>";
    echo "Toplam Kapasite: ".$totalCapacity."<br>";
    echo "Toplam Koyun: $totalSheep<br><br>";

    for ($place; $place >0 ; $place--) { 

        if ($totalSheep>$capacity) {
         echo $place.".Ağıl :".$capacity."<br>";
        }
        
        if ($totalSheep<=$capacity && $totalSheep>0) {
            echo $place.".Ağıl :".$totalSheep."<br>";
                
        }

        if ($totalSheep<=0) {
            echo $place.".Ağıl : 0<br>";
        }
        


        $totalSheep = $totalSheep - $capacity;
        
    }
    //echo $totalCapacity;
    if ($totalSheep<=0) {
        echo "<br>Dışarıda kalan yok";
    }
    else 
    {
        echo "<br>Dışarıda kalan : ".$totalSheep;
    }
    
?>

        </center>
    </div>
</body>
</html>