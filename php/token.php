<?php
// php STAN 9

require ("bdcon.php");

function newPassword(String $mdp, String $email): void{
    
    require ("bdcon.php");
    
    //recuperation des pseudo pour le sel 
    $sqlNickname = "select nickname from users where email = :email";
    $sth = $con->prepare($sqlNickname);
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth -> execute();
    $row = $sth -> fetch();

    $nickname = $row['nickname'];

    $mdp = hash("sha256", $mdp.$nickname);

    $sql = "update users set password = :mdp where email = :email and nickname = :nickname ";
    $sth->bindValue(':mdp', $mdp, PDO::PARAM_STR);
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->bindValue(':nickname', $nickname, PDO::PARAM_STR);
    $sth = $con->prepare($sql);
    $sth -> execute();
    deleteToken($email);    
}

function deleteToken(String $email): void{
    
    require ("bdcon.php");

    //on supprimer tout les token gener pour l'adresse mail associée
    $sql = "DELETE FROM recup_mdp WHERE email= :email";
    $sth = $con->prepare($sql);
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth -> execute();
    //redirection vers index
    header("location: ../index.php");
    exit;
}


$mail = $_POST['mail'];
$token = $_POST['token'];

//on recuper token 
$sql = "select token from recup_mdp where  email= :email";
$sth = $con->prepare($sql);
$sth->bindValue(':email', $mail, PDO::PARAM_STR);
$sth -> execute();

while($row = $sth -> fetch()){
    if($row['token'] == $token){
        if($_POST['password'] ==  $_POST['passwordConfirm']){
            newPassword($_POST['password'], $mail);
        }else{
            header("location:../pages/recuperation-mot-de-passe.php");
            exit;
        }       
    }
}
header("location:../pages/recuperation-mot-de-passe.php");
exit;
