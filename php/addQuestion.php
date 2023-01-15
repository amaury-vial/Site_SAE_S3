<?php
// php STAN 9
// Require the database connection and isAdmin functions
require ("bdcon.php");
require("isAdmin.php");

$question = str_replace('\'','\'',$_POST["question"]);
$answer = str_replace('\'','\'',$_POST["réponse"]);
$suggestion = str_replace('\'','\'',$_POST["Indice"]);
$instructions = str_replace('\'','\'',$_POST["Consigne"]);

// Get the maximum question id
$sqlMaxId = "Select MAX(q_id) FROM QUESTION";
$sth = $con->prepare($sqlMaxId);
$sth->execute();
$row = $sth->fetch();
$id = $row["max"] + 1;

// Insert the new question with the incremented id
$sql = "insert into Question (TXT,  TITLE, SUGGESTION, SOLUTION, q_id) values (:consigne, :question, :indice, :reponse, :idQues)";
$sth = $con->prepare($sql);
$sth->bindValue(':consigne', $instructions, PDO::PARAM_STR);
$sth->bindValue(':question', $question, PDO::PARAM_STR);
$sth->bindValue(':indice', $suggestion, PDO::PARAM_STR);
$sth->bindValue(':reponse', $answer, PDO::PARAM_STR);
$sth->bindValue(':idQues', $id, PDO::PARAM_INT);
$sth -> execute();

// Redirect to the admin page
header("location: ../pages/admin.php");
exit;
