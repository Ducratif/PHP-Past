<?php
require '../db.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    $new_title = $data['new_title'];

    $sql = "UPDATE texts SET title='$new_title' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['message' => 'Title updated successfully']);
    } else {
        echo json_encode(['error' => 'Error updating title: ' . $conn->error]);
    }
}
?>
