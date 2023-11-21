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
<html>
    <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>QR Code | Log in</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">

		<script type="text/javascript" src="js/instascan.min.js"></script>
		<!-- DataTables -->
		<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<style>
		#divvideo{
			 box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.1);
		}
		</style>
    </head>
    <body style="background:#eee">
        <nav class="navbar" style="background:#fff">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="index.php">QR Code Attendance</a>
			</div>
			<ul class="nav navbar-nav">
			  <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			    
			  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Maintenance <span class="caret"></span></a>
				<ul class="dropdown-menu">
				 <!--  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Student</a></li> -->
				  <li><a href="add.php"><span class="glyphicon glyphicon-plus-sign"></span> Add Users</a></li>
				  <li><a href="attendance.php"><span class="glyphicon glyphicon-calendar"></span> Attendance</a></li>
				  	  <li><a href="edit.php"><span class="glyphicon glyphicon-plus-sign"></span>  Users</a></li>
				</ul>
			  </li>
			   <li><a href="../card/index.php"><span class="glyphicon glyphicon-cog"></span> Create Library Card</a></li>
			  


			    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Back to LMS Control Panel <span class="caret"></span></a>
				<ul class="dropdown-menu">
				 <!--  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Student</a></li> -->
				  <li><a href="../admin/index.php"><span class="glyphicon glyphicon-plus-sign"></span>Admin</a></li>
				  <li><a href="../librarian/index.php"><span class="glyphicon glyphicon-plus-sign"></span>Librarian</a></li>
				  	 <li><a href="../staff/index.php"><span class="glyphicon glyphicon-plus-sign"></span> Staff</a></li>
				</ul>
		  </div>
		</nav>
       <div class="container">
            <div class="row">
                <div class="col-md-12">
					<?php
					if(isset($_SESSION['error'])){
					  echo "
						<div class='alert alert-danger alert-dismissible' style='background:red;color:#fff'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-warning'></i> Error!</h4>
						  ".$_SESSION['error']."
						</div>
					  ";
					  unset($_SESSION['error']);
					}
					if(isset($_SESSION['success'])){
					  echo "
						<div class='alert alert-success alert-dismissible' style='background:green;color:#fff'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-check'></i> Success!</h4>
						  ".$_SESSION['success']."
						</div>
					  ";
					  unset($_SESSION['success']);
					}
				  ?>

                </div>
				
                <div class="col-md-12">
				<div style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo">
               <p>Users</p>
			   <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
						
						<td>USER'S ID</td>
						<td>NAME</td>
						<td>AGE</td>
						<td>GENDER</td>
						<td>CATEGORY</td>
						<td>DEPARTMENT</td>
						<td>ACTION</td>
						
						
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $server = "localhost";
                        $username="root";
                        $password="";
                        $dbname="qrcodedb";
                    
                        $conn = new mysqli($server,$username,$password,$dbname);
						$date = date('Y-m-d');
                        if($conn->connect_error){
                            die("Connection failed" .$conn->connect_error);
                        }

                           $sql ="SELECT * FROM `student` ";
                           $query = $conn->query($sql);
                           while ($row = $query->fetch_assoc()){
                        ?>
                            <tr>
                            	 <td><?php echo $row['STUDENTID'];?></td>
                               	<td><?php echo $row['FIRSTNAME'];?></td>
                               	<td><?php echo $row['AGE'];?></td>
								<td><?php echo $row['GENDER'];?></td>
                                 <td><?php echo $row['CATEGORY'];?></td>
                                  <td><?php echo $row['DEPARTMENT'];?></td>
                                 <td><a href="Update.php?king=<?php echo $row['id'];?>">EDIT</a><td>

                                  	<!-- <form action="pass.php" method="post"> 
                                  	
                                  	<td><button type="submit" value="DEL" name="delete"> DEL </button></td>
                                  	<input type="hidden" name="delete" value="<?php echo $row['id'];?>">
                                  	</form> -->
                                 
                              
                        <?php
                        }?>
                    </tbody>
                  </table>
				  
                </div>
				
                </div>
				
            </div>
						
        </div>
		<script>
			function Export()
			{
				var conf = confirm("Please confirm if you wish to proceed in exporting the attendance in to Excel File");
				if(conf == true)
				{
					window.open("export.php",'_blank');
				}
			}
		</script>				
    
		<script src="plugins/jquery/jquery.min.js"></script>
		<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

		<script>
		  $(function () {
			$("#example1").DataTable({
			  "responsive": true,
			  "autoWidth": false,
			});
			$('#example2').DataTable({
			  "paging": true,
			  "lengthChange": false,
			  "searching": false,
			  "ordering": true,
			  "info": true,
			  "autoWidth": false,
			  "responsive": true,
			});
		  });
		</script>
		
    </body>
</html>
