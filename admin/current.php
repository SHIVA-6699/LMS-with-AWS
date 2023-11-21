<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']== 'admin' ) {
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
                    <!--/.span3-->

                    <div class="span9">
                        <form class="form-horizontal row-fluid" action="current.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Search"><b>Search:</b></label>
                                            <div class="controls">
                                                <input type="text" id="title" name="title" placeholder="Enter ID No of Student/Book Name/Book Id." class="span8" required>
                                                <button type="submit" name="submit"class="btn">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <?php
                                    if(isset($_POST['submit']))
                                        {$s=$_POST['title'];
                                        $sql="select record.BookId,id,RollNo,Textbook,Due_Date,Date_of_Issue,Date_of_Return,datediff(curdate(),Due_Date) as x from LMS.record,LMS.book where (Date_of_Issue and Date_of_Return is NULL and book.Bookid = record.BookId) and (RollNo='$s' or record.BookId='$s' or Textbook like '%$s%')";}


                                    else
                                        $sql="select record.BookId,id,RollNo,Textbook,Due_Date,Date_of_Issue,Date_of_Return,datediff(curdate(),Due_Date) as x from LMS.record,LMS.book where Date_of_Issue and Date_of_Return is NULL and book.Bookid = record.BookId";
                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                                    else
                                    {

                                    
                                    ?>
                                      <form action="excel1.php" method="post" style="float: left;">
                                    <input type="submit" name="export_excel" class="btn btn-success" value="Export to Excel">
                                </form>

                                <form action="dellall.php" method="post">
                                        <!-- <button type="submit" name="delete" class="btn btn-primary" onclick="myFunction2()">Delete All
                                              <script>
                                                    function myFunction2() {
                                                   return confirm('Are you sure you want to delete all book?');
                                                      }
                                                    
                                            </script>
                                        </button> -->
                                         <button onclick="return myFunction2()" name="delete" type="submit" class="btn btn-primary">Delete All</button>
                                                    <script>
                                                    function myFunction2() {
                                                   return confirm('Are you sure you want to delete all Currently Issued Books even it is not return?');}
                                                    </script>

  </form>
                                       
                                          
                        <table class="table" id = "tables">
                                  <thead>
                                    <tr>
                                      <th>Borrower's ID</th> 
                                   
                                      <th>Book id</th>
                                      <th>Book name</th>
                                      <th>Issue Date</th>
                                      <th>Due date</th>
                                      <th>Return Date</th>
                                      <th>Dues</th>
                                      <th>Delete</th>
                                     
                                    </tr>
                                  </thead>
                                  <tbody>

                                <?php

                            

                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                               $id = $row ['id'];
                                $rollno=$row['RollNo'];
                                $bookid=$row['BookId'];
                                $name=$row['Textbook'];
                                $issuedate=$row['Date_of_Issue'];
                                $return = $row['Date_of_Return'];
                                $duedate=$row['Due_Date'];
                                $dues=$row['x'];
                                 $dues=$row['x'];
                            ?>

                                    <tr>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                     
                                      <td><?php echo $bookid ?></td>
                                      <td><?php echo $name ?></td>
                                      <td><?php echo $issuedate ?></td>
                                      <td><?php echo $duedate ?></td>
                                      <td><?php echo $return ?></td>
                                      <td><?php if($dues > 0)
                                                  echo "<font color='red'>".$dues."</font>";
                                                else
                                                  echo "<font color='green'>0</font>";
                                              ?>
                                            

                                        <td><form action="delcu.php" method="post" >
                                           <button onclick="return myFunction2()" name="delete" type="submit" class="btn btn-primary">Delete</button>
                                           <input type="hidden" name="" value="<?php echo $bookid ?>">
                                                    <script>
                                                    function myFunction2() {
                                                   return confirm('Are you sure you want to delete this currently issued book?');}
                                                    </script>

                                        
                                            </form>
                                       
                                     </td>
                                     
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
                <b class="copyright">&copy; 2022 LMS Login. King A. Albaracin & Mariabil V. Caga-anan</b>All rights reserved.
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