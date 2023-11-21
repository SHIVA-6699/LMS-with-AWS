<?php
include_once("connection.php");
$con = connection();



 if (isset($_POST['delete'])) {
 $bookid = $_POST['bookId'];
 $sql2 = "DELETE FROM `book` WHERE bookid = '$bookid'";
$con->query($sql2) or die($con->error);
                                
  	  echo header("Location: book.php")  ;
 }
?>