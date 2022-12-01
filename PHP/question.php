<?php

require ("bdcon.php");

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
    
?>