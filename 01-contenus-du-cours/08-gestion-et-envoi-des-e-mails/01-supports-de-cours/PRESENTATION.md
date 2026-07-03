---
marp: true
---

<!--
theme: custom-marp-theme
size: 16:9
paginate: true
author: L. Delafontaine, avec l'aide de GitHub Copilot
title: HEIG-VD ProgServ2 Course - Gestion et envoi des e-mails
description: Gestion et envoi des e-mails pour l'unité d'enseignement ProgServ2 enseigné à la HEIG-VD, Suisse
url: https://heig-vd-progserv-course.github.io/heig-vd-progserv2-course/06.01-gestion-et-envoi-des-e-mails/01-supports-de-cours/index.html
header: "[**Gestion et envoi des e-mails**](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/06.01-gestion-et-envoi-des-e-mails)"
footer: '[**HEIG-VD**](https://heig-vd.ch) - [ProgServ2 2025-2026](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course) - [CC BY-SA 4.0](https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md)'
headingDivider: 6
math: mathjax
-->

# Gestion et envoi des e-mails

<!--
_class: lead
_paginate: false
-->

[Lien vers le cours][cours]

<small>L. Delafontaine, avec l'aide de
[GitHub Copilot](https://github.com/features/copilot).</small>

<small>Ce travail est sous licence [CC BY-SA 4.0][license].</small>

![bg opacity:0.1][illustration-principale]

## _Retrouvez plus de détails dans le support de cours_

<!-- _class: lead -->

_Cette présentation est un résumé du support de cours. Pour plus de détails,
consultez le [support de cours][cours]._

## Objectifs (1/2)

- Décrire les protocoles de messagerie électronique (SMTP, POP3, IMAP).
- Expliquer les différences entre la fonction `mail()` de PHP et les
  bibliothèques tierces pour l'envoi d'e-mails.
- Configurer un environnement local et un environnement de production pour
  l'envoi d'e-mails via SMTP.

![bg right:40%][illustration-objectifs]

## Objectifs (2/2)

- Utiliser la bibliothèque PHPMailer pour envoyer des e-mails en PHP.

**Il s'agit du dernier cours théorique de l'unité d'enseignement _"Programmation
Serveur 2 (ProgServ2)"_.**

![bg right:40%][illustration-objectifs]

## Derrière les mails : SMTP, POP3 et IMAP

- Les e-mails reposent sur plusieurs protocoles de communication.
- Les plus courants sont :
  - SMTP pour l'envoi des e-mails.
  - POP3 pour la réception des e-mails.
  - IMAP pour la gestion des e-mails sur le serveur.

![bg right:40%][illustration-derriere-les-mails-smtp-pop3-imap]

### SMTP (Simple Mail Transfer Protocol)

- Permet d'envoyer des e-mails depuis un client de messagerie vers un serveur de
  messagerie.
- Fonctionne généralement sur le port 25 (non sécurisé), 465 (sécurisé) ou 587
  (sécurisé).
- Permet de transférer les e-mails entre serveurs de messagerie.

![bg right:40%][illustration-derriere-les-mails-smtp-pop3-imap]

### POP3 (Post Office Protocol version 3)

- Permet de récupérer les e-mails depuis un serveur de messagerie vers un client
  de messagerie.
- Fonctionne généralement sur le port 110 (non sécurisé) ou 995 (sécurisé).
- Télécharge les e-mails et les supprime du serveur par défaut.

![bg right:40%][illustration-derriere-les-mails-smtp-pop3-imap]

### IMAP (Internet Message Access Protocol) (1/2)

- Permet de gérer les e-mails directement sur le serveur de messagerie.
- Fonctionne généralement sur le port 143 (non sécurisé) ou 993 (sécurisé).

![bg right:40%][illustration-derriere-les-mails-smtp-pop3-imap]

### IMAP (Internet Message Access Protocol) (2/2)

- Synchronise les e-mails entre le serveur et le client, permettant un accès
  depuis plusieurs appareils.
- Conserve ainsi leur état (lu, non lu, supprimé, etc.) sur tous les appareils.

![bg right:40%][illustration-derriere-les-mails-smtp-pop3-imap]

## Fonctions et librairies pour envoyer des e-mails en PHP

- Pour envoyer des e-mails en PHP, on peut utiliser :
  1. Utiliser la fonction intégrée `mail()` de PHP.
  2. Utiliser une bibliothèque tierce comme
     [PHPMailer](https://github.com/PHPMailer/PHPMailer).

![bg right:40%][illustration-derriere-les-mails-smtp-pop3-imap]

### La fonction `mail()` (1/2)

- Demande un serveur de messagerie local pour envoyer des e-mails.
- Nécessite une configuration manuelle pour fonctionner correctement (complexe).
- Limitée en fonctionnalités (pas de support SMTP, etc.).

![bg right:40%][illustration-derriere-les-mails-smtp-pop3-imap]

### La fonction `mail()` (2/2)

```php
<?php
$from = "no-reply@example.com";
$to = "ludovic.delafontaine@heig-vd.ch";
$subject = "Test d'envoi d'e-mail";
$body = "Ceci est un test d'envoi d'e-mail en PHP.";

$headers = "From: $from";

mail($to, $subject, $body, $headers);
```

### La bibliothèque PHPMailer

- Bibliothèque tierce populaire pour envoyer des e-mails en PHP.
- Supporte SMTP, l'authentification, les pièces jointes, le HTML, etc.
- Plus facile à configurer et à utiliser que la fonction `mail()`.
- Recommandée pour les applications PHP modernes.

![bg right:40%][illustration-derriere-les-mails-smtp-pop3-imap]

## Configurer son environnement pour envoyer des e-mails

- Avant d'envoyer des e-mails, il est nécessaire de configurer son environnement
  :
  1. Production (avec Infomaniak)
  2. Développement (avec Mailpit).

![bg right:40% contain](./images/infomaniak-configuration-adresse-email-4.png)
![bg right:40% contain vertical](./images/mailpit-interface-web.png)

### Configurer son environnement de production

- Nous utilisons déjà Infomaniak pour l'hébergement web et le nom de domaine.
- Nécessaire de commander un service de messagerie.
- Le [support de cours][cours] explique comment faire cela.

![bg right:40% h:75%](./images/infomaniak-configuration-adresse-email-4.png)

### Configuration son environnement de développement

- Préférable d'utiliser un serveur SMTP local pour le développement.
- Permet de tester l'envoi d'e-mails sans envoyer de vrais e-mails.
- Nous utilisons pour cela [Mailpit](https://github.com/axllent/mailpit).
- Le [support de cours][cours] explique comment faire cela.

![bg right:40% h:75%](./images/mailpit-interface-web.png)

## Envoyer des mails en PHP à l'aide de PHPMailer

- Pour envoyer des e-mails en PHP, nous allons utiliser la bibliothèque
  [PHPMailer](https://github.com/PHPMailer/PHPMailer).
- Installation manuelle pour le moment (sans Composer).
- Le [support de cours][cours] explique comment faire cela.

![bg right:40%][illustration-derriere-les-mails-smtp-pop3-imap]

### Télécharger et installer PHPMailer

<div class="two-columns">
<div>

1. Télécharger la dernière version de PHPMailer depuis
   [GitHub](https://github.com/PHPMailer/PHPMailer).
2. Extraire les fichiers de l'archive ZIP.
3. Copier le **contenu** du dossier `src` extrait dans le répertoire de votre
   projet PHP dans le dossier `src/classes/PHPMailer/PHPMailer` (notez le double
   `PHPMailer`).

</div>
<div>

```text
./
├── public/
│   └── index.php
└── src/
    ├── classes/
    │   └── PHPMailer/
    │       └── PHPMailer/
    │           ├── DSNConfigurator.php
    │           ├── Exception.php
    │           ├── OAuth.php
    │           ├── OAuthTokenProvider.php
    │           ├── PHPMailer.php
    │           ├── POP3.php
    │           └── SMTP.php
    └── utils/
        └── autoloader.php
```

</div>
</div>

### Création du fichier de configuration `mail.ini`

- Un fichier de configuration permet de stocker les informations de connexion au
  serveur SMTP.
- Deux environnements :
  1. Développement local (Mailpit)
  2. Production (Infomaniak).

#### Infomaniak (production)

```ini
host = "mail.infomaniak.com"
port = 465
authentication = true
username = "contact@heig-vd-progserv-course.ch"
password = "************"
from_email = "no-reply@heig-vd-progserv-course.ch"
from_name = "HEIG-VD ProgServ Course"
```

![bg right:40%][illustration-derriere-les-mails-smtp-pop3-imap]

#### Mailpit (développement)

```ini
host = "localhost"
port = 1025
authentication = false
username = ""
password = ""
from_email = "no-reply@mailpit.localhost"
from_name = "Mailpit Local SMTP"
```

![bg right:40%][illustration-derriere-les-mails-smtp-pop3-imap]

### Utilisation de PHPMailer pour envoyer des e-mails

```php
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
```

---

```php
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
```

---

```php
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
```

### Tester l'envoi d'e-mails

- Pour tester l'envoi d'e-mails en développement, assurez-vous que Mailpit est
  en cours d'exécution.
- Accédez à la page web qui envoie l'e-mail (par exemple,
  <http://localhost/index.php>).
- Vérifiez que le mail a bien été reçu (interface web de Mailpit en
  développement ou dans votre client mail en production).

![bg right:40%][illustration-derriere-les-mails-smtp-pop3-imap]

## Conclusion (1/2)

- Envoi d'e-mails en PHP nécessite une bonne compréhension des protocoles de
  messagerie.
- La fonction `mail()` est limitée et complexe à configurer.
- PHPMailer est une bibliothèque puissante et facile à utiliser pour envoyer des
  e-mails.

![bg right:40%][illustration-principale]

## Conclusion (2/2)

- Utiliser des environnements distincts pour le développement et la production
  est essentiel pour tester correctement l'envoi d'e-mails.
- Mailpit est un excellent outil pour le développement local.

![bg right:40%][illustration-principale]

## Questions

<!-- _class: lead -->

Est-ce que vous avez des questions ?

## Feedback

Le [formulaire de feedback][feedback] vous **permet de partager votre retour**
sur l'unité d'enseignement _"ProgServ2"_ et sur le projet libre.

Il ne prend **que quelques minutes** et est **anonyme**.

Les résultats seront discutés au prochain cours. **Merci beaucoup !**

[![bg right:40% w:85%][feedback-qr-code]][feedback]

## À vous de jouer !

- (Re)lire le support de cours.
- Explorer les exemples de code.
- Faire les exercices.
- Poser des questions si nécessaire.

➡️ [Lien vers le cours][cours]

**N'hésitez pas à vous entraidez si vous avez des difficultés !**

![bg right:40%][illustration-a-vous-de-jouer]

## Sources

- [Illustration principale][illustration-principale] par
  [Richard Jacobs](https://unsplash.com/@rj2747) sur
  [Unsplash](https://unsplash.com/photos/grayscale-photo-of-elephants-drinking-water-8oenpCXktqQ)
- [Illustration][illustration-objectifs] par
  [Aline de Nadai](https://unsplash.com/@alinedenadai) sur
  [Unsplash](https://unsplash.com/photos/low-angle-view-of-ball-shoots-in-the-ring-j6brni7fpvs)
- [Illustration][illustration-derriere-les-mails-smtp-pop3-imap] par
  [Joanna Kosinska](https://unsplash.com/@joannakosinska) sur
  [Unsplash](https://unsplash.com/photos/envelope-paper-lot-uGcDWKN91Fs)
- [Illustration][illustration-a-vous-de-jouer] par
  [Nikita Kachanovsky](https://unsplash.com/@nkachanovskyyy) sur
  [Unsplash](https://unsplash.com/photos/white-sony-ps4-dualshock-controller-over-persons-palm-FJFPuE1MAOM)

<!-- URLs -->

[cours]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/tree/main/06.01-gestion-et-envoi-des-e-mails
[license]:
	https://github.com/heig-vd-progserv-course/heig-vd-progserv2-course/blob/main/LICENSE.md
[feedback]: https://framaforms.org/progserv2-2025-2026-feedback-1762260178
[feedback-qr-code]:
	https://quickchart.io/qr?format=png&ecLevel=Q&size=400&margin=1&text=https://framaforms.org/progserv2-2025-2026-feedback-1762260178

<!-- Illustrations -->

[illustration-principale]:
	https://images.unsplash.com/photo-1517486430290-35657bdcef51?fit=crop&h=720
[illustration-objectifs]:
	https://images.unsplash.com/photo-1516389573391-5620a0263801?fit=crop&h=720
[illustration-derriere-les-mails-smtp-pop3-imap]:
	https://images.unsplash.com/photo-1526554850534-7c78330d5f90?fit=crop&h=720
[illustration-a-vous-de-jouer]:
	https://images.unsplash.com/photo-1509198397868-475647b2a1e5?fit=crop&h=720
