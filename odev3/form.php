<?php include ("../odev3/config/config.php"); ?>
<?php include ("../odev3/partials/session.php");?>
<?php include ("../odev3/partials/header.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../odev3/style/admin.css">
    <title>KULLANICI EKLE</title>
</head>

<body>
    <div class="main-content">
        <div class="wrapper">

            <h1>Müşteri Ekle</h1>
            <br><br>
            <a href="list.php" class="btn-primary">Müşteriler</a>
            <form action="formAdd.php" method="post">
                <br><br>
                <table class="tbl-30 ">
                    <tr>
                        <td>Adı Soyadı</td>
                        <td> <input class="form1" type="text" name="customerName"></td>
                    </tr>

                    <tr>
                        <td>Telefon Numarası</td>
                        <td> <input class="form1" type="text" name="phoneNumber"></td>
                    </tr>
                    <tr>

                        <td colspan="2">
                        &nbsp  <input type="submit" name="submit" value="Ekle" class="btn-submit">

                        </td>
                    <tr>
                        <td colspan="2">



                        </td>
                    </tr>
                    </tr>

                </table>

            </form>


</body>

</html>