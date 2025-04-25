<?php
// Importation des classes PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Vérifiez si le formulaire a été soumis via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assurez-vous que les champs nécessaires sont définis
    if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
        $nom = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $messageContent = "NOM : ".$nom."<br>Email : ".$email."<br>Message : ".$message;

        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        // Créer une instance
        $mail = new PHPMailer(true);

        try {
            // Configurations du serveur
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'seck777696931@gmail.com';
            $mail->Password   = 'oxxr loew arkf xyqs';
            $mail->SMTPSecure = ''; // Désactiver SSL/TLS
            $mail->Port       = 587;

            // Destinataire
            $mail->setFrom('from@example.com', 'portfolio');
            $mail->addAddress('seckpapaamadou96@gmail.com');

            // Contenu de l'e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Message de Contact';
            $mail->Body    = $messageContent;
            $mail->AltBody = 'Message en texte brut';

            // Envoyer l'e-mail
            $mail->send();

            // Redirection avec un message de succès
            header('Location: index.html?status=success');
            exit;
        } catch (Exception $e) {
            // Redirection avec un message d'erreur
            header('Location: index.html?status=error');
            exit;
        }
    } else {
        // Si le formulaire n'a pas tous les champs nécessaires
        header('Location: index.html?status=error');
        exit;
    }
} else {
    // Si la requête n'est pas POST, on redirige vers la page d'accueil sans envoyer de mail
    header('Location: index.html');
    exit;
}
