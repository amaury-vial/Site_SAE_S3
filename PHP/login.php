<?php

date_default_timezone_set('Europe/Paris');

$host = "lucky.db.elephantsql.com";
$user = "xpirrwid";
$pass = "LkhxflJA_GDQQI_nqpkJBIbFBc955fiL";
$db = "xpirrwid";


try {
    
    //connection a la base de donnée
    $con = new PDO("pgsql:host=$host; port=5432; dbname=$db; user=$user; password=$pass")
    or die ("Could not connect to server\n");

    //recup des variable du formulaire
    $pseudo =$_POST["pseudo"];
    $adr =$_POST["adr"];
    $password =$_POST["password"];

    //requete sql pour vérifier si le info de l'utilisteur existe
    $sqlCheckUser = "SELECT EMAIL, NICKNAME, ID_USER, PASSWORD FROM USERS";
    $check = false;
    $IdUser = 0;

    // On utilise les fonction prepra et execute de la class PDO pour eviter les injection sql 
    $sth = $con->prepare($sqlCheckUser);
    $sth -> execute();

    //On verifie qu'il est bien dans la base de donnée
    while  ($row = $sth->fetch()) {  
        if ($pseudo == $row['nickname'] && $adr == $row['email'] && $password == $row['password']){
            $check = true;
            $IdUser = $row['id_user'];
        }
    }

    // si il exite ...
    if($check == true){

        //on check si c'est un admin
        $checkAdmin = false;
        $sqlIsAdmin = "SELECT ID_USER FROM ADMIN";
        $sth = $con->prepare($sqlIsAdmin);
        $sth -> execute();

        while  ($row = $sth->fetch()) {    
            if ($IdUser ==  $row['id_user']){
                $checkAdmin = true;
            }
        }

        // en fooncyion si c'est un admin ou pas on le redirige vers une page
        if (true == $checkAdmin){
            header("location:pageAdmin.php");
            exit;
        }
        else{
            header("location:../HTML/pageDl.html");
            exit;
        }

    }else{
        header("location:../index.html");
        exit;
    }
        
   
    $con = null;
}

catch(PDOException $e){
    echo $e->getMessage();
    }
  
?>