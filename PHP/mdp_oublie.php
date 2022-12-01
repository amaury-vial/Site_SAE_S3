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

$token = rand(1000, 9999);
$mail_dest = $_POST["mail"];

//recup des variable du formulaire
$sql = "insert into recup_mdp values ($token, '$mail_dest')";
$sth = $con->prepare($sql);
$sth -> execute();

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

//Email body
$mail->Body = "Token : ".strval($token);
//Add recipient

$mail->addAddress($mail_dest);
//Finally send email
if ( $mail->send() ) {
echo "Envoyé !";
}else{
echo "Problème d'envoie";
}
//Closing smtp connection
$mail->smtpClose();
header("location: ../HTML/pageTokenMdp.html");
exit;


?>