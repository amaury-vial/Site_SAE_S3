<?php

// php STAN 9
date_default_timezone_set('Europe/Paris');


$host = "lucky.db.elephantsql.com";
$user = "xpirrwid";
$password = "LkhxflJA_GDQQI_nqpkJBIbFBc955fiL";
$db = "xpirrwid";

try {

    $con = new PDO("pgsql:host=$host; port=5432; dbname=$db; user=$user; password=$password")
    or die ("Could not connect to server\n");
}

catch(PDOException $e){
    echo $e->getMessage();
}
