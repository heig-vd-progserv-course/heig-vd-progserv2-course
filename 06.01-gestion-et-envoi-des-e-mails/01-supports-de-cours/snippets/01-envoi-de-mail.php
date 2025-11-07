<?php
// Configuration de l'e-mail
$from = "HEIG-VD ProgServ Course <no-reply@heig-vd-progserv-course.ch>";
$to = "ludovic.delafontaine@heig-vd.ch";
$subject = "Test d'envoi d'e-mail";
$body = "Bonjour,

Ceci est un message de test envoyé depuis un script PHP.

Cordialement,
Ludovic Delafontaine";

// Préparation des en-têtes de l'e-mail
$headers = [
    'From' => $from,
    'Reply-To' => $from,
    'Content-Type' => 'text/plain; charset=UTF-8'
];

// Conversion des en-têtes en format string
$headersAsString = '';
foreach ($headers as $key => $value) {
    $headersAsString .= "$key: $value\r\n";
}

// Envoi de l'e-mail
$success = mail($to, $subject, $body, $headersAsString);

if ($success) {
    echo "E-mail envoyé avec succès !";
} else {
    echo "Erreur lors de l'envoi de l'e-mail. Vérifiez la configuration de votre serveur SMTP.";
}
