<?php
// PHP STAN 9
require ("bdcon.php");// on require la page pour ce connecter a la bd 

//recup des variable du formulaire
$idQues = str_replace('\'','\'\'',$_POST["numque"]);
$question = str_replace('\'','\'\'',$_POST["question"]);
$reponse = str_replace('\'','\'\'',$_POST["réponse"]);
$indice = str_replace('\'','\'\'',$_POST["Indice"]);
$consigne = str_replace('\'','\'\'',$_POST["Consigne"]);


//requete pour modifier les questions 
$sqlModificationQuestion = "UPDATE Question SET TXT= :consigne , TITLE= :question , SUGGESTION= :indice, SOLUTION= :reponse WHERE Q_ID = :idQues";
$sth = $con->prepare($sqlModificationQuestion);
$sth->bindValue(':consigne', $consigne, PDO::PARAM_STR);
$sth->bindValue(':question', $question, PDO::PARAM_STR);
$sth->bindValue(':indice', $indice, PDO::PARAM_STR);
$sth->bindValue(':reponse', $reponse, PDO::PARAM_STR);
$sth->bindValue(':idQues', $idQues, PDO::PARAM_INT);
$sth -> execute();

header("location: ../PAGES/pageAdmin.php");//redirection vers la page admin
exit;
    
