<?php
include_once("connection.php");
$con = connection();



 if (isset($_POST['delete'])) {
  $zoro = $_POST['zoro'];
       $nami = $_POST['nami'];
$sql2 = "DELETE FROM `record`";
$con->query($sql2) or die($con->error);



//  $sql3 = " INSERT INTO `tbl`(`deletor`, `item`) VALUES ('$zoro','$nami')";
// $con->query($sql3) or die($con->error);

                  
  	  echo header("Location: ../librarian/current.php")  ;
 }
?>