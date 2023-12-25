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
        table{
            /* position: relative; */
            /* top: 10px; */
            padding: 190px 0 40px 0;
        }
        td,th{
            border:2px solid black;
            border-collapse: collapse;
            padding: 6px;
            text-align: center;
        }
        .box1{
    display: flexbox;
    width: 20%;
    background-color: grey;
    height: auto;
    position: sticky;
    z-index: 0;
    /* left: 0; */
    /* top: 100px; */
        }
        .box2{
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: fit-content;
        }
        .b2h{
            font-size: 60px;
            position: fixed;
            top: 125px;
            left: 380px;
        }
        .tag{
            height: 20px;
            width: 40px;
        }
        h2{
            text-align: center;
            font-size: 60px;
            padding: 40px 0px 0px 0px;
            display: inline;
            position: absolute;
            top: 93px;
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
                <h2>Product Information</h2>
                <table>

                    <tr>
                        <th></th>
                        <td><img src="uploads/<?php echo $row['image'];?>" alt="" style="height: 100px;width: 100px;"></td>
                    </tr>
                    <!-- <tr>
                        <th></th>
                        <td><img src="uploads/<?php echo $row['image2'];?>" alt="" style="height: 100px;width: 100px;"></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><img src="uploads/<?php echo $row['image3'];?>" alt="" style="height: 100px;width: 100px;"></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><img src="uploads/<?php echo $row['image4'];?>" alt="" style="height: 100px;width: 100px;"></td>
                    </tr> -->



                    <tr>
                        <th>Product Name</th>
                        <td><?php echo $row['prodname'];?></td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td><?php echo $row['quantity'];?></td>
                    </tr>
                    <tr>
                        <th>Product SKU</th>
                        <td><?php echo $row['prodsku'];?></td>
                    </tr>
                    <tr>
                    <th>Old Price</th>
                    <td><?php echo $row['oldprice'];?></td>
                    </tr>
                    <tr>
                    <th>New Price</th>
                    <td><?php echo $row['newprice'];?></td>
                    </tr>
                    <tr>
                    <th>Description</th>
                    <td><?php echo $row['descr'];?></td>
                    </tr>
                    <tr>
                    <th>Meta Tags</th>
                    <td><?php echo $row['metatags'];?></td>
                    </tr>  
                    <tr>
                    <tr>
                    <th>Main Collection</th>
                    <td><?php echo $row['maincat'];?></td>
                    </tr>  
                    <tr>
                    <tr>
                    <th>Sub collection</th>
                    <td><?php echo $row['subcat'];?></td>
                    </tr>  
                    <tr>
                    <tr>
                    <th>Dimensions</th>
                    <td><?php echo $row['dimen'];?></td>
                    </tr>  
                    <tr>
                    <tr>
                    <th>Weight</th>
                    <td><?php echo $row['weight'];?></td>
                    </tr>  
                    <tr>
                    <tr>
                    <th>Main color</th>
                    <td><?php echo $row['maincol'];?></td>
                    </tr>  
                    <tr>
                    <th>Sub color</th>
                    <td><?php echo $row['subcol'];?></td>
                    </tr>  

                        <th>Action</th>
                        <td><a href="view-product-listing.php">Back</a></td>
                    </tr>
                </table>
            <?php
            }
            } else {
            echo "0 results";
            }

            mysqli_close($conn);
        ?>
    </table>
        </div>
    </div>
    </body>
</html>