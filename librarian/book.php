<?php
require('dbconn.php');

?>

<?php 
if ($_SESSION['RollNo'] == false) {

 echo header("Location:nicetry.php");
}
$rollno = $_SESSION['RollNo'];
                                $sql="select * from LMS.user where RollNo='$rollno'";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();
                                
                                $type = $row['Type'];

if ($type == 'Student') {
    

echo header("Location:../student/index.php");

}
if ($_SESSION['RollNo'] !== 'staff') {

    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LMS</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">LMS </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php">Your Profile</a></li>
                                    <!--li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li-->
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                           <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home
                                </a></li>
                                <li class="active"><a href="../qr/index.php"><i class="menu-icon icon-home"></i>Visit Hours 
                                </a></li>
                                 <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Messages</a>
                                </li>
                                <li><a href="recieve.php"><i class="menu-icon icon-inbox"></i>Recieve Message</a>
                                </li>
                                <li><a href="student.php"><i class="menu-icon icon-user"></i>Manage Students </a>
                                </li>
                                <li><a href="book.php"><i class="menu-icon icon-book"></i>All Books </a></li>
                                <li><a href="addbook.php"><i class="menu-icon icon-edit"></i>Add Books </a></li>
                                <li><a href="requests.php"><i class="menu-icon icon-tasks"></i>Issue/Return Requests </a></li>
                                <!-- <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>Book Recommendations </a></li> -->
                                <li><a href="current.php"><i class="menu-icon icon-list"></i>Currently Issued Books </a></li>
                                 <li><a href="pre.php"><i class="menu-icon icon-list"></i>Previously Borrowed Books </a></li>
                                <li><a href="history.php"><i class="menu-icon icon-list"></i>Recent Deletion Books </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>

                    <div class="span9">
                  <form class="form-horizontal row-fluid" action="book.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Search"><b>Search:</b></label>
                                            <div class="controls">
                                                <input type="text" id="Textbook" name="Textbook" placeholder="Enter Section And Book Name" class="span8" required>
                                                <button type="submit" name="submit"class="btn">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                    <br>

                                     <form class="form-horizontal row-fluid" action="lab.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Search"><b>Select Section:</b></label>
                                            <div class="controls">
                                               <select name = "Section" tabindex="1" value="SC" data-placeholder="" class="span3" required style="float:left;">
                                                  <!--   <option value="<?php echo $status?>"><?php echo $status ?> </option> -->
                                                  <option value=""></option>
                                                    <option value="General Reference">General Reference</option>
                                                    <option value="Reference">Reference</option>
                                                    <option value="Filipiniana">Filipiniana</option>
                                                    <option class="Periodical">Periodical</option>
                                                    <option value="Reserved Books"> Reserved Books</option>
                                                    <option value="Graduate Studies">Graduate Studies</option>
                                                    <option value="Special Collections">Special Collection</option>
                                                    <option value="Rare Book"> Rare Book</option>
                                                      <option value="Computer Internet Area">Computer Internet Area</option>
                                                </select>
                                                 <label class="control-label" for="Search"><b>Select Status:</b></label>
                                                <select name = "Status" tabindex="1" value="SC" data-placeholder="Select Status" class="span2">
                                                  <!--   <option value="<?php echo $status?>"><?php echo $status ?> </option> -->
                                                  <option value=""></option>
                                                    <option value="GOOD">GOOD</option>
                                                    <option value="DAMAGE">DAMAGE</option>
                                                    <option value="DILAPIDATED">DILAPIDATED</option>
                                                    
                                                </select>
                                                <button type="submit" name="submit"class="btn">Generate Report</button>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <?php
                                    if(isset($_POST['submit']))
                                        {$s=$_POST['Textbook'];

                                            $sql="select * from LMS.book where Section like '%$s%' OR Textbook like '%$s%'";
                                    // $sql = "select * from LMS.book where BookId = '$s' or Textbook like '%s%' ";
                                     // $name=$row['Textbook'];
                                 // $rs = $conn->query($sql);
                                        }
                                    else
                                        $sql="select * from LMS.book";

                                    $result=$conn->query($sql);
                                    $rowcount = mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                                    else
                                    {

                                    
                                    ?>
                                      <form action="excel.php" method="post" style="float: left;">
                                    <input type="submit" name="export_excel" class="btn btn-success" value="Export All Books">
                                </form>
                                    

                                 <form action="delallb.php" method="post">
                                               <!-- <button type="submit" name="delete" class="btn btn-primary">Delete All</button> -->
                                             <!--   <button onclick="myFunction2()" name="delete" type="submit" class="btn btn-primary">Delete All</button>
                                                    <script>
                                                    function myFunction2() {
                                                    alert('All Book Deleted');


                                                      
                                                            


                                                }
                                                    
                                                    </script>
                                                -->



<button onclick="return myFunction2()" name="delete" type="submit" class="btn btn-primary">Delete All </button>
<script>
function myFunction2() {
return confirm('Are you sure you want to delete all book?'); } 
</script>





                                           
                        <table class="table" id = "tables">
                                  <thead>
                                    <tr>
                                      <th>Book id</th>
                                       <th>Section</th>
                                      <th>Book name</th>
                                      <th>Availability</th>
                                      <th>Actions</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            
                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {      
                              
                                $bookid=$row['BookId'];
                                $section = $row['Section'];
                                $name=$row['Textbook'];
                                $avail=$row['Availability'];
                            
                           
                            ?>
                                    <tr>
                                      <td><?php echo $bookid ?></td>
                                       <td><?php echo $section ?></td>
                                      <td><?php echo $name ?></td>
                                      <td><b><?php echo $avail ?></b></td>
                                        <td><center>
                                            <a href="bookdetails.php?id=<?php echo $bookid; ?>" class="btn btn-primary">Details</a>
                                            <a href="edit_book_details.php?id=<?php echo $bookid; ?>" class="btn btn-success">Edit</a>
                                           <input type="hidden" name="bookid" value="<?php echo $bookid ?>">
                                               <input type="hidden" name="name" value="<?php echo $bookid ?>">
                                               <input type="hidden" name="item" value="all book">
                                               <input type="hidden" name="deletor" value="librarian">
                                           </form>  
                                        </center></td>
                                       
                                    </tr>
                               <?php }} ?>
                               </tbody>
                                </table>
                            </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
<div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2022 LMS Login. King A. Albaracin & Mariabil V. Caga-anan </b>All rights reserved.
            </div>
        </div>
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>