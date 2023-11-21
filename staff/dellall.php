<?php
include_once("connection.php");
$con = connection();



 if (isset($_POST['delete'])) {
 // $bookid = $_POST['bookid'];
$sql2 = "DELETE FROM `record`";
$con->query($sql2) or die($con->error);

       echo "<script type='text/javascript'>alert('are you sure?')</script>";                   
  	  echo header("Location: ../staff/current.php")  ;
 }
?>