<?php
$firstName = htmlspecialchars($_POST['Firstname']);
$lastName = htmlspecialchars($_POST['Lastname']);
$email = filter_var($_POST['E-Mail'], FILTER_SANITIZE_EMAIL);
$phone = htmlspecialchars($_POST['Phone']);
$message = htmlspecialchars($_POST['Message']);
$fullName = $firstName . ' ' . $lastName;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'Burichan523@gmail.com';               // SMTP username
    $mail->Password   = 'ibmwfwasjfijtoox';                        // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $fullName);
    $mail->addAddress('Burichan523@gmail.com', 'Recipient');    // Add a recipient
    $mail->addReplyTo($email, $fullName); 
    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'Inquiries';
    $mail->Body    = "Name: $fullName<br>Phone: $phone<br><br>$message";


    $mail->send();
    header("Location: emailSent/");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
