<?php
include_once("connection.php");
$con = connection();
$output = '';
if(isset($_POST["export_excel"]))
{
 // $sql ="SELECT * FROM record ORDER BY BookId DESC";
 // $sql="select record.BookId,RollNo,Title,Due_Date,Date_of_Issue,datediff(curdate(),Due_Date) as x from LMS.record,LMS.book where (Date_of_Issue is NOT NULL and Date_of_Return is NULL and book.Bookid = record.BookId) and (RollNo='$s' or record.BookId='$s' or Title like '%$s%')";

$sql = "select record.BookId,id,RollNo,Textbook,Due_Date,Date_of_Issue,Date_of_Return,datediff(curdate(),Due_Date) as x from LMS.record,LMS.book where Date_of_Issue and Date_of_Return is NULL and book.Bookid = record.BookId";



$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0 ) {
	
}
$output .='
<table class = "table" bordered = "2">
								 <thead>
                                    <tr>
                                      <tr>
            
                                       <th>Borrowers ID</th>    

                                      <th>Book id</th>
                                      <th>Book name</th>
                                      <th>Issue Date</th>
                                      <th>Due date</th>
                                    
                        </tr>
                                  </thead>

';

while ($row = mysqli_fetch_array($result)) {
	$output .='




									 <tr>
                                      <td>'.$row["RollNo"].'</td>
                                      <td>'.$row["BookId"].'</td>
                                        <td>'.$row["Title"].'</td>
                                        <td>'.$row["Date_of_Issue"].'</td>
                                        <td>'.$row["Due_Date"].'</td>
                                        <td>'.$row["Date_of_Return"].'</td>


                                       
                                  			  </tr>

	';
}
$output .='</table>';
header("Content-Type: Books");
header("Content-Disposition:attachment; filename=CurrentIssues.xls");
echo $output;

}



?>