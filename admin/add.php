<?php
include_once("connection.php");
$con = connection();

if(isset($_POST['submit'])){
$title = $_POST['title'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$year = $_POST['year'];
$availability = $_POST['availability'];
$status = $_POST['status'];


 $sql = "INSERT INTO `book`( `Title`, `Author`, `Publisher`, `Year`, `Availability`, `Status`) VALUES ('$title','$author','$publisher','$year','$availability','$status')";
// echo "<script type='text/javascript'>alert('Book Added')</script>";
// echo header("Location: addbook.php");

}


?>
