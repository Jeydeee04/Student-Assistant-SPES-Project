<?php
session_start();
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $userEmail = $input['email'] ?? null;

    if ($userEmail) {
        try {
            if (sendOTP($userEmail)) {
                echo json_encode(['status' => 'success', 'message' => 'OTP sent to your email']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to send email']);
            }
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => 'Failed to send email: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email address ' . $userEmail]);
    }
}

function sendOTP(string $userEmail)
{
    $email = $_ENV['EMAIL'];
    $pass = $_ENV['APP_PASS'];

    $otp = rand(100000, 999999);

    $_SESSION['otp'] = $otp;
    $_SESSION['otp_expires'] = time() + (5 * 60);
    $_SESSION['user_email'] = $userEmail;
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $email;
    $mail->Password   = $pass;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->setFrom($email, 'Department of Agrarian Reform - Region IV-B');

    $mail->addAddress($userEmail);
    $mail->Subject = 'Your OTP Verification Code';
    $mail->Body    = "Your One Time Password (OTP) is: $otp. It expires in 5 minutes.";

    return $mail->send();
}
