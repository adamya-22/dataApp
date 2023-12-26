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
    <style>
        /* Style the Image Used to Trigger the Modal */
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}
#myImg2 {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg2:hover {opacity: 0.7;}
#myImg3 {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg3:hover {opacity: 0.7;}
#myImg4 {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg4:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption {
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
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

                    <!-- <tr>
                        <th>images</th>
                        <td><img src="uploads/<?php echo $row['image'];?>" alt="" style="height: 150px;width: 150px;">
                    
                        <img src="uploads/<?php echo $row['image2'];?>" alt="" style="height: 150px;width: 150px;">
                    
                        <img src="uploads/<?php echo $row['image3'];?>" alt="" style="height: 150px;width: 150px;">
                    
                        <img src="uploads/<?php echo $row['image4'];?>" alt="" style="height: 150px;width: 150px;"></td>
                    </tr> -->


                    <tr>
                        <th>images</th>
                        <td>
                            <!-- image 1 -->
                            <img id="myImg" src="uploads/<?php echo $row['image'];?>" alt="" style="height: 150px;width: 150px;">

                            <!-- The Modal -->
                            <div id="myModal" class="modal">

                            <!-- The Close Button -->
                            <span class="close">&times;</span>

                            <!-- Modal Content (The Image) -->
                            <img class="modal-content" id="img01" src="uploads/<?php echo $row['image'];?>" alt="">

                            <!-- Modal Caption (Image Text) -->
                            <div id="caption"></div>
                            </div>
                    
                            <!-- image 2 -->
                            <img id="myImg2" src="uploads/<?php echo $row['image2'];?>" alt="" style="height: 150px;width: 150px;">

                            <!-- The Modal -->
                            <div id="myModal" class="modal">

                            <!-- The Close Button -->
                            <span class="close">&times;</span>

                            <!-- Modal Content (The Image) -->
                            <img class="modal-content" id="img01" src="uploads/<?php echo $row['image2'];?>" alt="">

                            <!-- Modal Caption (Image Text) -->
                            <div id="caption"></div>
                            </div>


                            <!-- image 3 -->
                            <img id="myImg3" src="uploads/<?php echo $row['image3'];?>" alt="" style="height: 150px;width: 150px;">

                            <!-- The Modal -->
                            <div id="myModal" class="modal">

                            <!-- The Close Button -->
                            <span class="close">&times;</span>

                            <!-- Modal Content (The Image) -->
                            <img class="modal-content" id="img01" src="uploads/<?php echo $row['image3'];?>" alt="">

                            <!-- Modal Caption (Image Text) -->
                            <div id="caption"></div>
                            </div>


                            <!-- image 4 -->
                            <img id="myImg4" src="uploads/<?php echo $row['image4'];?>" alt="" style="height: 150px;width: 150px;">

                            <!-- The Modal -->
                            <div id="myModal" class="modal">

                            <!-- The Close Button -->
                            <span class="close">&times;</span>

                            <!-- Modal Content (The Image) -->
                            <img class="modal-content" id="img01" src="uploads/<?php echo $row['image4'];?>" alt="">

                            <!-- Modal Caption (Image Text) -->
                            <div id="caption"></div>
                            </div>

                            </tr>



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
                    <td><?php echo $row['Cprice'];?></td>
                    </tr>
                    <tr>
                    <th>New Price</th>
                    <td><?php echo $row['Sprice'];?></td>
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
                    <td><?php echo $row['variant'];?></td>
                    </tr>  
                    <tr>
                    <tr>
                    <th>Dimensions</th>
                    <td><?php echo $row['size'];?></td>
                    </tr>  
                    <tr>
                    <tr>
                    <th>Weight</th>
                    <td><?php echo $row['weight'];?></td>
                    </tr>  
                    <tr>

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
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}


// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg2");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}


// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg3");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}


// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg4");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
</script>