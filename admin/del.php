<?php
include_once("connection.php");
$con = connection();



 if (isset($_POST['delete'])) {
 $M_Id = $_POST['M_Id'];
 $sql2 = "DELETE FROM `message` WHERE M_Id = '$M_Id'";
$con->query($sql2) or die($con->error);

                              
  	  echo header("Location: ../admin/recieve.php");
 }
?>