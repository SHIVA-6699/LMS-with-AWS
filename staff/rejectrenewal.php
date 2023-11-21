<?php
require('dbconn.php');

$bookid=$_GET['id1'];

$rollno=$_GET['id2'];

 $sql6="delete from LMS.renew where BookId='$bookid' and RollNo='$rollno'";

if($conn->query($sql6) == TRUE)

{
// 	$sql1="insert into LMS.message (RollNo,Msg,Date,Time) values ('$rollno','Your request for renew of BookId: $bookid  has been rejected',curdate(),curtime())";
//  $result=$conn->query($sql1);
// echo "<script type='text/javascript'>alert('Success')</script>";
// header( "Refresh:0.01; url=renew_requests.php", true, 303);
	$sql1 = "insert into LMS.message (RollNo,Msg,Date,Time) values ('$rollno', 'Your Request for renew of BookId: $bookid has been rejected', curdate(),curtime())";
	$result=$conn->query($sql1);
	echo "<script type='text/javascript'> alert ('Success')</script>";
	header("Refresh:0.01; url=renew_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:0.01; url=renew_requests.php", true, 303);

}




?>