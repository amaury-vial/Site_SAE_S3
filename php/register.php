<?php
// php STAN 9

require ("bdcon.php");


$nickname = $_POST["nickname"];
$mail = $_POST["mail"];
$password = hash("sha256", $_POST["password"].$nickname);

$sqlCheckUser = "SELECT EMAIL, NICKNAME, ID_USER FROM USERS WHERE nickname = :nom";
$sth = $con->prepare($sqlCheckUser);
$sth -> bindValue(':nom', $nickname, PDO::PARAM_STR);
$sth -> execute();
$row = $sth -> fetch();
$check = true;

if ( isset($row) && ($nickname == $row['nickname'] || $mail == $row['email'])){
    $check = false;
}

$sql = "SELECT MAX(ID_USER) FROM USERS";
$sth = $con->prepare($sql);
$sth -> execute();
$row = $sth -> fetch();

$id = $row['max'] + 1;

if($check){

    $sqlNewUser = "INSERT INTO USERS (ID_USER, EMAIL, NICKNAME, PASSWORD)
        VALUES (:id, :mail, :nickname, :password)";
    $sth = $con->prepare($sqlNewUser);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
    $sth->bindValue(':nickname', $nickname, PDO::PARAM_STR);
    $sth->bindValue(':password', $password, PDO::PARAM_STR);
    $sth->execute();

    session_start();
    $_SESSION['user'] = true;

    header("location: ../index.php");
    exit;
}
header("location: ../pages/connection.php");
exit;
