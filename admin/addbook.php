<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']== 'admin') {
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
                    <!--/.span9-->
                    <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Add Book</h3>
                            </div>
                            <div class="module-body">

                                    
                                    <br >

                                    <form class="form-horizontal row-fluid" action="addbook.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Section"><b>Book Section:</b></label>
                                            <div class="controls">
                                                <select name = "Section" tabindex="1" value="SC" data-placeholder="" class="span8" required>
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
                                            </div>
                                    </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Subject"><b>Subject</b></label>
                                            <div class="controls">
                                                <input type="text" id="Subject" name="Subject" placeholder="Subject" class="span8" required>
                                            </div>
                                        </div>
                                         <div class="control-group">
                                            <label class="control-label" for="book"><b>Textbook</b></label>
                                            <div class="controls">
                                                <input type="text" id="book" name="book" placeholder="Textbook" class="span8" required>
                                            </div>
                                        </div>
                                          <div class="control-group">
                                            <label class="control-label" for="Title"><b>Volume</b></label>
                                            <div class="controls">
                                                <input type="text" id="Title" name="Title" placeholder="Volumes" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Copyright"><b>Copyright Year</b></label>
                                            <div class="controls">
                                                <input type="text" id="Copyright" name="Copyright" placeholder="Copyright" class="span8" required>
                                            </div>
                                        </div>
                                      
                                        <div class="control-group">
                                            <label class="control-label" for="Availability"><b>Number of Copies</b></label>
                                            <div class="controls">
                                                <input type="text" id="availability" name="availability" placeholder="Number of Copies" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="Author"><b>Author</b></label>
                                            <div class="controls">
                                                <input type="text" id="Author" name="Author" placeholder="Author" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="ISBN"><b>ISBN</b></label>
                                            <div class="controls">
                                                <input type="text" id="ISBN" name="ISBN" placeholder="ISBN" class="span8" required>
                                            </div>
                                        </div>
                                         <div class="control-group">
                                            <label class="control-label" for="status"><b>Book Status:</b></label>
                                            <div class="controls">
                                                 <select name = "status" tabindex="1" value="SC" data-placeholder="Select Status" class="span8" required>
                                                  <!--   <option value="<?php echo $status?>"><?php echo $status ?> </option> -->
                                                  <option value=""></option>
                                                    <option value="GOOD">GOOD</option>
                                                    <option value="DAMAGE">DAMAGE</option>
                                                    <option value="DILAPIDATED">DILAPIDATED</option>
                                                </select>
                                                
                                            </div>
                                    </div>

                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="btn">Add Book</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>

                        
                        
                    </div><!--/.content-->
                </div>

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

<?php
if(isset($_POST['submit']))
{
 //    $title=$_POST['title'];
 //    $author=$_POST['author'];
 //   $section =$_POST['section'];
 //    $publisher=$_POST['publisher'];
 //    $year=$_POST['year'];
 //    $availability=$_POST['availability'];
 //    $aut = $_POST['aut'];
 //    $isbn = $_POST['isbn'];
 //    $status=$_POST['status'];


 // echo $sql1="insert into LMS.book (Section,Subject,Textbook,Volume,Year,Availability,Author,ISBN,Status) values ('$section',$title','$author','$publisher','$year','$availability','$aut','$isbn','$status')";

    // INSERT INTO `book`(`BookId`, `Section`, `Subject`, `Textbook`, `Volume`, `Year`, `Availability`, `Author`, `ISBN`, `Status`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])

$Section = $_POST['Section'];
$Subject = $_POST['Subject'];
$book = $_POST['book'];
$Title = $_POST['Title'];
$Copyright = $_POST['Copyright'];

$availability = $_POST['availability'];
$Author = $_POST['Author'];
$ISBN = $_POST['ISBN'];
$status = $_POST['status'];


 $sql1 = "INSERT INTO `book`( `Section`, `Subject`, `Textbook`, `Volume`, `Year`, `Availability`, `Author`, `ISBN`, `Status`) VALUES ('$Section','$Subject','$book','$Title','$Copyright','$availability','$Author','$ISBN','$status')";

if($conn->query($sql1) === TRUE){
$sql2="select max(BookId) as x from LMS.book";
$result=$conn->query($sql2);
$row=$result->fetch_assoc();
// $x=$row['x'];        
// $sql3="insert into LMS.author values ('$x','$author')";
// $result=$conn->query($sql3);
// if(!empty($author2))
// { $sql4="insert into LMS.author values('$x','$author2')";
//   $result=$conn->query($sql4);}
// if(!empty($author3))
// { $sql5="insert into LMS.author values('$x','$author3')";
//   $result=$conn->query($sql5);}

echo "<script type='text/javascript'>alert('Success')</script>";
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
    
}
?>
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>