<?php
// php STAN 9


//Function that creates a new password
function newPassword(String $mdp, String $email): void{

    //Including the database connection file
    require ("bdcon.php");

    //Retrieving the username for the salt
    $sqlNickname = "select nickname from users where email = :email";
    $sth = $con->prepare($sqlNickname);
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth -> execute();
    $row = $sth -> fetch();

    $nickname = $row['nickname'];

    //Hashing the password with the retrieved salt
    $mdp = hash("sha256", $mdp.$nickname);

    //Updating the password in the database
    $sql = "update users set password = :mdp where email = :email and nickname = :nickname ";
    $sth->bindValue(':mdp', $mdp, PDO::PARAM_STR);
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->bindValue(':nickname', $nickname, PDO::PARAM_STR);
    $sth = $con->prepare($sql);
    $sth -> execute();

    //Deleting the token
    deleteToken($email);
}

//Function that deletes the token
function deleteToken(String $email): void{

    //Including the database connection file
    require ("bdcon.php");

    //Deleting all the generated tokens for the associated email address
    $sql = "DELETE FROM recup_mdp WHERE email= :email";
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
$sql = "select token from recup_mdp where  email= :email";
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
            newPassword($_POST['password'], $mail);
        }else{
            //Redirecting to the change password page if the two passwords don't match
            header("location:../pages/recuperation-mot-de-passe.php");
            exit;
        }

    }
}

//Redirecting to the change password page if the token is wrong
header("location:../php/recuperation-mot-de-passe.php");
exit;
