<?php 
include ("../config/session.php");
include("../config/config.php");
include_once("class.php");
    $id=$_GET["id"];   
    $sql = $conn->query("SELECT * FROM pages WHERE id=$id" ,PDO::FETCH_ASSOC);

    foreach ($sql as $value) {
        if ($value["state"] == 1) {
            $state = 0;
        }
        else {
            $state = 1;
        }
    } 

    $sql = $conn->prepare("update pages set state=? where id=$id");
    $update = $sql->execute(array($state));

    if ($update) {
        header("location:pages.php");
    }
    else {
        echo "bir hata oluştu";
    }



?>