<?php
include('menu.php');
class WebSitesi
{
    private $DbCon;
    private $registerPerm;

    function __construct()
    {
        $this->userName = isset($_POST['userName']) ? $_POST['userName'] : null;
        $this->nationalId = isset($_POST['nationalId']) ? $_POST['nationalId'] : null;

        try {
            $conn = new PDO("mysql:host=localhost;dbname=users;charset=utf8", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            exit("Connection failed: " . $e->getMessage());
        }

        if ($conn) {
            $this->DbCon = $conn;
        }
    }

    function selectData()
    {
        $query = $this->DbCon->query("select * from customer", PDO::FETCH_ASSOC);
        echo "<div class='main-content'>
                <div class='wrapper'>
                    
                    <div class='manage'>
                        <table class='tbl-full '> 
                            <tr>
                                    <th>İd</th>
                                    <th>Ad Soyad</th>
                                    <th>Tc Kimlik</th>
                                    <th class='text-left'>Durum</th>
                            </tr>";
        foreach ($query as $value) {
            echo "
                    <tr>
                            <td class='managetable'>" . $value["id"] . "</td>
                            <td class='managetable'>" . $value["userName"] . "</td>
                            <td class='managetable'>" . $value["nationalId"] . "</td>
                            <td class='managetable'>" . $value["durum"] . "</td>
                    </tr>";

        }
            echo"</table>
            </div>
        </div>";
    }

    function dataAdd($receivedData)
    {
        $durum = $receivedData;
        echo $this->registerPerm;
        $sql = $this->DbCon->prepare("insert into customer values (?,?,?,?)");
        $add = $sql->execute(array(NULL, "$this->userName", "$this->nationalId", "$durum"));
            
        if ($add) {
            echo "<script> alert('Başarıyla Kayıt Edildi'); </script>";
        }
    }

 // Çalışıyor fakat bazen en son kalan sorguyu çektiği için eşleşemiyor ve veritabanına ekliyor ....
    // function nationlIdControl(){
    //     $sql = $this->DbCon->query("select * from customer" ,PDO::FETCH_ASSOC);
    //     foreach ($sql as $value) {
    //        // echo $value['nationalId'] . "<br>";
    //        // echo $this->nationalId;
    //         if ($value["nationalId"] == $this->nationalId) {
    //             echo $this->registerPerm = "true";
    //             break;
    //         }
    //         else {
    //             echo $this->registerPerm = "false";
    //             break;
    //         }
    //     }
    // }

    function control()
    {
        $conn = self::__construct();

        if (!is_numeric($this->nationalId)) {
            echo constants::$notNumeric . "<br>";
        }

        if (substr($this->nationalId, 0, 1) == 0) {
            echo constants::$firstCharacter . "<br>";
        }

        if (strlen($this->nationalId) != 11) {
            echo constants::$nationalIdCharacters . "<br>";
        }
        else {
            $tc = $this->nationalId;
            $n = $tc;
            $x = (string)$n;
            $toplam = 0;
            $rem = 0;
            
                for ($i = 0; $i <=8; $i+=2) {
                    $rem = $n[$i] % 10;
                    $toplam = $toplam + $rem;
                    $n[$i] = $n[$i] / 10;
                }
        
            $tek = $toplam *7; 
            $toplam2 = 0;

                for ($i = 1; $i <=8; $i+=2) {
                    $rem = $n[$i] % 10;
                    $toplam2 = $toplam2 + $rem;
                    $n[$i] = $n[$i] / 10;
                }

            $cift = $toplam2;
            $sonuc = $tek - $cift;
            $k = $tc;
            
            for ($i=0; $i <strlen($k) ; $i++) { 

                if ($sonuc % 10 == $k[9]) {
                    $this->controlIki();
                    break;
                }

                else {
                    $this->durum = "Tc Kimlik Gecersiz";
                    $this->dataAdd($this->durum);
                    break;
                }
            }
        }
    }

    function controlIki()
    {
        $n = $this->nationalId;
        $x = $n;
        $toplam = 0;
        $rem = 0;
        for ($i = 0; $i < strlen($x)-1; $i++) {
            $rem = $n[$i] % 10;
            $toplam = $toplam + $rem;
            $n[$i] = $n[$i] / 10;
        }
        //echo $toplam;
        
        //$k = $this->nationalId;
        // $toplam3 = 0;
        // $basamak2 = 0;
        //echo $rem ." sstoplam <br>";
        //echo $toplam % 10 ." mod <br>";
        // echo $n ." gelen sayı <br>";

        for ($i = 0; $i <= strlen($n); $i++) {
           
            if ($toplam % 10 ==  $n[10]) {
                $this->durum = "Tc Kimlik Geçerli";
                $this->dataAdd($this->durum);
                break;
            } 
            else {
                $this->durum = "Tc Kimlik Gecersiz";
                $this->dataAdd($this->durum);
                break;
            }
        }
        
    }

}

class constants
{
    public static $notNumeric = "<script> alert('Lütfen sayısal bir değer girin!');</script>";
    
    public static $firstCharacter = "<script> alert('İlk Karakter 0 olamaz!');</script>";

    public static $nationalIdCharacters = "<script> alert('TC kimlik 11 hane olmalıdır!');</script>";

    public static $emptyValue = "<script> alert('TC kimlik Sistemde Kayıtlı!');</script>";
}       
