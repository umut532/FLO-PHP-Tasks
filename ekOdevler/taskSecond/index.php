<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <!-- Session olarak tanımla -->
        
        <table style="width:30%">
            <p>** Cevher v1.0 ***</p>
            * Müşteri’nin
            <tr>
                <td>Adı</td>
                <td>
                    <input name="ad" type="text" required>
                </td>
            </tr>
            
            <tr>
                <td>Soyadı</td>
                <td>
                    <input name="soyad"type="text" required>
                </td>
            </tr>

            <tr>
                <td>* Cevherin</td>
            </tr>
            
            <tr>
                <td>Kodu</td>
                <td>
                    <select style="width:50%" name="tur">
                        <option value="demir">DMR</option>
                        <option value="krom">KRM</option>
                        <option value="bakir">BKR</option>
                        <option value="komur">KMR</option>
                    </select> 
                </td>
            </tr>

            <tr>
                <td>Tane büyüklüğü</td>
                <td>
                    <input style="width:47%" name="taneBuyuklugu"type="number" min="1" max="3" required>
                </td>
            </tr>

            <tr>
                <td>Temizlik oranı</td>
                <td>
                    <input style="width:47%" name="temizlikOrani" type="number" min="0" max="100" required>
                    
                </td>
            </tr>

            <tr>
                <td>Miktar (TON)</td>
                <td>
                    <input style="width:47%" name="miktar"type="number" required>
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input style="width:50%" type="submit" name="submit" value="Hesapla">
                </td>
            </tr>
        </table>
    </form>
<br>
</body>
</html>

<?php 
    
    function cevherFiyat($tur){
        
        foreach ($_SESSION['cevherler'] as $cevher) {
                
            if ($cevher["cevher"] == $tur) {
                $birimFiyat = $cevher["fiyat"];
                return $birimFiyat;
                break;
            }
        }
    }

    function taneEtkisi($gelenTane){
        
        foreach ($_SESSION['taneler'] as $tane) {
                
            if ($tane["taneKodu"] == $gelenTane) {
                $taneEtkisi = $tane["etkisi"];
                return $taneEtkisi;
                break;
            }
        }
    }
        
    function temizlikEtkisi($temizlikOrani,$taneEtkisi,$cevherFiyat){

        if ($temizlikOrani > 0 ) {
            $yeniBirimFiyati = ($cevherFiyat * $temizlikOrani) / 100;
            return $yeniBirimFiyati;
        }
        elseif ($temizlikOrani == 100) {
            $yeniBirimFiyati = $cevherFiyat;
        }
    }

    function kdvHesaplayıcı($fiyat){
        $kdv = ($fiyat * 8) / 100;
        return $kdv;
    }
    
    if (isset($_POST["submit"])) {
        echo" ********Fatura********";
        $_SESSION['cevherler']=array(
            array("cevher"=>"demir", "kodu"=> "DMR", "fiyat"=> 1500),
            array("cevher"=>"krom", "kodu"=> "KRM", "fiyat"=> 5000),
            array("cevher"=>"bakir", "kodu"=> "BKR", "fiyat"=> 3000),
            array("cevher"=>"komur", "kodu"=> "KMR", "fiyat"=> 500),
            ); 

        $_SESSION['taneler']=array(
            array("tane"=>"erik", "taneKodu"=> 1, "etkisi"=> 15),
            array("tane"=>"portakal", "taneKodu"=> 2, "etkisi"=> 10),
            array("tane"=>"Karpuz", "taneKodu"=> 3, "etkisi"=> 0),
            ); 

        $ad = $_POST["ad"];
        $soyad = $_POST["soyad"]; 
        $tur = $_POST["tur"];
        $gelenTane = $_POST["taneBuyuklugu"];
        $temizlikOrani = $_POST["temizlikOrani"];
        $gelenMiktar = $_POST["miktar"]; 

        $cevherFiyat = cevherFiyat($tur);
        $taneEtkisi = taneEtkisi($gelenTane);
        $temizlikEtkisi = temizlikEtkisi($temizlikOrani,$taneEtkisi,$cevherFiyat);
        $etkisi = $cevherFiyat - temizlikEtkisi($temizlikOrani,$taneEtkisi,$cevherFiyat);

        echo "<br> Alıcı: ".ucfirst($ad)." ".ucfirst($soyad)."<br><br><br>";
        echo "Cevher Türü: ".ucfirst($tur)."<br>";
        
        foreach ($_SESSION['cevherler'] as $cevher) {

            if ($cevher["cevher"] == $tur) {
                echo "Normal Birim Fiyat: ".$cevher['fiyat']." TON/TL<br>";
            }
        }
        
        foreach ($_SESSION['taneler'] as $tane) {

            if ($tane["taneKodu"] == $gelenTane) {
                echo "Tane :&nbsp;".ucfirst($tane["tane"]). "&nbsp;&nbsp;"."(-".$tane["etkisi"].")<br>";
            }
        }

        echo "Temizlik : %".$temizlikOrani ."&nbsp; &nbsp;Etkisi: -".$etkisi."&nbsp;₺<br>";
        echo "Miktar (TON) : ".$gelenMiktar."<br>";
        echo "<br>Temizlik Etkisi Sonrası<br>";
        
        // echo $temizlikEtkisi;
        echo "<br>";
        $etksisi = $cevherFiyat - temizlikEtkisi($temizlikOrani,$taneEtkisi,$cevherFiyat);
        $sonFiyat = $cevherFiyat - $etkisi;
        
        echo "Birim Fiyatı : ".$sonFiyat."&nbsp;TON / TL<br>";
        $toplamFiyat = $gelenMiktar * $sonFiyat;

        echo "Toplam : ".$toplamFiyat."<br>";
        $kdv = kdvHesaplayıcı($toplamFiyat);
        echo "Kdv (%8) :".$kdv."<br>";

        $kdvDahilToplam = $toplamFiyat + $kdv;
        echo "Genel Toplam: ".$kdvDahilToplam."&nbsp TL <br><br>Mega Madencilik, 2016<br>*********************";
        
    }
        
?>