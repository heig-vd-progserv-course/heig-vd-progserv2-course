<?php
require_once __DIR__ . '/../src/utils/autoloader.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

const MAIL_CONFIGURATION_FILE = __DIR__ . '/../src/config/mail.ini';

$config = parse_ini_file(MAIL_CONFIGURATION_FILE, true);

if (!$config) {
    throw new Exception("Erreur lors de la lecture du fichier de configuration : " .
        MAIL_CONFIGURATION_FILE);
}

$host = $config['host'];
$port = filter_var($config['port'], FILTER_VALIDATE_INT);
$authentication = filter_var($config['authentication'], FILTER_VALIDATE_BOOLEAN);
$username = $config['username'];
$password = $config['password'];
$from_email = $config['from_email'];
$from_name = $config['from_name'];

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = $host;
    $mail->Port = $port;
    $mail->SMTPAuth = $authentication;
    if ($authentication) {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Username = $username;
        $mail->Password = $password;
    }
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "base64";

    // Expéditeur et destinataire
    $mail->setFrom($from_email, $from_name);
    $mail->addAddress('CHANGE_ME', 'CHANGE WITH YOUR NAME');

    // Contenu du mail
    $mail->isHTML(true);
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
