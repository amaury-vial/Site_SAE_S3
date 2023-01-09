<?php
// php STAN 9
require ("bdcon.php");// on require la page pour ce connecter a la bd

$sql = "DELETE FROM QUESTION WHERE Q_ID = :idQues";
$sth = $con->prepare($sql);
$sth->bindValue(':idQues', $_POST["numque"], PDO::PARAM_INT);
$sth -> execute();


$sql = "SELECT Q_ID FROM question WHERE Q_ID > :idQues order by q_id";
$sth = $con->prepare($sql);
$sth->bindValue(':idQues', $_POST["numque"], PDO::PARAM_INT);
$sth -> execute();
$newid = intval($_POST["numque"]);
while($row = $sth->fetch()){
    $sqlModification = "UPDATE Question SET Q_ID = :idQues WHERE Q_ID = :idQuesWhere";
    $sth2 = $con->prepare($sqlModification);
    $sth2->bindValue(':idQues', $newid, PDO::PARAM_INT);
    $sth2->bindValue(':idQuesWhere', intval($row['q_id']), PDO::PARAM_INT);
    $sth2 -> execute();
    ++$newid;
}
header("location: ../pages/pageAdmin.php");//redirection vers la page admin
exit;

