<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "sae_s3";


try {
    
    //connection to database
    $conn = new mysqli($servername, $username, $password,$db); 
    if ($conn -> connect_error){
        die("Connection failed : " . mysqli_connect_error());
    }

    $pseudo =$_POST["pseudo"];
    $adr =$_POST["adr"];
    $password =$_POST["password"];

    $sqlCheckUser = "SELECT mail, pseudo FROM user";
    $resultCheckUser = $conn->query($sqlCheckUser);

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

        if ($conn->query($sqlNewUser) === TRUE) {
            echo "Compte crée";
            echo "lien pour telecharger le jeu";
        } else {
            echo "Error: " . $sqlNewUser . "<br>" . $conn->error;
        }
    }else{
        echo "mail ou pseudo deja utilisé";
    }
    
    $conn -> close();
}

catch(PDOException $e){
    echo $e->getMessage();
    }
?>