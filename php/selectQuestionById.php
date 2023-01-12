<?php

require("bdcon.php");
$id = intval($_GET['idquestion']);
$sql = "Select * FROM question where q_id = :id";
$sth = $con->prepare($sql);
$sth->bindValue(':id', $id, PDO::PARAM_INT);
$sth->execute();
$row = $sth->fetch();
header('Content-Type: application/json');
echo json_encode($row , JSON_FORCE_OBJECT);