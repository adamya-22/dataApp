<?php
$a = $_POST["prodname"];
$b = $_POST["quantity"];
$c = $_POST["Cprice"];
$d = $_POST["Sprice"];
$d2 = $_POST["prodsku"];

$e = $_POST["descr"];
$f = $_POST["metatags"];
$g = $_POST["maincat"];
$h = $_POST["variant"];
$i = $_POST["size"];
$j = $_POST["weight"];


$filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];
$folder = "uploads/" . $d2 . "(1).jpg"; // Rename the main image according to product SKU

$filename2 = $_FILES["image2"]["name"];
$tempname2 = $_FILES["image2"]["tmp_name"];
$folder2 = "uploads/" . $d2 . "(2).jpg";

$filename3 = $_FILES["image3"]["name"];
$tempname3 = $_FILES["image3"]["tmp_name"];
$folder3 = "uploads/" . $d2 . "(3).jpg";

$filename4 = $_FILES["image4"]["name"];
$tempname4 = $_FILES["image4"]["tmp_name"];
$folder4 = "uploads/" . $d2 . "(4).jpg";

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'dataapp';

$con = mysqli_connect($host, $user, $password, $dbname);
if (!$con) {
    die("connection issue" . mysqli_connect_error());
} else {
    $sql = "INSERT INTO `add-product`(`prodname`, `quantity`, `Cprice`, `Sprice`, `descr`, `metatags`, `maincat`, `variant`, `size`, `weight`, `image`, `image2`, `image3`, `image4`, `prodsku`)
    VALUES ('$a', '$b', '$c','$d', '$e', '$f', '$g', '$h', '$i', '$j', '$d2 (1).jpg', '$d2 (2).jpg', '$d2 (3).jpg', '$d2 (4).jpg', '$d2')";

    if (move_uploaded_file($tempname, $folder)) {
        // Image uploaded successfully
    } else {
        echo "<h3> Failed to upload main image!</h3>";
    }

    if (move_uploaded_file($tempname2, $folder2)) {
        // Image2 uploaded successfully
    } else {
        echo "<h3> Failed to upload image2!</h3>";
    }

    if (move_uploaded_file($tempname3, $folder3)) {
        // Image3 uploaded successfully
    } else {
        echo "<h3> Failed to upload image3!</h3>";
    }

    if (move_uploaded_file($tempname4, $folder4)) {
        // Image4 uploaded successfully
    } else {
        echo "<h3> Failed to upload image4!</h3>";
    }

    if (mysqli_query($con, $sql)) {
        echo "<br> Product with SKU - $d2 added successfully";
    } else {
        echo 'Entry not created';
    }

    mysqli_close($con);
    header('location: admin_panel.php');
    exit;
}
?>
