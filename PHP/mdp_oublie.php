<?php

$to = "findthebreach.noreply@gmail.com";
$subject = "Utilisation mail avec php";
$message = "Salut, ça va ";

$headers = "Content-Type: text/plain; charset-utf-8\r\n";
$headers = "From: findthebreach.noreply@gmail.com\r\n";


if (mail($to,$subject,$message,$headers))
    echo 'Envoye ! ';
else
    echo 'Erreur envoi';