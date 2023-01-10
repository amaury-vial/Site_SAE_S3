<?php
// php STAN 9
//require a connection to the database
require ("bdcon.php");

//start the session
session_start();

//store user's nickname and password from the form into variables
$nickname =$_POST["nickname"];
$password = hash("sha256", $_POST["password"].$nickname);

//initialize check to false
$check = false;

//query to check if the user is in the database
$sqlCheckUser = "SELECT NICKNAME, ID_USER, PASSWORD FROM USERS where NICKNAME = :nickname";
$sth = $con->prepare($sqlCheckUser);
$sth->bindValue(':nickname', $nickname, PDO::PARAM_STR);
$sth -> execute();
$row = $sth -> fetch();

//store the user's id
$idUser = 0;

//check if the user's nickname and password match the one in the database
if ($nickname == $row['nickname'] && $password == $row['password']){

    //if they do, set check to true and store the user's id
    $check = true;
    $idUser = intval($row['id_user']);

    //if the "err" session is set, unset it
    if(isset($_SESSION['err'])){
        unset($_SESSION['err']);
    }

    //set the user session to true
    $_SESSION['user'] = true;

//if the user's nickname and password don't match, set the err session to 1 and redirect the user to the connection page
} else {

    $_SESSION['err'] = 1;
    header("location:../pages/connection.php");

}

//if the check is true
if($check){

    //set checkAdmin to false
    $checkAdmin = false;

    //query to check if the user is an admin
    $sqlIsAdmin = "SELECT ID_USER FROM ADMIN where id_user = :iduser";
    $sth = $con->prepare($sqlIsAdmin);
    $sth->bindValue(':iduser', $idUser, PDO::PARAM_INT);
    $sth -> execute();
    $row = $sth -> fetch();

    //if the user is an admin set checkAdmin to true
    if ($idUser ==  $row['id_user']){
        $checkAdmin = true;
    }

    //set the admin session to checkAdmin
    $_SESSION['admin'] = $checkAdmin;

    //if the user is an admin, redirect him to the admin page
    if ($checkAdmin){
        header("location: ../pages/admin.php");
        exit;
    }
    //if the user is not an admin, redirect him to the index page
    else{
        header("location:../index.php");
        exit;
    }

//if check is false, redirect the user to the connection page
}else{
    header("location:../pages/connection.php");
    exit;
}