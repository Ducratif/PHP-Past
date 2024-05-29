<?php
require '../db.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $title = $data['title'];
    $content = $data['content'];

    $sql = "INSERT INTO texts (title, content) VALUES ('$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['message' => 'Text added successfully']);
    } else {
        echo json_encode(['error' => 'Error: ' . $sql . '<br>' . $conn->error]);
    }
}
?>
