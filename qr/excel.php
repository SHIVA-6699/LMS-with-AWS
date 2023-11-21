<?php
include_once("connection.php");
$con = connection();
$output = '';
if(isset($_POST["export_excel"]))
{ $s=$_POST['datepick'];
 $sql ="SELECT * FROM attendance LEFT JOIN student ON attendance.STUDENTID=student.STUDENTID WHERE LOGDATE like '%$s%'";
$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0 ) {
	
}
$output .='
<table class = "table" bordered = "2">
								 <thead>
                                    <tr>
                                      <tr>
            
            <td>USERS ID</td>
            <td>NAME</td>
            <td>CATEGORY</td>
            <td>DEPARTMENT</td>
            <td>TIME IN</td>
            <td>TIME OUT</td>
            <td>LOGDATE</td>
                        </tr>
                                  </thead>

';

while ($row = mysqli_fetch_array($result)) {
	$output .='
									 <tr>
                                      <td>'.$row["STUDENTID"].'</td>
                                      <td>'.$row["FIRSTNAME"].'</td>
                                        <td>'.$row["CATEGORY"].'</td>
                                        <td>'.$row["DEPARTMENT"].'</td>
                                        <td>'.$row["TIMEIN"].'</td>
                                      <td>'.$row["TIMEOUT"].'</td>
                                        <td>'.$row["LOGDATE"].'</td>
                                  			  </tr>

	';
}
$output .='</table>';
header("Content-Type: Books");
header("Content-Disposition:attachment; filename=LibraryVisits.xls");
echo $output;

}



?>