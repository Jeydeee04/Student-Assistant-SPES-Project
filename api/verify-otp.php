<?php
session_start();
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$userEnteredOtp = $input['otp'] ?? '';

if (!isset($_SESSION['otp']) || time() > $_SESSION['otp_expires']) {
    echo json_encode(['status' => 'error', 'message' => 'OTP has expired. Please request a new one.']);
    exit;
}

if ($userEnteredOtp == $_SESSION['otp']) {
    echo json_encode(['status' => 'success', 'message' => 'OTP verified successfully!']);

    unset($_SESSION['otp']);
    unset($_SESSION['otp_expires']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid OTP.']);
}
