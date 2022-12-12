<?php
// PHP STAN 9

    require ("bdcon.php");// on require la page pour ce connecter a la bd

    //recup des variable du formulaire
    $pseudo = $_POST["pseudo"];
    $adr = $_POST["adr"];
    $password = hash("sha256", $_POST["password"].$pseudo);

    //requete pour recuperer les user et leurs infos
    $sqlCheckUser = "SELECT EMAIL, NICKNAME, ID_USER FROM USERS";
    $sth = $con->prepare($sqlCheckUser);
    $sth -> execute();

    $check = true; //pour vérifier qu'il n'exister pas deja
    $id = 0;

    while($row = $sth -> fetch()) {    //on check si le user existe deja
        if ($pseudo == $row['nickname'] || $adr == $row['email'] ){
            $check = false;//si il y a le pseudo ou l'email existe deja on check a false
        }

        if($id < $row['id_user']){// on recuper l'id max
            $id = $row['id_user'];
        }
    }

    ++$id;
    if($check){
        $sqlNewUser = "INSERT INTO USERS (ID_USER, EMAIL, NICKNAME, PASSWORD)
            VALUES ($id,'$adr', '$pseudo' ,'$password')";//on ajoute l'user dans la BD
        $sth = $con->prepare($sqlNewUser);
        $sth -> execute();
        header("location: ../index.php");//redirection vers la page pour telecharger le jeux
        exit;
    }
    header("location: ../PAGES/pageConnection.php");
    exit;
?>