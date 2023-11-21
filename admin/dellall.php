<?php
include_once("connection.php");
$con = connection();



 if (isset($_POST['delete'])) {
       $zoro = $_POST['zoro'];
       $nami = $_POST['nami'];
 $BookId = $_POST['BookId'];
$sql2 = "DELETE FROM `record`";
$con->query($sql2) or die($con->error);






//  $sql3 = " INSERT INTO `tbl`(`deletor`, `item`) VALUES ('$zoro','$nami')";
// $con->query($sql3) or die($con->error);

                        
  	  echo header("Location: ../admin/current.php")  ;
 }
?>