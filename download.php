<?php
session_start();

if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header("Location: login.php");
    exit();
}

$files = array_diff(scandir('uploads'), array('.', '..'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Files</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Download Files</h1>
        <ul class="file-list">
            <?php foreach ($files as $file): ?>
                <li><a href="uploads/<?php echo $file; ?>" download><?php echo $file; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <p><a href="user.php">Back to User Info</a></p>
    </div>
</body>
</html>
