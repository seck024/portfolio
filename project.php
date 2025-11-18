<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
        $nom = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $messageContent = "NOM : ".$nom."<br>Email : ".$email."<br>Message : ".$message;

        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        // Chargement du fichier .env
        if (file_exists(__DIR__ . '/.env')) {
            $lines = file(__DIR__ . '/.env');
            foreach ($lines as $line) {
                if (strpos(trim($line), '=') !== false) {
                    list($key, $value) = explode('=', trim($line), 2);
                    $_ENV[$key] = $value;
                }
            }
        }

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV['MAIL_USERNAME'];
            $mail->Password   = $_ENV['MAIL_PASSWORD'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('from@example.com', 'portfolio');
            $mail->addAddress('seckpapaamadou96@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = 'Message de Contact';
            $mail->Body    = $messageContent;
            $mail->AltBody = 'Message en texte brut';

            $mail->send();
            header('Location: index.html?status=success');
            exit;
        } catch (Exception $e) {
            header('Location: index.html?status=error');
            exit;
        }
    } else {
        header('Location: index.html?status=error');
        exit;
    }
} else {
    header('Location: index.html');
    exit;
}
