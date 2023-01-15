<?php
// php STAN 9
//require the connection to the database "bdcon.php"
require ("bdcon.php");
//require the function to check if the user is an admin "isAdmin.php"
require("isAdmin.php");

$question = str_replace('\'','\'',$_POST["question"]);
$answer = str_replace('\'','\'',$_POST["réponse"]);
$suggestion = str_replace('\'','\'',$_POST["Indice"]);
$instructions = str_replace('\'','\'',$_POST["Consigne"]);

//prepare the sql statement to update the question with the new values
$sql = "UPDATE Question SET TXT = :consigne , TITLE = :question , SUGGESTION = :indice, SOLUTION = :reponse WHERE Q_ID = :idQues";
//prepare the statement
$sth = $con->prepare($sql);
//bind the values of the variables to the statement
$sth->bindValue(':consigne', $instructions, PDO::PARAM_STR);
$sth->bindValue(':question', $question, PDO::PARAM_STR);
$sth->bindValue(':indice', $suggestion, PDO::PARAM_STR);
$sth->bindValue(':reponse', $answer, PDO::PARAM_STR);
$sth->bindValue(':idQues', $idQuestion, PDO::PARAM_INT);
//execute the update
$sth -> execute();

//redirect the user to the admin page
header("location: ../pages/admin.php");
//stop the code
exit;
    
