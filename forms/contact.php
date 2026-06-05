<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $mail->Username = 'das.dishamani.work@gmail.com';
        $mail->Password = 'orsq hvld nydj zmow';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('yourgmail@gmail.com', 'Website Contact Form');

        $mail->addAddress('das.dishamani.work@gmail.com');

        $mail->isHTML(true);

        $mail->Subject = $subject;

        $mail->Body =
        "
        <h3>New Contact Form Submission</h3>

        <p><strong>Name:</strong> {$name}</p>

        <p><strong>Email:</strong> {$email}</p>

        <p><strong>Message:</strong></p>

        <p>{$message}</p>
        ";

        $mail->send();

        echo "OK";

    } catch (Exception $e) {

        http_response_code(500);

        echo "Error";
    }
}
?>