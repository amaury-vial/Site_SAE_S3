<?php
// PHP STAN 9
// Require the bdcon and isAdmin files
require ("bdcon.php");
require("isAdmin.php");

// Create a SQL query to delete the question with the ID given by the POST
$sql = "DELETE FROM QUESTION WHERE Q_ID = :idQues";
$sth = $con->prepare($sql);
$sth->bindValue(':idQues', $_POST["numQuestion"], PDO::PARAM_INT);
$sth -> execute();

// Create a SQL query to get all questions with an ID greater than the one given by the POST
$sql = "SELECT Q_ID FROM question WHERE Q_ID > :idQues order by q_id";
$sth = $con->prepare($sql);
$sth->bindValue(':idQues', $_POST["numQuestion"], PDO::PARAM_INT);
$sth -> execute();

// Create a new ID from the POST given
$newid = intval($_POST["numQuestion"]);

// Fetch all questions with an ID greater than the one given by the POST
while($row = $sth->fetch()){

    // Create a SQL query to modify the ID of the questions
    $sqlModification = "UPDATE Question SET Q_ID = :idQues WHERE Q_ID = :idQuesWhere";
    $sth2 = $con->prepare($sqlModification);
    $sth2->bindValue(':idQues', $newid, PDO::PARAM_INT);
    $sth2->bindValue(':idQuesWhere', intval($row['q_id']), PDO::PARAM_INT);
    $sth2 -> execute();

    // Increment the new ID
    ++$newid;
}

// Redirect to the admin page
header("location: ../pages/admin.php");
exit;
