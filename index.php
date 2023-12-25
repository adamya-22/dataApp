<?php
// Start session to access session variables
session_start();
$check=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <style>
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
            font-size: 30px;
            padding: 40px 0px 0px 0px;
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
            padding: 0 70px 40px 70px;
            /* height: fit-content; */
            height: 72vh;

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
<!-- <?php include("header_admin.php"); ?> -->
<div class="box2">
    <?php echo $check; ?>
            <h2>Admin Login</h2><br>
            <form action="admin_validate.php" method="post" enctype="multipart/form-data" style="padding: 40px 374px;">

                <label for="username"><b>Username <div class="star">*</div></b></label>
                <input type="text" name="username" required><br><br>

                <label for="password"><b>Password <div class="star">*</div></b></label>
                <input type="password" name="password" placeholder="Length must be between 8 to 12 characters" required id="passw" maxlength="12"><br><br>

                <button class="submitbtn" type="submit">Submit</button>
            </form>
        </div>

</body>
</html>