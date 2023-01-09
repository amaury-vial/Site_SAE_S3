<?php
// php STAN 9

require ("bdcon.php");// on require la page pour ce connecter a la bd 

session_start();

//recupération des variables du formulaire
$pseudo =$_POST["pseudo"];
$password = hash("sha256", $_POST["password"].$pseudo); //hashage du mot de passe avec du sel ( le pseudo )

$check = false; //sert a savoir si l'user est dans la BD
$sqlCheckUser = "SELECT NICKNAME, ID_USER, PASSWORD FROM USERS where NICKNAME = :nickname"; //requete pour recupére les infos de touts les user
$sth = $con->prepare($sqlCheckUser);
$sth->bindValue(':nickname', $pseudo, PDO::PARAM_STR);
$sth -> execute();

$row = $sth -> fetch();

$IdUser = 0;

//on cerifie que l'utilisateur est bien dans la base de donnée

if ($pseudo == $row['nickname'] && $password == $row['password']){
    $check = true;// si l'user existe on met $check a true
    $IdUser = intval($row['id_user']);//on sauvegarde l'id de l'user qui se connecte
    if(isset($_SESSION['err'])){unset($_SESSION['err']);}
    $_SESSION['user'] = true;
} else {
    $_SESSION['err'] = 1;
     header("location:../pages/pageConnection.php");
}



//on regarde si l'utilisateur est est un admin
if($check){
    $checkAdmin = false;
    $sqlIsAdmin = "SELECT ID_USER FROM ADMIN where id_user = :iduser";// on recupere les admins
    $sth = $con->prepare($sqlIsAdmin);
    $sth->bindValue(':iduser', $IdUser, PDO::PARAM_INT);

    $sth -> execute();
    $row = $sth -> fetch();
    //on regarde si il y a l'id de l'user dans la table admin

    if ($IdUser ==  $row['id_user']){
        $checkAdmin = true;
    }


    $_SESSION['admin'] = $checkAdmin;
    if ($checkAdmin){
        header("location: ../pages/pageAdmin.php");// redirection vers la page admin
        exit;
    }else{
        header("location:../index.php");// redirectin vers la page pour telecharger le jeux
        exit; 
    }

}else{
    header("location:../pages/pageConnection.php");
    exit;
}