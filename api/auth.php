<?php
session_start();
require_once '../db.php';
header('Content-Type: application/json');

if (isset($_GET['action']) && $_GET['action'] === 'check') {
    echo json_encode(['authenticated' => isset($_SESSION['user_id'])]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $email = $data['email'];
    $password = $data['password'];

    $stmt = $pdo->prepare("SELECT user_id, password_hash FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['user_id'];
        echo json_encode(['status' => 'success']);
    } else {
        http_response_code(401);
        echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);
    $email = $data['email'] ?? null;
    $newPassword = $data['new_password'] ?? null;

    if ($email && $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("UPDATE users SET password_hash = ? WHERE email = ?");
        $stmt->execute([$hashedPassword, $email]);

        echo json_encode(['status' => 'success', 'message' => 'Password updated']);
    } else {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'New password required']);
    }
}
