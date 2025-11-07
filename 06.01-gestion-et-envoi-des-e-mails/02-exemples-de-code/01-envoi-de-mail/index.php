<?php

/**
 * Exemple d'envoi d'e-mail simple avec la fonction mail() de PHP
 * 
 * IMPORTANT: Pour que cet exemple fonctionne, vous devez avoir un serveur SMTP
 * configuré sur votre système. En développement local, vous pouvez utiliser:
 * - MailHog (recommandé pour le développement)
 * - Mailtrap
 * - Un serveur SMTP local configuré dans php.ini
 */

// Initialiser les variables
$message = '';
$error = '';

// Traiter le formulaire d'envoi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $to = $_POST['to'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $messageBody = $_POST['message'] ?? '';
    $from = $_POST['from'] ?? '';

    // Validation des données
    if (empty($to) || empty($subject) || empty($messageBody) || empty($from)) {
        $error = 'Tous les champs sont obligatoires.';
    } elseif (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
        $error = 'L\'adresse e-mail du destinataire n\'est pas valide.';
    } elseif (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
        $error = 'Votre adresse e-mail n\'est pas valide.';
    } else {
        // Préparer les en-têtes de l'e-mail
        $headers = [
            'From' => $from,
            'Reply-To' => $from,
            'X-Mailer' => 'PHP/' . phpversion(),
            'Content-Type' => 'text/plain; charset=UTF-8'
        ];

        // Convertir les en-têtes en format string
        $headersString = '';
        foreach ($headers as $key => $value) {
            $headersString .= "$key: $value\r\n";
        }

        // Envoyer l'e-mail
        $success = mail($to, $subject, $messageBody, $headersString);

        if ($success) {
            $message = 'E-mail envoyé avec succès !';
        } else {
            $error = 'Erreur lors de l\'envoi de l\'e-mail. Vérifiez la configuration de votre serveur SMTP.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Envoi d'e-mail simple | PHP</title>
</head>

<body>
    <main class="container">
        <h1>Envoi d'e-mail avec PHP</h1>

        <p>Cet exemple démontre l'utilisation de la fonction <code>mail()</code> de PHP pour envoyer des e-mails.</p>

        <?php if ($message): ?>
            <article style="background-color: var(--pico-ins-color);">
                <p><strong>✓ Succès :</strong> <?= htmlspecialchars($message) ?></p>
            </article>
        <?php endif; ?>

        <?php if ($error): ?>
            <article style="background-color: var(--pico-del-color);">
                <p><strong>✗ Erreur :</strong> <?= htmlspecialchars($error) ?></p>
            </article>
        <?php endif; ?>

        <form method="post">
            <label for="from">
                Votre adresse e-mail
                <input type="email" id="from" name="from"
                    value="<?= htmlspecialchars($_POST['from'] ?? '') ?>"
                    placeholder="votre@email.com" required>
            </label>

            <label for="to">
                Destinataire
                <input type="email" id="to" name="to"
                    value="<?= htmlspecialchars($_POST['to'] ?? '') ?>"
                    placeholder="destinataire@email.com" required>
            </label>

            <label for="subject">
                Sujet
                <input type="text" id="subject" name="subject"
                    value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>"
                    placeholder="Sujet de l'e-mail" required>
            </label>

            <label for="message">
                Message
                <textarea id="message" name="message" rows="8"
                    placeholder="Votre message ici..." required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
            </label>

            <button type="submit">Envoyer l'e-mail</button>
        </form>

        <hr>

        <details>
            <summary>Configuration SMTP requise</summary>
            <p>Pour que cet exemple fonctionne, vous devez avoir un serveur SMTP configuré.</p>

            <h4>Options de développement :</h4>
            <ul>
                <li><strong>MailHog</strong> (recommandé) - Serveur SMTP de test qui capture les e-mails
                    <ul>
                        <li>Installation : <code>docker run -d -p 1025:1025 -p 8025:8025 mailhog/mailhog</code></li>
                        <li>Interface web : <a href="http://localhost:8025" target="_blank">http://localhost:8025</a></li>
                        <li>Configuration PHP : SMTP=localhost, smtp_port=1025</li>
                    </ul>
                </li>
                <li><strong>Mailtrap</strong> - Service en ligne pour tester les e-mails
                    <ul>
                        <li>Site : <a href="https://mailtrap.io" target="_blank">https://mailtrap.io</a></li>
                    </ul>
                </li>
            </ul>

            <h4>Configuration php.ini :</h4>
            <pre><code>[mail function]
SMTP = localhost
smtp_port = 1025
sendmail_from = noreply@localhost</code></pre>
        </details>

        <details>
            <summary>Comment fonctionne mail() ?</summary>
            <p>La fonction <code>mail()</code> de PHP permet d'envoyer des e-mails en utilisant le serveur SMTP configuré.</p>

            <h4>Syntaxe :</h4>
            <pre><code>mail(
    string $to,      // Destinataire
    string $subject, // Sujet
    string $message, // Corps du message
    string $headers  // En-têtes optionnels
): bool</code></pre>

            <h4>Exemple de code :</h4>
            <pre><code>&lt;?php
// Définir les paramètres
$to = 'destinataire@example.com';
$subject = 'Test d\'envoi';
$message = 'Ceci est un message de test.';

// Préparer les en-têtes
$headers = "From: expediteur@example.com\r\n";
$headers .= "Reply-To: expediteur@example.com\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Envoyer l'e-mail
$success = mail($to, $subject, $message, $headers);

if ($success) {
    echo "E-mail envoyé !";
} else {
    echo "Erreur lors de l'envoi.";
}
?&gt;</code></pre>
        </details>

        <details>
            <summary>Sécurité et bonnes pratiques</summary>
            <ul>
                <li><strong>Validation des entrées</strong> : Toujours valider et filtrer les adresses e-mail avec <code>filter_var($email, FILTER_VALIDATE_EMAIL)</code></li>
                <li><strong>Protection contre l'injection d'en-têtes</strong> : Ne jamais inclure de données utilisateur non filtrées dans les en-têtes</li>
                <li><strong>Encodage</strong> : Utiliser UTF-8 pour le support des caractères internationaux</li>
                <li><strong>Limite de fréquence</strong> : Implémenter des limites pour éviter les abus</li>
                <li><strong>En production</strong> : Utiliser une bibliothèque comme PHPMailer ou SwiftMailer pour des fonctionnalités avancées (HTML, pièces jointes, authentification SMTP, etc.)</li>
            </ul>
        </details>
    </main>
</body>

</html>
