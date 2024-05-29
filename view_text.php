<?php
require 'db.php';

if(isset($_GET['id'])) {
    $text_id = $_GET['id'];

    // Récupérer le texte spécifique en fonction de l'ID
    $sql = "SELECT * FROM texts WHERE id = $text_id";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $text = $result->fetch_assoc();
    } else {
        echo "Aucun texte trouvé avec cet identifiant.";
        exit();
    }
} else {
    echo "Identifiant de texte non spécifié.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $text['title']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $text['title']; ?></h1>
        <p><?php echo $text['content']; ?></p>
        <a href="list_texts.php">Retour à la liste des textes</a>
    </div>
</body>
</html>
