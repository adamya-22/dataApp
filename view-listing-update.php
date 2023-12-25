<?php
// Start session to access session variables
session_start();

// Check if the 'check' variable is not set or is set to 0, redirect to index.php
if (!isset($_SESSION['check']) || $_SESSION['check'] != 1) {
    header("location: index.php");
    exit(); // Ensure script stops here to avoid further execution
}

// Logout functionality
if (isset($_POST['logout'])) {
    // Set 'check' to 0 on logout
    $_SESSION['check'] = 0;
    header("location: index.php");
    exit(); // Ensure script stops here to avoid further execution
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .box{
            display: flex;
            text-align: center;
            width: 80vw;
            height: max-content;
            align-items: center;
            justify-content: space-around;
            flex-direction: column;

        }
</style>
</head>
<body>
<?php include("header_admin.php"); ?>
<div style="display: flex;min-height: 81vh;">
<?php include("sidebar.php"); ?>
    <div class="box">

    <?php
                    $servername = "localhost";
                    $user = "root";
                    $password = "";
                    $dbname = "dataapp";

                    // Create connection
                    $conn = mysqli_connect($servername, $user, $password, $dbname);
                    // Check connection
                    if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM `add-product` where `uniqueid`=".$_GET['uniqueid']; 
                    

                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
        <div class="box2">

            <form action="---*---*---" style="padding: 40px 374px;" enctype="multipart/form-data" method="post">
                <h2>Update</h2><br><br>
                <label for="name"></label>
                <input type="hidden" name="id" value="<?php echo $row['uniqueid'];?>">

                <label for="name"><b>Product Name <div class="star">*</div></b></label>
                <input type="text" name="prodname" value="<?php echo $row['prodname'];?>" required><br><br>

                <label for="name"><b>Quantity <div class="star">*</div></b></label>
                <input type="number" name="quantity" value="<?php echo $row['quantity'];?>" required><br><br>

                <label for="name"><b>Product SKU <div class="star">*</div></b></label>
                <input type="text" name="prodsku" value="<?php echo $row['prodsku'];?>" required><br><br>

                <label for="name"><b>Old Price <div class="star">*</div></b></label>
                <input placeholder="This will be cut" type="number" name="oldprice" value="<?php echo $row['oldprice'];?>" required><br><br>

                <label for="name"><b>New Price <div class="star">*</div></b></label>
                <input type="number" name="newprice" placeholder="Length must be between 8 to 12 characters" value="<?php echo $row['newprice'];?>" required><br><br>
                
                <label for="image"><b>Main Image </b><div class="star">*</div></label>
                <input type="file" name="image" required><br><br>

                <label for="image"><b>Image 2</b></label>
                <input type="file" name="image2"><br><br>

                <label for="image"><b>Image 3</b></label>
                <input type="file" name="image3"><br><br>

                <label for="image"><b>Image 4</b></label>
                <input type="file" name="image4"><br><br>

                <label for="name"><b>Description</b></label>
                <textarea style="width: 98%;
                padding: 10px;
                margin: 0px 0 0px 0;
                display: inline-block;
                border: 1px solid black;
                background: #f1f1f1;" type="text" name="descr" placeholder="Product Description" rows="5" cols="50" value="<?php echo $row['descr'];?>"></textarea><br><br>

                <label for="name"><b>Meta Tags</b></label>
                <textarea style="width: 98%;
                padding: 10px;
                margin: 0px 0 0px 0;
                display: inline-block;
                border: 1px solid black;
                background: #f1f1f1;" type="text" name="metatags" placeholder="seperated by ',' " rows="5" cols="50" value="<?php echo $row['metatags'];?>"></textarea><br><br>

                <label for="name"><b>Main Category / Collection</b></label>
                <input type="text" name="maincat" value="<?php echo $row['maincat'];?>"><br><br>

                <label for="name"><b>Sub Category / Collection</b></label>
                <input type="text" name="subcat" value="<?php echo $row['subcat'];?>"><br><br>

                <label for="name"><b>Dimensions</b></label>
                <input type="text" name="dimen" value="<?php echo $row['dimen'];?>"><br><br>

                <label for="name"><b>Weight</b></label>
                <input type="text" name="weight" value="<?php echo $row['weight'];?>"><br><br>

                <label for="name"><b>Main Colour</b></label>
                <input type="color" name="maincol" value="<?php echo $row['maincol'];?>"><br><br>

                <label for="name"><b>Secondary Colour</b></label>
                <input type="color" name="subcol" value="<?php echo $row['subcol'];?>"><br><br>

                <button class="savebtn" type="submit">Save</button>
            </form>
            <?php
            }
            } else {
            echo "0 results";
            }

            mysqli_close($conn);
            ?>
</div>
    </div>
    </body>
</html>