<?php
require '../db.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $username = $data['username'];
    $pin = $data['pin'];
    $password = $data['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $sql = "UPDATE users SET pin='$pin' WHERE username='$username'";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(['message' => 'PIN updated successfully']);
        } else {
            echo json_encode(['error' => 'Error updating PIN: ' . $conn->error]);
        }
    } else {
        echo json_encode(['error' => 'Incorrect password']);
    }
}
?>
