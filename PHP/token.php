<?php
require ("bdcon.php");


function nouveauMdp($mdp, $email){

    $sqlNickname = "select nickname from users where email = $email";
    $sth = $con->prepare($sqlNickname);
    $sth -> execute();
    $nickname = $sth -> fetch();
    $nickname = $nickname['nickname'];

    $mdp = hash("sha256", $mdp);
    $sql = "update users where email=$email and nickname=$nickname set password = $mdp";
    $sth = $con->prepare($sql);
    $sth -> execute();
    
}


$mail = $_POST['mail'];
$token = $_POST['token'];

$sql = "select * from recup_mdp where email = '$mail'";
$sth = $con->prepare($sql);
$sth -> execute();

while($row = $sth -> fetch()){
    if($row['token'] == $token){
        if($_POST['mdp'] ==  $_POST['mdpConfirmer']){
            nouveauMdp($_POST['mdp'], $mail);
            header("location: ../index.html");
            exit;
        }else{
            echo('mdp faux');
        }       
    }
}else{
        echo("token invalide");
    }
?>