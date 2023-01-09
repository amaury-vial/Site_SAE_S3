<?php

// php STAN 9
date_default_timezone_set('Europe/Paris');

//id pour la connexion a la base de donnée
$host = "lucky.db.elephantsql.com"; //nom host
$user = "xpirrwid"; //nom user
$pass = "LkhxflJA_GDQQI_nqpkJBIbFBc955fiL"; //mot de passe
$db = "xpirrwid"; //nom dp

try {
    //connection a la base de donnée avec la classe PDO
    $con = new PDO("pgsql:host=$host; port=5432; dbname=$db; user=$user; password=$pass")
    or die ("Could not connect to server\n");
}

catch(PDOException $e){
    echo $e->getMessage();
}
