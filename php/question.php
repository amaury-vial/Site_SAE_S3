<?php
// php STAN 9
require ("bdcon.php");


$idQuestion = str_replace('\'','\'\'',$_POST["numQuestion"]);
$question = str_replace('\'','\'\'',$_POST["question"]);
$answer = str_replace('\'','\'\'',$_POST["réponse"]);
$suggestion = str_replace('\'','\'\'',$_POST["Indice"]);
$instructions = str_replace('\'','\'\'',$_POST["Consigne"]);


$sql = "UPDATE Question SET TXT= :consigne , TITLE= :question , SUGGESTION= :indice, SOLUTION= :reponse WHERE Q_ID = :idQues";
$sth = $con->prepare($sql);
$sth->bindValue(':consigne', $instructions, PDO::PARAM_STR);
$sth->bindValue(':question', $question, PDO::PARAM_STR);
$sth->bindValue(':indice', $suggestion, PDO::PARAM_STR);
$sth->bindValue(':reponse', $answer, PDO::PARAM_STR);
$sth->bindValue(':idQues', $idQuestion, PDO::PARAM_INT);
$sth -> execute();

header("location: ../pages/admin.php");
exit;
    
