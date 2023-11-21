<?php
require('dbconn.php');
?>


<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>Library Management </title>

	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="Library Member Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->

	<!-- Style --> <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

	<!-- Fonts -->
		<link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>
<style>
body{
background-color: #808080;


}

</style>
	<h1>LIBRARY MANAGEMENT </h1>

	<div class="container">

		<div class="login">
			<h2>Create New Admin</h2>
			<form action="index.php" method="post">
				<div class="send-button">
			   <a href="index.php">BACK</a>
			    
			</div>

			<!-- 	<input type="text" Name="RollNo" placeholder="ID number" required="">
				<input type="password" Name="Password" placeholder="Password" required=""> -->
			
			
			<div class="send-button">
				<!--<form>-->
				<!-- 	<input type="submit" name="signin"; value="Sign In"> -->
				</form>
			</div>
			
			<div class="clear"></div>
		</div>

		<div class="register">
			<h2>Sign Up</h2>
			<form action="addstaff.php" method="post">
				<input type="text" Name="Name" placeholder="Name" required>

				<input type="text" Name="Email" placeholder="Email" required>
				<input type="password" Name="Password" placeholder="Password" required>
				<input type="text" Name="PhoneNumber" placeholder="Phone Number" required>
				<input type="text" Name="RollNo" placeholder="ID Number" required="">
				
				<select name="type" id="type">
					<option value="librarian">Librarian</option>
					<option value="staff">Library Staff </option>
					
					
				</select>
				<br>
			
			
			<br>
			<div class="send-button">
			    <input type="submit" name="signup" value="Sign Up">
			    </form>
			</div>
			<p>By creating an account, you agree to our <a class="underline" href="terms.html">Terms</a></p>
			<div class="clear"></div>
		</div>

		<div class="clear"></div>

	</div>

	<div class="footer w3layouts agileits">
		<p> &copy; 2022 LMS Login. King A. Albaracin & Mariabil V. Caga-anan </a></p>
		
	</div>
<?php

if(isset($_POST['signup']))
{
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$mobno=$_POST['PhoneNumber'];
	$rollno=$_POST['RollNo'];
	$category=$_POST['Category'];
	$type=$_POST['type'];

	$sql="insert into LMS.user (Name,Type,Category,RollNo,EmailId,MobNo,Password) values ('$name','$type','$category','$rollno','$email','$mobno','$password')";

	if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Registration Successful')</script>";
echo header("Location: index.php");
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}





?>

</body>
<!-- //Body -->

</html>
