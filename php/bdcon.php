<?php

// Set the default timezone to Europe/Paris
date_default_timezone_set('Europe/Paris');

// Initialize the database variables
$host = "lucky.db.elephantsql.com";
$user = "xpirrwid";
$password = "LkhxflJA_GDQQI_nqpkJBIbFBc955fiL";
$db = "xpirrwid";

// Try to connect to the database using PDO
try {
    $con = new PDO("pgsql:host=$host; port=5432; dbname=$db; user=$user; password=$password")
    or die ("Could not connect to server\n");
}

// Catch any connection errors
catch(PDOException $e){
    echo $e->getMessage();
}
