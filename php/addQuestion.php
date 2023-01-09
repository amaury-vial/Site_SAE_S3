<?php
// php STAN 9
require ("bdcon.php");// on require la page pour ce connecter a la bd

//recup des variable du formulaire
$question = str_replace('\'','\'\'',$_POST["question"]);
$reponse = str_replace('\'','\'\'',$_POST["réponse"]);
$indice = str_replace('\'','\'\'',$_POST["Indice"]);
$consigne = str_replace('\'','\'\'',$_POST["Consigne"]);

$sqlClassement = "Select MAX(q_id) FROM QUESTION";// requete pour recuperer le classement
$sth = $con->prepare($sqlClassement);
$sth->execute();
$row = $sth->fetch();
$id = $row["max"] + 1;

//requete pour modifier les questions
$sqlQuestion = "insert into Question (TXT,  TITLE, SUGGESTION, SOLUTION, q_id) values (:consigne, :question, :indice, :reponse, :idQues)";
$sth = $con->prepare($sqlQuestion);
$sth->bindValue(':consigne', $consigne, PDO::PARAM_STR);
$sth->bindValue(':question', $question, PDO::PARAM_STR);
$sth->bindValue(':indice', $indice, PDO::PARAM_STR);
$sth->bindValue(':reponse', $reponse, PDO::PARAM_STR);
$sth->bindValue(':idQues', $id, PDO::PARAM_INT);
$sth -> execute();

header("location: ../pages/admin.php");//redirection vers la page admin
exit;
