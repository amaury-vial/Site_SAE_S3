<?php

require ("bdcon.php");// on require la page pour ce connecter a la bd 

//recup des variable du formulaire
$idQues = str_replace('\'','\'\'',$_POST["numque"]);
$question = str_replace('\'','\'\'',$_POST["question"]);
$reponse = str_replace('\'','\'\'',$_POST["réponse"]);
$indice = str_replace('\'','\'\'',$_POST["Indice"]);
$consigne = str_replace('\'','\'\'',$_POST["Consigne"]);


//requete pour modifier les questions 
$sqlModificationQuestion = "UPDATE Question SET TXT='$consigne', TITLE='$question', SUGGESTION='$indice', SOLUTION='$reponse' WHERE Q_ID = $idQues";
$sth = $con->prepare($sqlModificationQuestion);
$sth -> execute();

header("location: pageAdmin.php");//redirection vers la page admin
exit;
    
?>