<?php

require ("bdcon.php");

//recup des variable du formulaire
$pseudo =$_POST["pseudo"];
$password = hash("sha256", $_POST["password"].$pseudo);


$sqlCheckUser = "SELECT EMAIL, NICKNAME, ID_USER, PASSWORD FROM USERS"; //requete pour recup tout les users
$check = false;
$sth = $con->prepare($sqlCheckUser);
$sth -> execute();

$IdUser = 0;

while($row = $sth -> fetch()) {    //on check si le user existe deja
    if ($pseudo == $row['nickname'] && $password == $row['password']){ // on vérifie que le mdp est correct avec le mdp et le hash
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
    
?>
