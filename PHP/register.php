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

    $sqlCheckUser = "SELECT EMAIL, NICKNAME FROM USERS"; //requete pour recup tout les users
    $check = true;

    foreach  ($con->query($sqlCheckUser) as $row) {    //on check si le user existe deja
        if ($pseudo == $row['nickname'] || $adr == $row['email'] ){
            $check = false;
        }
    }

    //si il n'exite pas on le cree
    if($check == true){
        $sqlNewUser = "INSERT INTO USERS (EMAIL, NICKNAME, PASSWORD)
            VALUES ('$adr', '$pseudo', '$password')";  // requete pour insert le new user

        if ($con->query($sqlNewUser) == TRUE) {
            echo "Compte crée ";
            echo "lien pour telecharger le jeu";
        } else {
            echo "Error: " . $sqlNewUser . "<br>" . $con->error;
        }
    

    }else{//aussi non on lui affiche ce msg
        echo "mail ou pseudo deja utilisé";
    }
        
   
    $con = null;
}

catch(PDOException $e){
    echo $e->getMessage();
    }
    
?>