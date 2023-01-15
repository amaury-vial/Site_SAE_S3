<?php
// php STAN 9
//require the connection to the database "bdcon.php"
require ("bdcon.php");
//require the function to check if the user is an admin "isAdmin.php"
require("isAdmin.php");

$id = intval($_POST['numQuestion']);
$question = str_replace('\'','\'',$_POST["question"]);
$answer = str_replace('\'','\'',$_POST["reponse"]);
$suggestion = str_replace('\'','\'',$_POST["indice"]);
$instructions = str_replace('\'','\'',$_POST["consigne"]);

//prepare the sql statement to update the question with the new values
$sql = "UPDATE Question SET txt = :consigne, title = :question, suggestion = :indice, solution = :reponse WHERE q_id = :idQues";
//prepare the statement
$sth = $con->prepare($sql);
$sth->bindValue(':consigne', $instructions, PDO::PARAM_STR);
$sth->bindValue(':question', $question, PDO::PARAM_STR);
$sth->bindValue(':indice', $suggestion, PDO::PARAM_STR);
$sth->bindValue(':reponse', $answer, PDO::PARAM_STR);
$sth->bindValue(':idQues', $id, PDO::PARAM_INT);
//execute the update
$sth -> execute();



//redirect the user to the admin page
header("location: ../pages/admin.php");
//stop the code
exit;
    
