<?php
session_start();
 $host = "localhost";
$username = "root";
$password = "";
$database = "qrcodedb";


 $conn = new mysqli($host,$username,$password,$database);


if ($conn->error) {
    echo $conn->error;
}



// if (isset($_POST['update'])) {
   
// $tag =  $_POST['tag'];
// $firstname =  $_POST['firstname'];  
// $age =  $_POST['age'];
// $gender = $_POST['gender'];
// $category =  $_POST['category'];
// $department =  $_POST['department'];

// echo  $sql1 = "UPDATE student SET `STUDENTID`='$tag',`FIRSTNAME`='$firstname',`AGE`='$age',`GENDER`='$gender',`CATEGORY`='$category',`DEPARTMENT`='$department' WHERE id = '$id'";
// $query = $conn->query($sql1) or die($conn->error);


// }






$id = $_GET['king'];
$sql = "SELECT * FROM student WHERE id = '$id' ";
 $query = $conn->query($sql) or die($conn->error);
 $row = $query->fetch_assoc();

 
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="add.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
  <form action="Update.php?king=<?php echo $id ?>" method="post">
        <div class="user-details">
          <div class="input-box">
          <?php  do {



          ?>
            <span class="details"> USER'S ID</span>
            <input type="text" placeholder="Enter your User ID" name="tag"  value="<?php echo $row['STUDENTID'];?>">
          </div>
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="firstname" required value="<?php echo $row['FIRSTNAME'];?>">
          </div>
          
          <div class="input-box">
            <span class="details">Age</span>
            <input type="text" placeholder="Enter your age" name="age" required value="<?php echo $row['AGE'];?>">
          </div>
          <div class="input-box">
            <span class="details">Category</span>
              <select name="category"  style="width: 100%; height: 45px;">
                <option></option>
                <option value="Student" <?php echo ($row['CATEGORY']== "Student" )? 'selected': '';?> >Student</option>
                <option value="Faculty" <?php echo ($row['CATEGORY']== "Faculty" )? 'selected': '';?>>Faculty</option>
                <option value="Staff" <?php echo ($row['CATEGORY']== "Staff" )? 'selected': '';?>>Staff</option>
              </select>            
          </div>
          <div class="input-box">
            <span class="details">Department</span>
            <select name="department"  style="width: 100%; height: 45px;">
              <option></option>
              <option value="Computer Studies"<?php echo ($row['DEPARTMENT']== "Computer Studies" )? 'selected': '';?>>Computer Studies</option>
              <option value="Education"<?php echo ($row['DEPARTMENT']== "Education" )? 'selected': '';?>>Education</option>
              <option value="Agriculture"<?php echo ($row['DEPARTMENT']== "Argiculture" )? 'selected': '';?>>Argiculture</option>
              <option val ue="Jr.High School"<?php echo ($row['DEPARTMENT']== "Jr.High School" )? 'selected': '';?>>Jr.High School</option>
              <option value="Sr.High School"<?php echo ($row['DEPARTMENT']== "Sr.High School" )? 'selected': '';?>>Sr.High School</option>              
            </select>
           
          </div>
          <div class="input-box">
            <span class="details">Gender</span>
            <select name="gender"  style="width: 100%; height: 45px;">
              <option></option>
              <option value="Male" <?php echo ($row['GENDER']== "Male" )? 'selected': '';?>>Male</option>
              <option value="Female" <?php echo ($row['GENDER']== "Female" )? 'selected': '';?>>Female</option>
              <option value="Other" <?php echo ($row['GENDER']== "Other" )? 'selected': '';?>>Other</option>
                          
            </select>
           
          </div>
         
          
         
        </div>
     
       
       <?php }while ($row = $query->fetch_assoc())?>
        <div class="button" style="width: 100%; background: linear-gradient(135deg, #71b7e6, #9b59b6">
         <input type="submit" value="Update" name="submit">
         

              <button type="submit" name="delete" style="width: 100%; background: linear-gradient(135deg, #71b7e6, #9b59b6); "  > DELETE </button>
                <input type="hidden" name="ID" value="<?php echo $id ?>">
                      
               </form>
      
        </div>
   </div>
<?php
if(isset($_POST['submit']))
{

$tag =  $_POST['tag'];
$firstname =  $_POST['firstname'];  
$age =  $_POST['age'];
$gender = $_POST['gender'];
$category =  $_POST['category'];
$department =  $_POST['department'];


 $sql1 = "UPDATE `student` SET `STUDENTID`='$tag',`FIRSTNAME`='$firstname',`AGE`='$age',`GENDER`='$gender',`CATEGORY`='$category',`DEPARTMENT`='$department' WHERE ID = $id ";

$conn->query($sql1) or die($conn-error);

echo header("Location:edit.php");


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










      </form>
      
    </div>
  </div>

</body>
</html>