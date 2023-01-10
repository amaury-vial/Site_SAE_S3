<?php
// php STAN 9
// Require the database connection
require ("bdcon.php");

// Get the user's nickname, email and password from the POST data
$nickname = $_POST["nickname"];
$mail = $_POST["mail"];
$password = hash("sha256", $_POST["password"].$nickname);

// Create a query to check if there is already a user with the same nickname or email
$sqlCheckUser = "SELECT EMAIL, NICKNAME, ID_USER FROM USERS WHERE nickname = :nom";
$sth = $con->prepare($sqlCheckUser);
$sth -> bindValue(':nom', $nickname, PDO::PARAM_STR);
$sth -> execute();
$row = $sth -> fetch();
$check = true;

// Check if the nickname or email already exist
if ( isset($row) && ($nickname == $row['nickname'] || $mail == $row['email'])){
    $check = false;
}

// Create a query to get the highest ID from the USERS table
$sql = "SELECT MAX(ID_USER) FROM USERS";
$sth = $con->prepare($sql);
$sth -> execute();
$row = $sth -> fetch();

// Set the new id to the highest + 1
$id = $row['max'] + 1;

// If the user doesn't already exist
if($check){

    // Create a query to insert the new user in the USERS table
    $sqlNewUser = "INSERT INTO USERS (ID_USER, EMAIL, NICKNAME, PASSWORD)
        VALUES (:id, :mail, :nickname, :password)";
    $sth = $con->prepare($sqlNewUser);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
    $sth->bindValue(':nickname', $nickname, PDO::PARAM_STR);
    $sth->bindValue(':password', $password, PDO::PARAM_STR);
    $sth->execute();

    // Start the session and set the user to true
    session_start();
    $_SESSION['user'] = true;

    // Redirect the user to the homepage
    header("location: ../index.php");
    exit;
}
// If the user already exists, redirect him to the connection page
header("location: ../pages/connection.php");
exit;