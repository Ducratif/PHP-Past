<?php
require '../db.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    $new_content = $data['new_content'];

    $sql = "UPDATE texts SET content='$new_content' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['message' => 'Content updated successfully']);
    } else {
        echo json_encode(['error' => 'Error updating content: ' . $conn->error]);
    }
}
?>
