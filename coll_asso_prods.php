<?php
                    $servername = "localhost";
                    $user = "root";
                    $password = "";
                    $dbname = "dataapp";
                    $abcd = $_GET['collname'];
                    // Create connection
                    $conn = mysqli_connect($servername, $user, $password, $dbname);
                    // Check connection
                    if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT *  FROM `add-product` WHERE `maincat`='$abcd'";
                    $sql2 = "SELECT *  FROM `add-collection` WHERE `collname`='$abcd'";
                    $result = mysqli_query($conn, $sql);
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
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
        .b2h{
            font-weight: 600;
            font-size: 30px;
            margin-top: 35px;
        }
        
    </style>
</head>
<body>
<?php include("header_admin.php"); ?>
<div style="display: flex;min-height: 81vh;">
<?php include("sidebar.php"); ?>
    <div class="box">

        <div class="b2h"><span>Associated products for <?php echo $row2['colltitle']; ?></span></div>
            
        <div style="width: 100%; display: flex; justify-content: space-around; margin-top: 35px;">
            <div>
                <h4>Collection Info</h4>
                <table style="background-color: #ceb2d8; border:2px solid black; width: 100%;">
                    <tr>
                        <th>Collection Image</th>
                        <td><img src="uploads/<?php echo $row2['collimage']; ?>" alt="not uploaded" style="height: 65px"></td>
                    </tr>
                    <tr>
                        <th>Collection Id</th>
                        <td><?php echo $row2['collid']; ?></td>
                    </tr>
                    <tr>
                        <th>Collection <Title></Title></th>
                        <td><?php echo $row2['colltitle']; ?></td>
                    </tr>
                    <tr>
                        <th>Collection  Name</th>
                        <td><?php echo $row2['collname']; ?></td>
                    </tr>
                    <tr>
                        <th>Collection Desc</th>
                        <td><?php echo substr($row2['colldescr'],0,30); ?>...</td>
                    </tr>
                    <tr>
                        <th>Collection MT</th>
                        <td><?php echo $row2['collmetatags']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="tab">
                <h4>Associated Products</h4>
            <table style="background-color: #ceb2d8; border:2px solid black; width: 100%;">
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>S.K.U.</th>
                    <th>Action</th>
                </tr>
                
                <?php
                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><img src="uploads/<?php echo $row['image'];?>" alt="" style="height: 100px;width: 100px;"></td>
                        <td><?php echo $row['prodname'];?></td>
                        <td><?php echo $row['newprice'];?></td>
                        <td><?php echo $row['quantity'];?></td>
                        <td><?php echo $row['prodsku'];?></td>
                        
                        <td style="display: flex; justify-content: space-around; border: 0; padding-top: 48px;">
                        <a title="View User" href="view-listing-view.php?uniqueid=<?php echo $row['uniqueid'] ?>">view</a>|
                        <a title="Edit User" onclick="update()" href="view-listing-update.php?uniqueid=<?php echo $row['uniqueid'] ?>">update</a>|
                        <a title="Delete User" class="confirmation" href="view-listing_delete.php?uniqueid=<?php echo $row['uniqueid'] ?>">delete</a>
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