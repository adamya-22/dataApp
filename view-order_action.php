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

$a = $_GET['case'];
$b = $_GET['orderid'];
switch($a){
    case "view": ?>
    <table style="border: 1px solid black; text-align: center;">
        <tr>
            <th style="border: 1px solid black; text-align: center;">Product Name</th>
            <td style="border: 1px solid black; text-align: center;">Quantity</td>
            <td style="border: 1px solid black; text-align: center;">Price</td>
            <td style="border: 1px solid black; text-align: center;">Total Price</td>
        </tr>
        <?php $sql = "SELECT * from `cart2` where `orderid`='$b'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td style="border: 1px solid black; text-align: center;"><?php echo $row['prodname'];?></td>
                            <td style="border: 1px solid black; text-align: center;"><?php echo $row['quantity'];?></td>
                            <td style="border: 1px solid black; text-align: center;"><?php echo $row['newprice'];?></td>
                            <td style="border: 1px solid black; text-align: center;"><?php echo $row['newprice']*$row['quantity'];?></td>
                        </tr><br>
                        <?php   
                                        }
    break;?>
    </table>
    <?php
    case "delete": 
        $sql = "DELETE FROM `cart2` where orderid='$b'";
        $sql2 = "DELETE FROM `order` where orderid='$b'";
        
                
                if (mysqli_query($conn, $sql)) {
                echo "Record deleted successfully";
                } else {
                echo "Error deleting record: " . mysqli_error($conn);
                }

                if (mysqli_query($conn, $sql2)) {
                    echo "Record deleted successfully";
                    header("location: view-orders.php");                    } else {
                    echo "Error deleting record: " . mysqli_error($conn);
                    }
    break;
}
?>