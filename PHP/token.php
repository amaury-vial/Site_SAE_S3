<?php
require ("bdcon.php");

function nouveauMdp($mdp, $email){
    require ("bdcon.php");
    $sqlNickname = "select nickname from users where email = '$email'";
    $sth = $con->prepare($sqlNickname);
    $sth -> execute();
    $nickname = $sth -> fetch();
    $nickname = $nickname['nickname'];

    $mdp = hash("sha256", $mdp.$nickname);
    $sql = "update users set password = '$mdp' where email='$email' and nickname='$nickname'";
    $sth = $con->prepare($sql);
    $sth -> execute();
    supprToken($mail);    
}

function supprToken($email){
    require ("bdcon.php");
    $sql = "DELETE FROM recup_mdp WHERE email='$email'";
    $sth = $con->prepare($sql);
    $sth -> execute();
    header("location: ../index.html");
    exit;
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
            echo('azeazer');
            
        }else{
            echo('mdp faux');
        }       
    }
}

echo("token invalide");
?>