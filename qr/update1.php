<?php
require('dbconn.php');
                        $server = "localhost";
                        $username="root";
                        $password="";
                        $dbname="qrcodedb";
                    
                        $conn = new mysqli($server,$username,$password,$dbname);
                        $date = date('Y-m-d');
                        if($conn->connect_error){
                            die("Connection failed" .$conn->connect_error);
                        }
?>



<?php

if(isset($_POST['submit']))
{

$tag =  $_POST['tag'];
$firstname =  $_POST['firstname'];  
$age =  $_POST['age'];
$gender = $_POST['gender'];
$category =  $_POST['category'];
$department =  $_POST['department'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$image = $_POST['image'];


echo $sql1 = "UPDATE `student` SET `STUDENTID`='$tag',`FIRSTNAME`='$firstname',`AGE`='$age',`GENDER`='$gender',`CATEGORY`='$category',`DEPARTMENT`='$department',`dob`='$dob',`phone`='$phone',`image`='$image' WHERE ID = $id ";

$conn->query($sql1) or die($conn-error);

// echo header("Location:edit.php");

// $sql1="update LMS.book set Title='$name', Author ='$author', Publisher='$publisher', Year='$year', Availability='$avail' where BookId='$bookid'";

}

?>



<?php


if (isset($_POST['delete'])) {

    $id =$_POST['ID'];
    $sql = "DELETE FROM student WHERE id = '$id'";
    $conn->query($sql) or die($conn->error);
    echo "<script type='text/javascript'>alert('Success')</script>";
   header( "Refresh:0.01; url=edit.php", true, 303);
}




?>