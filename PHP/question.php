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

    //recup des variable du formulaire
    $idQues =$_POST["numque"];
    $question =$_POST["question"];
    $reponse =$_POST["réponse"];
    $indice =$_POST["Indice"];
    $consigne =$_POST["Consigne"];

    $sqlModificationQuestion = "UPDATE Question SET TXT='$consigne', TITLE='$question', SUGGESTION='$indice', SOLUTION='$reponse' WHERE Q_ID = $idQues";
    $sth = $con->prepare($sqlModificationQuestion);
    $sth -> execute();

    header("location:pageAdmin.php");
    exit;
     
    $con = null;
}

catch(PDOException $e){
    echo $e->getMessage();
    }
?>