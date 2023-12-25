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
        }
        input[type=text],
        input[type=password], 
        input[type=url], 
        input[type=email],
        input[type=number] {
            width: 98%;
            padding: 10px;
            margin: 0px 0 0px 0;
            display: inline-block;
            border: 1px solid black;
            background: #f1f1f1;
        }
        h2{
            text-align: center;
            font-size: 60px;
            padding: 40px 0px 0px 0px;
        }
        .box1{
    display: flex;
    width: 20%;
    background-color: grey;
    height: auto;
    position: sticky;
    z-index: 0;
    /* left: 0; */
    /* top: 100px; */
        }

        .box2{
            padding: 0 70px 40px 70px;
            height: fit-content;
        }
        .submitbtn {
            background-color: grey;
            color: white;
            padding: 10px 20px;
            margin: 0px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            /* opacity: 0.9;    */
        }
        .star{
            display: inline;
            color: red;
        }
    </style>
</head>
<body>
<?php include("header_admin.php"); ?>
<div style="display: flex;">
<?php include("sidebar.php"); ?>
    <div class="box">
    <form action="add-collection_udb.php" method="post" onsubmit="return coll_added()" enctype="multipart/form-data" style="padding: 40px 374px;">
                
                <label for="name"><b>Collection Title <div class="star">*</div></b></label>
                <input type="text" name="colltitle" placeholder="to be displayed on website" required><br><br>

                <label for="name"><b>Collection Name <div class="star">*</div></b></label>
                <input type="text" name="collname" required><br><br>
                
                <label for="image"><b>Collection Image </b><div class="star">*</div></label>
                <input type="file" name="collimage"><br><br>

                <label for="name"><b>Description</b></label>
                <textarea style="width: 98%;
                padding: 10px;
                margin: 0px 0 0px 0;
                display: inline-block;
                border: 1px solid black;
                background: #f1f1f1;" type="text" name="colldescr" placeholder="Collection Description" rows="5" cols="50"></textarea><br><br>

                <label for="name"><b>Meta Tags</b></label>
                <textarea style="width: 98%;
                padding: 10px;
                margin: 0px 0 0px 0;
                display: inline-block;
                border: 1px solid black;
                background: #f1f1f1;" type="text" name="collmetatags" placeholder="seperated by ',' " rows="5" cols="50"></textarea><br><br>

                <button class="submitbtn" type="submit">Submit</button>
            </form> 
    </div>
</div>

    <script>
        function coll_added(){
            alert("Collection added successfully");
        }
    </script>
</body>
</html>