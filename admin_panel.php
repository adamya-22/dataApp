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
    <link rel="stylesheet" href="nbtryCSSexpt.css">
    <title>Admin Panel</title>
    <style>
        .box {
            display: flex;
            text-align: center;
            width: 80vw;
            height: 81vh;
            align-items: center;
            justify-content: space-around;
        }
    </style>
</head>

<body>
    <?php include("header_admin.php"); ?>
    <div style="display: flex;">
        <?php include("sidebar.php"); ?>
        <div class="box">
            <h1>Welcome Admin</h1>
        </div>
        <!-- <form method="post"  class="logout">
            <div><button type="submit" name="logout">Logout</button></div>
        </form> -->
    </div>
</body>

</html>
