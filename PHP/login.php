<?php

date_default_timezone_set('Europe/Paris');

$host = "lucky.db.elephantsql.com";
$user = "xpirrwid";
$pass = "LkhxflJA_GDQQI_nqpkJBIbFBc955fiL";
$pass_login = "$2y$10$3OtqRbdAhpLy9Et4q0z2Q.gBcmNDiqHYEP/ToBYYAMvsOFseJvsna"; // Hash du mot de pass de connexion
$db = "xpirrwid";


try {
    
    //connection a la base de donnée
    $con = new PDO("pgsql:host=$host; port=5432; dbname=$db; user=$user; password=$pass")
    or die ("Could not connect to server\n");

    //recup des variable du formulaire
    $pseudo =$_POST["pseudo"];
    $password =$_POST["password"]; //$password = hash("sha256", $password.$pseudo);
    
    

    $sqlCheckUser = "SELECT EMAIL, NICKNAME, ID_USER, PASSWORD FROM USERS"; //requete pour recup tout les users
    $check = false;
    $sth = $con->prepare($sqlCheckUser);
    $sth -> execute();

    $IdUser = 0;

    while($row = $sth -> fetch()) {    //on check si le user existe deja
        if ($pseudo == $row['nickname']  && $password == $row['password']){
        //if ($pseudo == $row['nickname'] && $password == $row['password']){ // on vérifie que le mdp est correct avec le mdp et le hash
            $check = true;
            $IdUser = $row['id_user'];
        }
    }

    //si il n'exite pas on le cree
    if($check == true){

        $checkAdmin = false;
        $sqlIsAdmin = "SELECT ID_USER FROM ADMIN";
        $sth = $con->prepare($sqlIsAdmin);
        $sth -> execute();

        while($row = $sth -> fetch()) {    //on check si le user existe deja
            if ($IdUser ==  $row['id_user']){
                $checkAdmin = true;
            }
        }

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