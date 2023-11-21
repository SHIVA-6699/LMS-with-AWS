<?php
$con =mysqli_connect("localhost","root","","image");

if ($con == TRUE) {
	echo "connected";
}else{
	echo "no connection";
}


if (isset($_POST['upload'])) {
	$file = $_FILES['image']['name'];

echo	$sql ="INSERT INTO `upload`(`image`) VALUES ('$file')";
echo	$res =mysqli_query($con,$sql);
	if ($res) {
		move_uploaded_file($_FILES['image']['tmp_name'],"$file");
	}
}




?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form>
	<label>Images</label>
	<input type="file" name="image">
	<input type="submit" name="upload" value="upload">

</form>
</body>
</html>