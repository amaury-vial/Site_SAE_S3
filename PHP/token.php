<?php
date_default_timezone_set('Europe/Paris');


$host = "lucky.db.elephantsql.com";
$user = "xpirrwid";
$pass = "LkhxflJA_GDQQI_nqpkJBIbFBc955fiL";
$db = "xpirrwid";


try {
    
    //connection a la base de donnée
    $con = new PDO("pgsql:host=$host; port=5432; dbname=$db; user=$user; password=$pass")
    or die ("Could not connect to server\n");

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
        echo("token invalide")
    }
     
    $con = null;
}

catch(PDOException $e){
    echo $e->getMessage();
}

?>