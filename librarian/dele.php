<?php
include_once("connection.php");
$con = connection();



 if (isset($_POST['delete'])) {
 $id = $_POST['id'];
$sql2 = "DELETE FROM `message` WHERE $id = '$id'";
$con->query($sql2) or die($con->error);

                              
  	  echo header("Location:../librarian/recieve.php");
 }
?>