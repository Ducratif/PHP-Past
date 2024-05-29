<?php
require 'db.php';
session_start();

if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_pin']) && isset($_POST['password'])) {
    $new_pin = $_POST['new_pin'];
    $password = $_POST['password'];

    // Retrieve user data
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    // Verify password
    if (password_verify($password, $user['password'])) {
        // Update PIN
        $sql = "UPDATE users SET pin='$new_pin' WHERE username='$username'";
        if ($conn->query($sql) === TRUE) {
            $message = "PIN updated successfully!";
        } else {
            $message = "Error updating PIN: " . $conn->error;
        }
    } else {
        $message = "Incorrect password. Please try again.";
    }
}

// Retrieve updated user data
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($user['username']); ?></h1>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        <p><a href="download.php">Download Files</a></p>
        <h2>Change PIN</h2>
        <form action="user.php" method="post">
            <label for="new_pin">New PIN:</label>
            <input type="text" id="new_pin" name="new_pin" required maxlength="4">
            <label for="password">Confirm with Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Change PIN">
        </form>
        <?php
        if (isset($message)) {
            echo "<p>$message</p>";
        }
        ?>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
