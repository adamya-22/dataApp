<?php
// Start session to access session variables
session_start();

// Check if the 'check' variable is set, initialize to 0 if not set
if (!isset($_SESSION['check'])) {
    $_SESSION['check'] = 0;
}

$conn = "";

try {
    $servername = "localhost:3306";
    $dbname = "dataapp";
    $username = "root";
    $password = "";

    $conn = new PDO(
        "mysql:host=$servername; dbname=dataapp",
        $username, $password
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM adminlogin");
    $stmt->execute();
    $users = $stmt->fetchAll();

    foreach ($users as $user) {
        if (($user['username'] == $username) && ($user['password'] == $password)) {
            // Update session variable on successful validation
            $_SESSION['check'] = 1;
            header("location: admin_panel.php");
        } else {
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            die();
            // Update session variable on failed validation
            $_SESSION['check'] = 0;
            header("location: index.php");
        }
    }
}
?>
