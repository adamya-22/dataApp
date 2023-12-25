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
            /* display: flex;
            text-align: center;
            width: 80vw;
            height: 81vh;
            align-items: center;
            justify-content: space-around; */
            display: flex;
            text-align: center;
            width: 80vw;
            height: max-content;
            align-items: center;
            flex-direction: column;
        }
        table{
            /* position: relative; */
            /* top: 10px; */
        }
        table tr td,th{
            border:2px solid black;
            padding: 6px;
            text-align: center;
        }
        .add-ord{
            background-color: blue;
            margin: 40px 0 20px 0;
            padding: 5px 20px;
            border: 1px solid black;        }
    </style>
</head>
<body>
    <?php include('header_admin.php'); ?>
    <div style="display: flex; height: 81vh;">
<?php include("sidebar.php"); ?>
    <div class="box">
        <div class="add-ord">
            <a href="add-order.php">Add Order</a>
        </div>
        <table>
            <tr>
                <th>Order ID</th>
                <!-- <th>Name</th> -->
                <th>Email</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
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

    $sql = "SELECT * from `order`";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td><?php echo $row['orderid'];?></td>
        <!-- <td><?php echo $row['name'];?></td> -->
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['totprice'];?></td>
        <td>
            <a href="view-order_action.php?case=view&orderid=<?php echo $row['orderid']; ?>">view</a> | 
            <a href="view-order_action.php?case=delete&orderid=<?php echo $row['orderid']; ?>">cancel</a>
        </td>
    </tr>
    <?php   
                    }
                    } else {
                    echo "0 results";
                    }
                ?>
        </table>
    </div>
</body>
</html>