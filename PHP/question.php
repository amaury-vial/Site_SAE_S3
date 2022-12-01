<?php

require ("bdcon.php");// on require la page pour ce connecter a la bd 

//recup des variable du formulaire
$idQues =$_POST["numque"];
$question =$_POST["question"];
$reponse =$_POST["réponse"];
$indice =$_POST["Indice"];
$consigne =$_POST["Consigne"];

//requete pour modifier les questions 
$sqlModificationQuestion = "UPDATE Question SET TXT='$consigne', TITLE='$question', SUGGESTION='$indice', SOLUTION='$reponse' WHERE Q_ID = $idQues";
$sth = $con->prepare($sqlModificationQuestion);
$sth -> execute();

header("location:pageAdmin.php");//redirection vers la page admin
exit;
    
?>