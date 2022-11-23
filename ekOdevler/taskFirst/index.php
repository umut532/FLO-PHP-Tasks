<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
        <a href="prices.php">Fiyat Listesi</a>
        <hr>
    <form action="" method="post">
    <table style="width:20%">
            <p>** Ot Master v1.0 ***</p>
            <tr>
                <td>Tür</td>
                <td>
                    <select name="tur">
                        <option value="kekik">Kekik</option>
                        <option value="nane">Nane</option>
                        <option value="feslegen">Fesleğen</option>
                        <option value="reyhan">Reyhan</option>
                    </select> <br> 
                </td>
            </tr>

            <tr>
                <td>Nane miktar</td>
                <td><input style="width: 38%;" name="miktar" type="number" min="0"></td>
            </tr>

            <tr>
                <td>Taze mi?</td>
                <td>
                    <input type="radio" name="tazelikDurumu" value="taze" required/>✓<br/>
                    <input type="radio" name="tazelikDurumu" value="tazeDegil" required/>×<br/>
                </td>
            </tr>

            <tr>
                <td> 
                    <input type="submit" name="submit" value="Hesapla">
                </td>
            </tr>
    </table>
    </form>
    <br><br>
</body>

</html>
<?php
    session_start();

    if (isset($_POST["submit"])) 
    {
        $_SESSION['fiyatEndeks']=array(
            array("ot"=>"kekik", "oran"=> 10),
            array("ot"=>"nane", "oran"=> 20),
            array("ot"=>"feslegen", "oran"=> 10),
            array("ot"=>"reyhan", "oran"=> 25),
            ); 
            
        $tur = $_POST["tur"];
        $tazelikDurumu = $_POST["tazelikDurumu"];
        $miktar = $_POST["miktar"];
        
        echo "Tür : ".$tur ."<br>";
        echo "Nane- miktar (kg) : ".$miktar ."<br>";
        echo "Taze mi : ".$tazelikDurumu ."<br>";
        echo "İşlem Tutarı : ".otBirimFiyat($tur,$miktar)."<br>"; 
        echo "Tazelik Etkisi : ".tazelikEtkisi($tazelikDurumu,$tur,$miktar) ."<br>";
        $sonTutar = otBirimFiyat($tur,$miktar) + tazelikEtkisi($tazelikDurumu,$tur,$miktar);
        echo "Tutar : ".$sonTutar."<br>"; 
        $kdvHesap = ($sonTutar * 18) / 100;
        echo "KDV(%18) : ".$kdvHesap ."<br><br>";

        echo "*********************** <br><br> 
        Fatura: <br>
        OT A.Ş. <br>";
        
        foreach ($_SESSION['fiyatEndeks'] as $otlar) {
                
            if ($otlar["ot"] == $tur) {
                $orans = $otlar["oran"];
                break;
            }
        }
        echo "*".$tur." ".$miktar." x ".$orans." = ".$sonTutar."<br>";
        if ($tazelikDurumu=="taze") {
            echo "Taze <br>";
        }
        else {
            echo "Taze Değil <br>";
        }
        echo "KDV (%18) : ".$kdvHesap."<br>";
        echo "Genel Toplam : ",$sonTutar + $kdvHesap;

    }

    function otBirimFiyat($tur,$miktar){
            $fiyat=0;
            foreach ($_SESSION['otlar'] as $otlar) {
                
                if ($otlar["otadi"] == $tur) {
                    $fiyat = $otlar["otfiyati"];
                    break;
                }
            }
            $sonuc= $miktar * $fiyat;
            return $sonuc;
        }
    
    function tazelikEtkisi($tazelikDurumu,$tur,$miktar){
       
        if ($tazelikDurumu == "tazeDegil") {
            $fiyat=0;
            $oran = 0;
            foreach ($_SESSION['otlar'] as $otlar) {
            
                if ($otlar["otadi"] == $tur) {
                    $fiyat = $otlar["otfiyati"];
                    break;
                }
            }
            
            foreach ($_SESSION['fiyatEndeks'] as $otlar) {
                
                if ($otlar["ot"] == $tur) {
                    $oran = $otlar["oran"];
                    break;
                }
            }
            $toplam= $miktar * $fiyat;
            $hesap = ($toplam * $oran) / 100;
            return  "-".$hesap;
        }
    }
?>