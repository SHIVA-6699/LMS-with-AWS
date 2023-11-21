
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
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    -<title> Registration New User </title>-
    <link rel="stylesheet" href="add.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
  <form action="insert.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">ID</span>
            <input type="text" placeholder="Enter your User ID" name="id" required>
          </div>
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="firstname" required>
          </div>
          
          <div class="input-box">
            <span class="details">Age</span>
            <input type="text" placeholder="Enter your age" name="age" required>
          </div>
          <div class="input-box">
            <span class="details">Category</span>
              <select name="category" style="width: 100%; height: 40px;">
                <option></option>
                <option value="Student">Student</option>
                <option value="Faculty">Faculty</option>
                <option value="Staff">Staff</option>
              </select>            
          </div>
          <div class="input-box">
            <span class="details">Department</span>
            <select name="department" style="width: 100%; height: 40px;">
              <option></option>
              <option value="Computer Studies">Computer Studies</option>
              <option value="Education">Education</option>
              <option value="Agriculture">Argiculture</option>
              <option val ue="Jr.High School">Jr.High School</option>
              <option value="Sr.High School">Sr.High School</option>              
            </select>
           
          </div>
          <div class="input-box">
            <span class="details">Gender</span>
            <select name="gender" style="width: 100%; height: 40px;">
              <option></option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>         
            </select>
           
          </div>
           
        </div>
       
        <div class="button">
          <input type="submit" value="Register" name="submit">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
 