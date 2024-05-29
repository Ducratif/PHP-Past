<?php
require 'db.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pin = $_POST['pin'];
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if ($user['pin'] === $pin) {
        $_SESSION['authenticated'] = true;
        header("Location: user.php");
    } else {
        echo "Invalid PIN";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter PIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Enter PIN</h1>
        <form action="pin.php" method="post">
            <label for="pin">PIN:</label>
            <input type="text" id="pin" name="pin" required maxlength="4">
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
