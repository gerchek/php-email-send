<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the required POST parameters are set
    if (isset($_POST['recipient_email']) && isset($_POST['password'])) {
        $recipientEmail = $_POST['recipient_email'];
	$password = $_POST['password'];
//        $subject = $_POST['subject'];
//        $message = $_POST['message'];

        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'username@gmail.com';
	    $mail->Password = 'avri dply amou peio';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('username@gmail.com', 'Admin');
            $mail->addAddress($recipientEmail, 'Recipient');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'subject';
            $mail->Body = 'Your new password - '.$password;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    } else {
        echo 'Missing required POST parameters.';
    }
} else {
    echo 'This script only accepts POST requests.';
}
?>
