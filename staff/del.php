<?php
include_once("connection.php");
$con = connection();



 if (isset($_POST['delete'])) {
 $M_Id = $_POST['M_Id'];
echo $sql = "DELETE FROM `message` WHERE M_Id = $M_Id ";
$con->query($sql) or die($con->error);

                              
  	  echo header("Location: ../staff/recieve.php")  ;
 }
?>