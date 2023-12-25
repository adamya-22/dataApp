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
        }
        table tr td,th{
            border:2px solid black;
            padding: 6px;
            text-align: center;
        }
        
    </style>
</head>
<body>
<?php include("header_admin.php"); ?>
<div style="display: flex;min-height: 81vh;">
<?php include("sidebar.php"); ?>
    <div class="box">
        <div class="b2h"><span>Collection Listing</span><div class="b3h" style=""><a href="add-product.php">Add User</a></div></div>
            
            <div class="tab">
            <table style="background-color: #ceb2d8; border:2px solid black; width: 100%;">
                <tr>
                    <th>Image</th>
                    <th>Collection Title</th>
                    <th>Collection Name</th>
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

                    $sql = "SELECT *  FROM `add-collection`";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><img src="uploads/<?php echo $row['collimage'];?>" alt="not uploaded" style="height: 100px;width: 100px;"></td>
                        <td><?php echo $row['colltitle'];?></td>
                        <td><?php echo $row['collname'];?></td>

                        <td style="display: flex; justify-content: space-around; border: 0; padding-top: 48px;">
                        <a title="View User" href="coll_asso_prods.php?collname=<?php echo $row['collname'] ?>">view</a>|
                        <!-- <a title="Edit User" onclick="update()" href="view-listing-update.php?uniqueid=<?php echo $row['uniqueid'] ?>">update</a>|
                        <a title="Delete User" class="confirmation" href="view-listing_delete.php?uniqueid=<?php echo $row['uniqueid'] ?>">delete</a> -->
                        </td>
                    
                    </tr>
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
</div>


<script type="text/javascript">
            var elems = document.getElementsByClassName('confirmation');
            var confirmIt = function (e) {
                if (!confirm('Are you sure you want to delete the data of this user?')) e.preventDefault();
            };
            for (var i = 0, l = elems.length; i < l; i++) {
                elems[i].addEventListener('click', confirmIt, false);
            }

            // array z = document.getElementById("n1").value;
            // console.log(z);

            function update(){
                if (confirm("Are you sure, You want to update entry.") == true) {
                    text = "You pressed OK!";
                } else {
                    text = "You canceled!";
                }
            }
        </script>
</body>
</html>