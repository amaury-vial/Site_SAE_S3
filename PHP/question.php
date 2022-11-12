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
    $idQues =$_POST["Numéro Question"];
    $question =$_POST["question"];
    $reponse =$_POST["réponse"];
    $indice =$_POST["Indice"];
    $consigne =$_POST["Consigne"];


    $sqlModificationQuestion = "UPDATE Question set TXT='$consigne', TITLE='$question', SUGGESTION='$indice', SOLUTION='$reponse' WHERE $idQues==Q_ID";

    if ($con->query($sqlModificationQuestion) == TRUE) {
        echo "Question mise a jour";
        sleep(10);
        header("location:../HTML/pageAdmin.html");
        exit;
    } else {
        echo "Error: " . $sqlModificationQuestion . "<br>" . $con->error;
    }
        
    $con = null;
}

catch(PDOException $e){
    echo $e->getMessage();
    }
  
?>