<?php

date_default_timezone_set('Europe/Paris');

$host = "lucky.db.elephantsql.com";
$user = "xpirrwid";
$pass = "LkhxflJA_GDQQI_nqpkJBIbFBc955fiL";
$db = "xpirrwid";


try {
    
    //connection to database
    $con = new PDO("pgsql:host=".$host.", dbname=".$db.", user=".$user.", password=".$pass)
    or die ("Could not connect to server\n");
    $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "LETS GO";

    $pseudo =$_POST["pseudo"];
    $adr =$_POST["adr"];
    $password =$_POST["password"];

    $sqlCheckUser = "SELECT mail, pseudo FROM user";
    $resultCheckUser = $con->query($sqlCheckUser);

    $userExist = false;

    if ($resultCheckUser->num_rows > 0) {
    // output data of each row
        while($user = $resultCheckUser->fetch_assoc()) {
            if ($pseudo == $user['pseudo'] || $adr == $user['mail'] ){
                $userExist = true;
            }
        }
    }

    if ($userExist){
        $sqlNewUser = "INSERT INTO user (mail, pseudo, mot_de_passe)
        VALUES ('$adr', '$pseudo', '$password')";

        if ($con->query($sqlNewUser) === TRUE) {
            echo "Compte crée";
            echo "lien pour telecharger le jeu";
        } else {
            echo "Error: " . $sqlNewUser . "<br>" . $con->error;
        }
    }else{
        echo "mail ou pseudo deja utilisé";
    }
    
    $cnn -> close();
}

catch(PDOException $e){
    echo $e->getMessage();
    }
    
?>