
 1
 2
 3
 4
 5
 6
 7
 8
 9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
 
<form method="post" enctype="multipart/form-data">
    <label>Title</label>
    <input type="text" name="title">
    <label>File Upload</label>
    <input type="File" name="file">
    <input type="submit" name="submit">
 
 
</form>
 
</body>
</html>
 
<?php 
$localhost = "localhost"; #localhost
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "CodeFlix";  #database name
 
#connection string
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
 
if (isset($_POST["submit"]))
 {
     #retrieve file title
        $title = $_POST["title"];
     
    #file name with a random number so that similar dont get replaced
     $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
   
     #upload directory path
$uploads_dir = 'images';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
 
    #sql query to insert into database
    $sql = "INSERT into fileup(title,image) VALUES('$title','$pname')";
 
    if(mysqli_query($conn,$sql)){
 
    echo "File Sucessfully uploaded";
    }
    else{
        echo "Error";
    }
}
 
 
?>
