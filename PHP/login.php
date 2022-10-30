<!doctype html>
<html lang="fr">
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

    $sqlCheckUser = "SELECT mail, pseudo,  mot_de_passe FROM user";
    $resultCheckUser = $conn->query($sqlCheckUser);


    if ($resultCheckUser->num_rows > 0) {
    // output data of each row
        while($user = $resultCheckUser->fetch_assoc()) {
            if ($pseudo == $user['pseudo'] && $adr == $user['mail'] && $password == $user['mot_de_passe']){
                echo "connecter a la page admin";
                ?><a href="../HTML/pageAdmin.html"> se co </a><?php
            }
        }
    }
   
    $conn -> close();
}

catch(PDOException $e){
    echo $e->getMessage();
    }
?>
</html>