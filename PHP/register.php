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
    $pseudo = $_POST["pseudo"];
    $adr = $_POST["adr"];
    //$password = $_POST["password"]; 
    $password = hash("sha256", $password.$pseudo);
    

    $sqlCheckUser = "SELECT EMAIL, NICKNAME, ID_USER FROM USERS"; //requete pour recup tout les users
    $check = true;
    $id = 0;

    $sth = $con->prepare($sqlCheckUser);
    $sth -> execute();

   while($row = $sth -> fetch()) {    //on check si le user existe deja
        if ($pseudo == $row['nickname'] || $adr == $row['email'] ){    
            $check = false;
        }
        if($id < $row['id_user']){
            $id = $row['id_user'];
        }
    }
    ++$id;
    
    //si il n'exite pas on le cree
    if($check == true){
        $sqlNewUser = "INSERT INTO USERS (ID_USER, EMAIL, NICKNAME, PASSWORD)
            VALUES ($id,'$adr', '$pseudo' ,'$password')";  // requete pour insert le new user
        $sth = $con->prepare($sqlNewUser);
        $sth -> execute();
        
        header("location: ../HTML/pageDl.html");
        exit;
        
        
    }else{//aussi non on lui affiche ce msg
        
        header("location: ../index.html");
        exit;
        
    }
    $con = null;
}

catch(PDOException $e){
    echo $e->getMessage();
    }
    
?>