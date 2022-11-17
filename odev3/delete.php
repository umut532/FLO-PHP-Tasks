<?php 

include ("../odev3/config/config.php"); 

$id= $_GET["id"];
$sqlDelete = $conn->prepare("DELETE from customer where id=?");
echo "ses".$id;
$sqlDelete->execute(array($id));

header("Location:list.php");

?>