<?php
// php STAN 9
require("isAdmin.php");

require '../phpmailer/includes/Exception.php';
require '../phpmailer/includes/SMTP.php';
require '../phpmailer/includes/PHPMailer.php';
require 'bdcon.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$mailDestination = $_POST["mail"];
$listNames = $_POST["nom"];
$listNames = explode(", ", $listNames);

$mailBody = "LISTE DES SCORE :";

foreach ($listNames as $name){
    $sql = "SELECT nickname, score FROM users WHERE nickname = :nom";
    $sth = $con->prepare($sql);
    $sth->bindValue(':nom', $name, PDO::PARAM_STR);
    $sth -> execute();
    $row = $sth -> fetch();
    $mailBody = $mailBody . $row['nickname'] . " : " . strval($row['score']) . " --- ";
}

// On crée uns instance de PHPMailer
$mail = new PHPMailer();

// Encodage UTF-8 pour les accents...
$mail->CharSet = 'UTF-8';

// On utilise le serveur mail SMTP
$mail->isSMTP();

// On définit l'hôte smtp (dans notre cas GMAIL)
$mail->Host = "smtp.gmail.com";

// On active l'authentification SMTP
$mail->SMTPAuth = true;

// On utilise l'encryptage de type tls (Transport Layer Security)
$mail->SMTPSecure = "tls";

// On se connecte sur le port 587 qui est un port sécurité
$mail->Port = "587";

// On donne l'utilisateur à savoir le login du compte GMAIL
$mail->Username = "findthebreach.noreply@gmail.com";

// On donne le mot de passe qui à été généré dans la partie sécurité du compte GMAIL
$mail->Password = "bpghsngrhhjqnznl";

// Le sujet de l'email
$mail->Subject = "Liste des scores";

// La personne qui envoie l'email
$mail->setFrom("findthebreach.noreply@gmail.com");

// On active le format pages (On peu utiliser la synthaxe pages a savoir les balises dans le corps du mail et celui-ci sera reconnu)
$mail->isHTML(true);

// Le corps du mail a savoir le token qui est généré aléatoirement
$mail->Body = $mailBody;

// On ajoute l'adresse mail du destinataire
$mail->addAddress($mailDestination);

if ( $mail->send() ) {
    header("location:../pages/admin.php");
    exit;
}else {
    header("location:../pages/admin.php");
    exit;
}

// On ferme la connexion SMTP au compte GMAIL
$mail->smtpClose();
