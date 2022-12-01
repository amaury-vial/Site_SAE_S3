<?php

//Include required PHPMailer files
require '../phpmailer/includes/Exception.php';
require '../phpmailer/includes/SMTP.php';
require '../phpmailer/includes/PHPMailer.php';
require ("bdcon.php");
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create instance of PHPMailer
$mail = new PHPMailer();
//Set mailer to use smtp
$mail->isSMTP();
//Define smtp host
$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
$mail->SMTPSecure = "tls";
//Port to connect smtp
$mail->Port = "587";
//Set gmail username
$mail->Username = "findthebreach.noreply@gmail.com";
//Set gmail password
$mail->Password = "bpghsngrhhjqnznl";
//Email subject
$mail->Subject = "Test email using PHPMailer";
//Set sender email
$mail->setFrom("findthebreach.noreply@gmail.com");
//Enable HTML
$mail->isHTML(true);

$token = rand(1000, 9999);

//recup des variable du formulaire

$mail2 = $_POST["mail"];
$sqlModificationQuestion = "insert into recup_mdp values ($token, $mail2)";
$sth = $con->prepare($sqlModificationQuestion);
$sth -> execute();


//Email body
$mail->Body = "token".strval($token);
//Add recipient
$mail_dest = $_POST["mail"];
$mail->addAddress($mail_dest);
//Finally send email
if ( $mail->send() ) {
echo "Envoyé !";
}else{
echo "Problème d'envoie";
}
//Closing smtp connection
$mail->smtpClose();
header("location: ../HTML/pageRecupMdp.html");
exit;
?>