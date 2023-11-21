<?php
include_once("connection.php");
$con = connection();



 if (isset($_POST['delete'])) {
 // $bookid = $_POST['bookid'];
      
         $bookid=$_POST['bookid'];

       $deletor=$_POST['deletor'];
       $item=$_POST['item'];
   
echo $sql2 = "DELETE FROM `book`";
$con->query($sql2) or die($con->error);
echo $sql3 = "INSERT INTO `tbl`(`BookId`, `deletor`,  `item`) VALUES ('$bookid','$deletor','$item')";
$con->query($sql3) or die($con->error);




echo header("Location:../admin/book.php");



                      
  	 
 }






?>