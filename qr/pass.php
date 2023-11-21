<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "qrcodedb";


 $conn = new mysqli($host,$username,$password,$database);


if ($conn->error) {
    echo $conn->error;
}

if (isset($_POST['delete'])) {

    $id =$_POST['ID'];
    $sql = "DELETE FROM student WHERE id = '$id'";
    $conn->query($sql) or die($conn->error);
    echo "<script type='text/javascript'>alert('Success')</script>";
   header( "Refresh:0.01; url=edit.php", true, 303);
}


 
?>


          
    

