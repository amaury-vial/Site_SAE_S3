<?php
require ("bdcon.php");// on require la page pour ce connecter a la bd 

session_start();

//recupération des variables du formulaire
$pseudo =$_POST["pseudo"];
$password = hash("sha256", $_POST["password"].$pseudo); //hashage du mot de passe avec du sel ( le pseudo )


$sqlCheckUser = "SELECT EMAIL, NICKNAME, ID_USER, PASSWORD FROM USERS"; //requete pour recupére les infos de touts les user

$check = false; //sert a savoir si l'user est dans la BD

//ustilisation de la class PDO pour executer la requete
$sth = $con->prepare($sqlCheckUser);
$sth -> execute();

$IdUser = 0;

//on cerifie que l'utilisateur est bien dans la base de donnée
while($row = $sth -> fetch()) {
    if ($pseudo == $row['nickname'] && $password == $row['password']){// on verifie que le pseudo correspond au mot de passe
        $check = true;// si l'user existe on met $check a true
        $IdUser = $row['id_user'];//on sauvegarde l'id de l'user qui se connecte
        break;
    }
}
$_SESSION['user'] = $check;
//on regarde si l'utilisateur est est un admin
if($check){

    $checkAdmin = false;
    $sqlIsAdmin = "SELECT ID_USER FROM ADMIN";// on recupere les admins
    $sth = $con->prepare($sqlIsAdmin);
    $sth -> execute();

    //on regarde si il y a l'id de l'user dans la table admin
    while($row = $sth -> fetch()) {
        if ($IdUser ==  $row['id_user']){
            $checkAdmin = true;
            break;
        }
    }

    $_SESSION['admin'] = $checkAdmin;
    if ($checkAdmin){
        header("location: ../PAGES/pageAdmin.php");// redirection vers la page admin
        exit;
    }else{
        header("location:../index.php");// redirectin vers la page pour telecharger le jeux
        exit; 
    }

}else{
    header("location:../PAGES/pageConnection.php");
    exit;
}
?>