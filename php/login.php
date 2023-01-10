<?php
// php STAN 9

require ("bdcon.php");

session_start();

$nickname =$_POST["nickname"];
$password = hash("sha256", $_POST["password"].$nickname);

$check = false;
$sqlCheckUser = "SELECT NICKNAME, ID_USER, PASSWORD FROM USERS where NICKNAME = :nickname";
$sth = $con->prepare($sqlCheckUser);
$sth->bindValue(':nickname', $nickname, PDO::PARAM_STR);
$sth -> execute();
$row = $sth -> fetch();

$idUser = 0;
if ($nickname == $row['nickname'] && $password == $row['password']){

    $check = true;
    $idUser = intval($row['id_user']);

        if(isset($_SESSION['err'])){
            unset($_SESSION['err']);
        }

    $_SESSION['user'] = true;

} else {

    $_SESSION['err'] = 1;
     header("location:../pages/connection.php");

}

if($check){

    $checkAdmin = false;

    $sqlIsAdmin = "SELECT ID_USER FROM ADMIN where id_user = :iduser";
    $sth = $con->prepare($sqlIsAdmin);
    $sth->bindValue(':iduser', $idUser, PDO::PARAM_INT);
    $sth -> execute();
    $row = $sth -> fetch();

    if ($idUser ==  $row['id_user']){
        $checkAdmin = true;
    }

    $_SESSION['admin'] = $checkAdmin;

    if ($checkAdmin){
        header("location: ../pages/admin.php");
        exit;
    }else{
        header("location:../index.php");
        exit; 
    }

}else{
    header("location:../pages/connection.php");
    exit;
}