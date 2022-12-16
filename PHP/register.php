<?php
// PHP STAN 9

    require ("bdcon.php");// on require la page pour ce connecter a la bd

    //recup des variable du formulaire
    $pseudo = $_POST["pseudo"];
    $adr = $_POST["adr"];
    $password = hash("sha256", $_POST["password"].$pseudo);

    //requete pour recuperer les user et leurs infos
    $sqlCheckUser = "SELECT EMAIL, NICKNAME, ID_USER FROM USERS WHERE nickname = :nom";
    $sth = $con->prepare($sqlCheckUser);
    $sth -> bindValue(':nom', $pseudo, PDO::PARAM_STR);
    $sth -> execute();
    $row = $sth -> fetch();
    $check = true; //pour vérifier qu'il n'exister pas deja
    
    if ( $row && ($pseudo == $row['nickname'] || $adr == $row['email'])){
        $check = false;//si il y a le pseudo ou l'email existe deja on check a false
    }

    $sql = "SELECT MAX(ID_USER) FROM USERS";
    $sth = $con->prepare($sql);
    $sth -> execute();
    $row = $sth -> fetch();
    $id = $row['max'] + 1;

    if($check){
        $sqlNewUser = "INSERT INTO USERS (ID_USER, EMAIL, NICKNAME, PASSWORD)
            VALUES (:id, :adr, :pseudo, :password)";
        $sth = $con->prepare($sqlNewUser);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->bindValue(':adr', $adr, PDO::PARAM_STR);
        $sth->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $sth->bindValue(':password', $password, PDO::PARAM_STR);
        $sth->execute();
        header("location: ../index.php");//redirection vers la page pour telecharger le jeux
        exit;
    }
    header("location: ../PAGES/pageConnection.php");
    exit;
?>