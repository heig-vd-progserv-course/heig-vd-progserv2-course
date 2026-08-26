<?php
$from = "no-reply@example.com";
$to = "ludovic.delafontaine@heig-vd.ch";
$subject = "Test d'envoi d'e-mail";
$body = "Ceci est un test d'envoi d'e-mail en PHP.";

$headers = "From: $from";

mail($to, $subject, $body, $headers);
