<?php
include_once("connection.php");
$con = connection();



 if (isset($_POST['delete'])) {
 
echo $sql2 = "DELETE FROM `record` WHERE id = id";
$con->query($sql2) or die($con->error);



//  $sql3 = " INSERT INTO `tbl`(`BookId`,`deletor`,`item`) VALUES ('$BookId','$zoro','$nami')";
// $con->query($sql3) or die($con->error);
              
  	  echo header("Location: ../librarian/current.php")  ;
 }
?>