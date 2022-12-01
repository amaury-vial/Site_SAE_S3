<?php
require ("bdcon.php");

$mail = $_POST['mail'];
$token = $_POST['token'];

$sql = "select * into recup_mdp where mail = '$mail', token= $token";
$sth = $con->prepare($sql);
$sth -> execute();
$row = $sth -> fetch();

if($row['mail'] == $mail && $row['token'] == $token){
    header("location: ../HTML/recupMotDePasse.html");
    exit;
}else{
    echo("token invalide");
}

?>