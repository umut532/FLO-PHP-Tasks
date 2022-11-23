

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        input.inputBox {
        width: 61px;
        
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <!-- Session olarak tanımla -->
        <a href="index.php">Anasayfa</a>
        <hr>
        <table style="width:20%">
            <p>Kg başına ot fiyatlarını giriniz</p>
            <tr>
                <td>Kekik</td>
                <td><input class="inputBox" name="kekik" type="number" required></td>
            </tr>
            
            <tr>
                <td>Nane</td>
                <td><input class="inputBox" name="nane"type="number" required></td>
            </tr>

            <tr>
                <td>Fesleğen</td>
                <td><input class="inputBox" name="feslegen"type="number" required></td>
            </tr>

            <tr>
                <td>Reyhan</td>
                <td> <input class="inputBox" name="reyhan"type="number" required></td>
            </tr>

            <tr>
                <td></td>
               <td><input type="submit" name="submit" value="Güncelle"><br></td>
            </tr>
        </table>
        
    </form>
</body>
</html>

<?php 

    session_start();
    if (isset($_POST["submit"]) ) {

        $_SESSION['otlar']=array(
        array("otadi"=>"kekik" ,"otfiyati"=>$_POST["kekik"]),
        array("otadi"=>"nane" ,"otfiyati"=>$_POST["nane"]),
        array("otadi"=>"feslegen" ,"otfiyati"=>$_POST["feslegen"]),
        array("otadi"=>"reyhan" ,"otfiyati"=>$_POST["reyhan"]),
        ); 

        echo    "<table border='1px'>
                    <tr>
                        <td>Kekik</td>
                        <td>nane</td>
                        <td>feslegen</td>
                        <td>reyhan</td>
                    </tr>

                    <tr>";
                        foreach ($_SESSION['otlar'] as $otlar) {
                            echo "<td>".$otlar["otfiyati"]."</td>";
                        }"
                    </tr>
                    
                </table> ";
    }

    elseif (!empty($_SESSION['otlar'])) {

        echo    "<table border='1px'>
                    <tr>
                        <td>Kekik</td>
                        <td>nane</td>
                        <td>feslegen</td>
                        <td>reyhan</td>
                    </tr>

                    <tr>";
                        foreach ($_SESSION['otlar'] as $otlar) {
                            echo "<td>".$otlar["otfiyati"]."</td>";
                        }"
                    </tr>
                </table> ";
    }
   

    

?>