<?php
require('dbconn.php');
?>

<?php

                             	$rollno = $_SESSION['RollNo'];
                                $sql="select * from LMS.user where RollNo='$rollno'";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();
                              	
                              	$type = $row['Type'];

                                // $name=$row['Name'];
                                // $category=$row['Category'];
                                // $email=$row['EmailId'];
                                // $mobno=$row['MobNo'];
                               

if ($type == 'Student')

{

echo header("Location:../student/index.php");

}

if($rollno == NULL){
echo header("location:../");
}

	?>













<!DOCTYPE html>
<html lang="en" >
<head>
	<title>QR Code Generator</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
	<style>
		body {
			margin: 0;
			background-color: #ecfab6;
		}
	</style>
</head>
<body>
	<div class="container py-3">

		<div class="row">
			<div class="col-md-12"> 

				<div class="row justify-content-center">
					<div class="col-md-6">
						<!-- form user info -->
						<div class="card card-outline-secondary">
							<div class="card-header">
								<h3 class="mb-0">QR Code Generator</h3>
							</div>
							<?php
							$first_name = "";
							
							if (isset($_POST["btnsubmit"])) {
									$first_name = $_POST["first_name"];
									

									/*echo "<pre>";
                                    var_dump($_POST);
                                    echo "</pre>";*/
							}
							?>
							<div class="card-body">
								<form autocomplete="off" class="form" role="form" action="generator.php" method="post">
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">User's ID</label>
										<div class="col-lg-9">
											<input class="form-control" type="text" value="<?php echo $first_name;?>" name="first_name" placeholder="enter User's id">
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label"></label>
										<div class="col-lg-9">
											<input class="btn btn-primary" type="submit" name="btnsubmit" value="Generate QR Code">
											  <a href="../card/index.php" class="downloadtable btn btn-primary">Back</a>
										</div>
									</div>
								</form>
								<?php
 									include "phpqrcode/qrlib.php";
 									$PNG_TEMP_DIR = 'temp/';
 									if (!file_exists($PNG_TEMP_DIR))
									    mkdir($PNG_TEMP_DIR);

									$filename = $PNG_TEMP_DIR . 'test.png';

									if (isset($_POST["btnsubmit"])) {

									$codeString = $_POST["first_name"] . "\n";
									
									$filename = $PNG_TEMP_DIR . 'test' . md5($codeString) . '.png';

									QRcode::png($codeString, $filename);

									echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" /><hr/>';
								}

								?>
							</div>
						</div><!-- /form user info -->
					</div>
				</div>

			</div><!--/col-->
		</div><!--/row-->

	</div><!--/container-->

</body>
</html>