<?php
// Start session to access session variables
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['check']) || $_SESSION['check'] != 1) {
    header("location: index.php");
    exit();
}

// Database connection details
$servername = "localhost:3306";
$dbname = "dataapp";
$username = "root";
$password = "";

// Create a PDO connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// Fetch data from the add-product table
$stmt = $conn->prepare("SELECT * FROM `add-product`");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Generate CSV content
$csvContent = "Product Name,Quantity,Old Price,New Price,Description,Metatags,Main Category,Sub Category,Dimensions,Weight,Main Color,Sub Color,Image 1,Image 2,Image 3,Image 4,Unique ID,Product SKU\n";
foreach ($data as $row) {
    $csvContent .= "{$row['prodname']},{$row['quantity']},{$row['oldprice']},{$row['newprice']},{$row['descr']},{$row['metatags']},{$row['maincat']},{$row['subcat']},{$row['dimen']},{$row['weight']},{$row['maincol']},{$row['subcol']},{$row['image']},{$row['image2']},{$row['image3']},{$row['image4']},{$row['uniqueid']},{$row['prodsku']}\n";
}

// Set headers for download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="add_product_data.csv"');

// Output CSV content to the browser
echo $csvContent;

// Close the database connection
$conn = null;
?>
