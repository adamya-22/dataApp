<?php
$a = $_POST["colltitle"];
$b = $_POST["collname"];
$c = $_POST["colldescr"];
$d = $_POST["collmetatags"];



$filename = $_FILES["collimage"]["name"];
$tempname = $_FILES["collimage"]["tmp_name"];
$folder = "uploads/" . $filename;



$host='localhost';
$user='root';
$password='';
$dbname='dataapp';
session_start();
$con=mysqli_connect($host,$user,$password,$dbname);
if(!$con)
die("connection issue".mysqli_connect_error());
else
// echo'connected successfully';
// header("location: t2_2.php");
$sql="INSERT INTO `add-collection`(colltitle, collname,collimage, colldescr, collmetatags)
VALUES ('$a', '$b', '$filename', '$c','$d')";



if (move_uploaded_file($tempname, $folder)) {
    // echo "<h3>  Image uploaded successfully!</h3>";
    // header("location: t2_2.php");
} else {
    echo "<h3>  Failed to upload image!</h3>";
}


if(mysqli_query($con,$sql))
echo"<br> product with SKU - $d2 added successfully";
else
echo'entry not created';

mysqli_close($con);
$_SESSION['success']= "User Added Successfully";
header('location: admin_panel.php');
exit;


?>
