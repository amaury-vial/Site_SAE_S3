<?php
// PHP STAN 9

require ("bdcon.php");// on require la page pour ce connecter a la bd

// fonction pour modifier le mot de passe
function nouveauMdp(String $mdp, String $email): void{//$mdp = nouveau mot de passe     $email = email lier au compte pour modifier le mot de passe 
    
    require ("bdcon.php");// on require la page pour ce connecter a la bd
    
    //recuperation des pseudo pour le sel 
    $sqlNickname = "select nickname from users where email = '$email'";
    $sth = $con->prepare($sqlNickname);
    $sth -> execute();
    $nickname = $sth -> fetch();
    $nickname = $nickname['nickname'];

    //hash du nouveau mot de passe
    $mdp = hash("sha256", $mdp.$nickname);

    //on met a jour le mot de passe
    $sql = "update users set password = '$mdp' where email='$email' and nickname='$nickname'";
    $sth = $con->prepare($sql);
    $sth -> execute();
    supprToken($email);    
}

function supprToken(String $email): void{//$email = email lier au compte pour modifier le mot de passe 
    
    require ("bdcon.php");// on require la page pour ce connecter a la bd

    //on supprimer tout les token gener pour l'adresse mail associée
    $sql = "DELETE FROM recup_mdp WHERE email='$email'";
    $sth = $con->prepare($sql);
    $sth -> execute();
    //redirection vers index
    header("location: ../index.php");
    exit;
}

//recuperation des variable dans le formulaire
$mail = $_POST['mail'];
$token = $_POST['token'];

//on recuper token 
$sql = "select token from recup_mdp where email = '$mail'";
$sth = $con->prepare($sql);
$sth -> execute();

while($row = $sth -> fetch()){// on boucle sur les token generer associé a l'email
    if($row['token'] == $token){// si le token est le bon
        if($_POST['mdp'] ==  $_POST['mdpConfirmer']){// si les 2 mot de passe sont les meme
            nouveauMdp($_POST['mdp'], $mail);// on appele la fonction pour mettre a jour son mot de passe   
        }else{
            header("location:../PAGES/pageRecupMdp.php");
            exit;
        }       
    }
}
header("location:../PAGES/pageRecupMdp.php");
exit;
?>