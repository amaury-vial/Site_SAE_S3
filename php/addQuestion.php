<?php
// php STAN 9
require ("bdcon.php");

$question = str_replace('\'','\'\'',$_POST["question"]);
$answer = str_replace('\'','\'\'',$_POST["réponse"]);
$suggestion = str_replace('\'','\'\'',$_POST["Indice"]);
$instructions = str_replace('\'','\'\'',$_POST["Consigne"]);

$sqlMaxId = "Select MAX(q_id) FROM QUESTION";
$sth = $con->prepare($sqlMaxId);
$sth->execute();
$row = $sth->fetch();
$id = $row["max"] + 1;


$sql = "insert into Question (TXT,  TITLE, SUGGESTION, SOLUTION, q_id) values (:consigne, :question, :indice, :reponse, :idQues)";
$sth = $con->prepare($sql);
$sth->bindValue(':consigne', $instructions, PDO::PARAM_STR);
$sth->bindValue(':question', $question, PDO::PARAM_STR);
$sth->bindValue(':indice', $suggestion, PDO::PARAM_STR);
$sth->bindValue(':reponse', $answer, PDO::PARAM_STR);
$sth->bindValue(':idQues', $id, PDO::PARAM_INT);
$sth -> execute();

header("location: ../pages/admin.php");
exit;
