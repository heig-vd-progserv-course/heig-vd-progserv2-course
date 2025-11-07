<?php
require_once __DIR__ . '/../src/utils/autoloader.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

const MAIL_CONFIGURATION_FILE = __DIR__ . '/../src/config/mail.ini';

// Initialise les variables
$error = null;
$success = null;

// Traite le formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validation des données
    if (empty($email) || empty($subject) || empty($message)) {
        $error = 'Tous les champs sont obligatoires.';
    } else {
        // Documentation : https://www.php.net/manual/fr/function.parse-ini-file.php
        $config = parse_ini_file(MAIL_CONFIGURATION_FILE, true);

        if (!$config) {
            throw new Exception("Erreur lors de la lecture du fichier de configuration : " . MAIL_CONFIGURATION_FILE);
        }

        $host = $config['host'];
        $port = filter_var($config['port'], FILTER_VALIDATE_INT);
        $authentication = filter_var($config['authentication'], FILTER_VALIDATE_BOOLEAN);
        $username = $config['username'];
        $password = $config['password'];
        $to_email = $config['to_email'];
        $to_name = $config['to_name'];

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = $host;
            $mail->Port = $port;
            $mail->SMTPAuth = $authentication;
            $mail->Username = $username;
            $mail->Password = $password;
            $mail->CharSet = "UTF-8";
            $mail->Encoding = "base64";

            // Recipients
            $mail->setFrom($email, $name);
            $mail->addAddress($to_email, $to_name);

            // Création du sujet du mail
            $subject = "Nouveau message de contact : {$subject}";

            // Création du corps du mail
            $body = "Vous avez reçu un nouveau message de {$name} <{$email}>.

            Sujet : {$subject}
            Message :
            {$message}";

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            // La fonction `nl2br` permet de conserver les sauts de ligne dans le corps de l'e-mail
            // Documentation : https://www.php.net/manual/fr/function.nl2br.php
            $mail->Body    = nl2br(htmlspecialchars($body));
            $mail->AltBody = htmlspecialchars($body);

            $mail->send();

            $success = "E-mail envoyé avec succès !";
        } catch (Exception $e) {
            $error = "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Formulaire de contact</title>
</head>

<body>
    <main class="container">
        <h1>Formulaire de contact</h1>

        <?php if ($error) { ?>
            <p><strong>Erreur :</strong> <?= htmlspecialchars($error) ?></p>
        <?php } else if ($success) { ?>
            <p><strong>Succès :</strong> <?= htmlspecialchars($success) ?></p>
        <?php } ?>

        <form method="post">
            <label for="name">
                Nom
                <input type="text" id="name" name="name" required autofocus>
            </label>

            <label for="email">
                E-mail
                <input type="email" id="email" name="email" required>
            </label>

            <label for="subject">
                Sujet
                <input type="text" id="subject" name="subject" required>
            </label>

            <label for="message">
                Message
                <textarea id="message" name="message" rows="4" required></textarea>
            </label>

            <button type="submit">Envoyer</button>
        </form>
    </main>
</body>

</html>
