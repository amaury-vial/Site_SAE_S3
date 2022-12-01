<?php

require ("bdcon.php");

//recup des variable du formulaire
$pseudo = $_POST["pseudo"];
$adr = $_POST["adr"];
$password = hash("sha256", $_POST["password"].$pseudo);

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

