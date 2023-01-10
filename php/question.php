<?php
// php STAN 9
//require the connection to the database "bdcon.php"
require ("bdcon.php");
//require the function to check if the user is an admin "isAdmin.php"
require("isAdmin.php");

//store the value of the question number in a variable and replace single quotes by two single quotes
$idQuestion = str_replace('\'','\'\'',$_POST["numQuestion"]);
//store the value of the question in a variable and replace single quotes by two single quotes
$question = str_replace('\'','\'\'',$_POST["question"]);
//store the value of the answer in a variable and replace single quotes by two single quotes
$answer = str_replace('\'','\'\'',$_POST["réponse"]);
//store the value of the suggestion in a variable and replace single quotes by two single quotes
$suggestion = str_replace('\'','\'\'',$_POST["Indice"]);
//store the value of the instructions in a variable and replace single quotes by two single quotes
$instructions = str_replace('\'','\'\'',$_POST["Consigne"]);

//prepare the sql statement to update the question with the new values
$sql = "UPDATE Question SET TXT= :consigne , TITLE= :question , SUGGESTION= :indice, SOLUTION= :reponse WHERE Q_ID = :idQues";
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
    
