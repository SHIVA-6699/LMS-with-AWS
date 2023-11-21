<?php
include_once("connection.php");
$con = connection();



 if (isset($_POST['delete'])) {
 $RollNo = $_POST['RollNo'];
$sql2 = "DELETE FROM `user` WHERE RollNo = '$RollNo'";
$con->query($sql2) or die($con->error);
                                
  	  echo header("Location: student.php")  ;
 }
?>