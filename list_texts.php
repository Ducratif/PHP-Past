<?php
require 'db.php';

$sql = "SELECT * FROM texts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Texts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>List of Texts</h1>
        <ul>
            <?php while($row = $result->fetch_assoc()): ?>
                <li><a href="view_text.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>
