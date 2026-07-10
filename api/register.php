<?php
require_once '../db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $email = $data['email'];
    $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (email, password_hash) VALUES (?, ?)");
    $stmt->execute([$email, $hashedPassword]);
    echo json_encode(['status' => 'success']);
}
