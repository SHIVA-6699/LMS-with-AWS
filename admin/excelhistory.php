<?php
include_once("connection.php");
$con = connection();
$output = '';
if(isset($_POST["export_excel"]))
{
$sql = "SELECT * FROM tbl ORDER BY BookID DESC";
$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0 ) {
	
}
$output .='
<table class = "table" bordered = "2">
								 <thead>
                                    <tr>
                                      <th>Deletion Id</th>
                                      <th>User</th>
                                      <th>Books</th>
                                      <th>Date and Time</th>
                                     
                                    </tr>
                                  </thead>

';

while ($row = mysqli_fetch_array($result)) {
	$output .='
									 <tr>
                                      <td>'.$row["BookId"].'</td>
                                      <td>'.$row["deletor"].'</td>
                                        <td>'.$row["item"].'</td>
                                        <td>'.$row["date"].'</td>
                                       
                                  			  </tr>

	';
}
$output .='</table>';
header("Content-Type: Books");
header("Content-Disposition:attachment; filename=deletedhistory.xls");
echo $output;

}



?>