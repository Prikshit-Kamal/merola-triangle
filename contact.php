<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'amangau1991@gmail.com';
        $mail->Password = 'wdsb mnqq ywko vnxn';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('amangau1991@gmail.com', $email); // From Email
        $mail->addAddress('peter@merolatriangle.com');  // To Email

        $mail->Subject = $subject;
        $mail->Body = "From: $name\nEmail: $email\n\n$message";

        $mail->send();
        header("Location: thank-you.html");
        exit;
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>
