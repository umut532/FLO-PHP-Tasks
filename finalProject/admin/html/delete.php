
<?php 
include ("class.php");
$id = $_GET["id"];
$delete = new service;
$delete->delete($id);
?>