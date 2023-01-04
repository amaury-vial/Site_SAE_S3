<?php
// PHP STAN 9
require ("bdcon.php");// on require la page pour ce connecter a la bd

$sql = "DELETE FROM QUESTION WHERE Q_ID = :idQues";
$sth = $con->prepare($sql);
$sth->bindValue(':idQues', $_POST["numque"], PDO::PARAM_INT);
$sth -> execute();

$sql = "SELECT * FROM question order by q_id";
$sth = $con->prepare($sql);
$sth -> execute();
$idSave = 0;
while($row = $sth->fetch()){
    if ($idSave+1 != $row['q_id']){
        $sqlModification = "UPDATE Question SET Q_ID = :idQues WHERE Q_ID = :idQuesWhere";
        $sth = $con->prepare($sqlModification);
        $sth->bindValue(':idQues', $idSave+1, PDO::PARAM_INT);
        $sth->bindValue(':idQuesWhere', $row['q_id'], PDO::PARAM_INT);
        $sth -> execute();
    }
    $idSave =  $row['q_id'];
}


header("location: ../PAGES/pageAdmin.php");//redirection vers la page admin
exit;
?>
