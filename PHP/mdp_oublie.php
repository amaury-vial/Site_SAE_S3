<?php
// PHP STAN 9
// On inclus les fichiers du répertoire PHPMAILER pour les utiliser affin d'envoyer des mails 
require '../phpmailer/includes/Exception.php';
require '../phpmailer/includes/SMTP.php';
require '../phpmailer/includes/PHPMailer.php';
require 'bdcon.php';

// On définit nom des espaces 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// On génère un nombre aléatoire a 4 chiffres 
$token = rand(1000, 9999);
// Le mail est envoyé a $_POST["mail"] qui récupère le mail inscrit dans le champ qui se trouve dans la page du mot de passe oublié
$mail_dest = $_POST["mail"];

//recup des variable du formulaire
$sql = "insert into recup_mdp values ($token, '$mail_dest')";
$sth = $con->prepare($sql);
$sth -> execute();


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
$mail->Subject = "Récupération de mot de passe FindTheBreach ";

// La personne qui envoie l'email 
$mail->setFrom("findthebreach.noreply@gmail.com");

// On active le format PAGES (On peu utiliser la synthaxe PAGES a savoir les balises dans le corps du mail et celui-ci sera reconnu)
$mail->isHTML(true);

// Le corps du mail a savoir le token qui est généré aléatoirement 
$mail->Body = "Votre Token de récupération :\n ".strval($token);


// On ajoute l'adresse mail du destinataire
$mail->addAddress($mail_dest);

// Enfin on envoie le mail
if ( $mail->send() ) {
    // Si aucun problème n'est rencontré on va a la page du Token
    header("location: ../PAGES/pageTokenMdp.php");
    exit;
}else{
    // Sinon on va à la page du mot de passe oublié
    header("location: ../PAGES/motDePasseOublie.php");
}

// On ferme la connexion SMTP au compte GMAIL
$mail->smtpClose();

?>