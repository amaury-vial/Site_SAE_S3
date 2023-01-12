<?php
// php STAN 9
require("isAdmin.php");

//Function that creates a new password
function newPassword(String $password, String $email, $con): void{

    //Retrieving the username for the salt
    $sqlNickname = "select nickname from users where email = :email";
    $sth = $con->prepare($sqlNickname);
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth -> execute();
    $row = $sth -> fetch();

    $nickname = $row['nickname'];

    //Hashing the password with the retrieved salt
    $password = hash("sha256", $password.$nickname);
    var_dump($password);

    //Updating the password in the database
    $sql = "update users set password = :password where email = :email and nickname = :nickname ";
    $sth = $con->prepare($sql);
    $sth->bindValue(':password', $password, PDO::PARAM_STR);
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->bindValue(':nickname', $nickname, PDO::PARAM_STR);

    $sth -> execute();

    //Deleting the token
    deleteToken($email,$con);
}

//Function that deletes the token
function deleteToken(String $email, $con): void{

    //Deleting all the generated tokens for the associated email address
    $sql = "DELETE FROM RETRIEVE_PASSWORD WHERE email= :email";
    $sth = $con->prepare($sql);
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth -> execute();

    //Redirecting to index
    header("location: ../index.php");
    exit;
}

//Including the database connection file
require ("bdcon.php");

//Retrieving the mail and token from the post request
$mail = $_POST['mail'];
$token = $_POST['token'];

//Retrieving the token from the database
$sql = "select token from RETRIEVE_PASSWORD where  email= :email";
$sth = $con->prepare($sql);
$sth->bindValue(':email', $mail, PDO::PARAM_STR);
$sth -> execute();

//Checking if the token retrieved from the post request is the same as the one in the database
while($row = $sth -> fetch()){

    //If the token is the same
    if($row['token'] == $token){

        //Checking if the two password fields match
        if($_POST['password'] ==  $_POST['passwordConfirm']){
            //Creating the new password
            newPassword($_POST['password'], $mail, $con);
        }else{
            //Redirecting to the change password page if the two passwords don't match
            header("location:../pages/token-mot-de-passe.php");
            exit;
        }
    }
}

//Redirecting to the change password page if the token is wrong
header("location:../pages/token-mot-de-passe.php");
exit;
