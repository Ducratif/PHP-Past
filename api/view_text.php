<?php
require '../db.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM texts WHERE id = $id";
    } elseif(isset($_GET['title'])) {
        $title = $_GET['title'];
        $sql = "SELECT * FROM texts WHERE title = '$title'";
    } else {
        echo json_encode(['error' => 'ID or title not specified']);
        exit();
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $text = $result->fetch_assoc();
        echo json_encode($text);
    } else {
        echo json_encode(['error' => 'No text found with specified ID or title']);
    }
}
?>
