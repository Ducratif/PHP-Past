<?php
require '../db.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $username = $data['username'];
    $email = $data['email'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT);
    $pin = $data['pin'];

    $sql = "INSERT INTO users (username, email, password, pin) VALUES ('$username', '$email', '$password', '$pin')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['message' => 'User registered successfully']);
    } else {
        echo json_encode(['error' => 'Error: ' . $sql . '<br>' . $conn->error]);
    }
}
?>
