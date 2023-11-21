<?php
include_once("connection.php");
$con = connection();
$output = '';
if(isset($_POST["export_excel"]))
{
$sql = "SELECT * FROM book ORDER BY BookId DESC";
$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0 ) {
	
}
$output .='
<table class = "table" bordered = "2" style = "border: 2px;">
								 <thead>
                                    <tr>
                                      <th>Book id</th>
                                      <th>Section</th>
                                      <th>Subject</th>
                                      <th>Textbook</th>
                                      <th>Volume</th>
                                      <th>Copyright Year</th>
                                      <th>No. of Copies</th>
                                      <th>Author</th>
                                      <th>ISBN</th>
                                      <th>Status</th>
                                     
                                    </tr>
                                  </thead>

';

while ($row = mysqli_fetch_array($result)) {
	$output .='
									 <tr>
                                      <td>'.$row["BookId"].'</td>
                                      <td>'.$row["Section"].'</td>
                                        <td>'.$row["Subject"].'</td>
                                        <td>'.$row["Textbook"].'</td>
                                        <td>'.$row["Volume"].'</td>
                                      <td>'.$row["Year"].'</td>
                                        <td>'.$row["Availability"].'</td>
                                        <td>'.$row["Author"].'</td>
                                        <td>'.$row["ISBN"].'</td>
                                        <td>'.$row["Status"].'</td>
                                  			  </tr>

	';
}
$output .='</table>';
header("Content-Type: Books");
header("Content-Disposition:attachment; filename=book.xls");
echo $output;

}



?>
