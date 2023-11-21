<?php
include_once("connection.php");
$con = connection();



 if (isset($_POST['delete'])) {
 $bookid = $_POST['bookId'];



       $deletor=$_POST['deletor'];
       $item=$_POST['item'];
 $sql2 = "DELETE FROM `book` WHERE bookid = '$bookid'";
$con->query($sql2) or die($con->error);
echo $sql3 = "INSERT INTO `tbl`(`BookID`, `deletor`,  `item`) VALUES ('$bookid','$deletor','$item')";
$con->query($sql3) or die($con->error);
                                
  	  echo header("Location: book.php")  ;
 }
?>