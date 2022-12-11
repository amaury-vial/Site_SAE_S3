<?php 

session_start();

if( $_SESSION['admin'] == false){
    header("location:../index.php");
    exit;
}

function afficherClassement(){
    require("bdcon.php");// on require la page pour ce connecter a la bd
    $classement = "<br /><br />";

                    
    $sqlClassement = "Select nickname, score FROM USERS where score is not null order by score DESC limit 5";// requete pour recuperer le classement 
    $sth = $con->prepare($sqlClassement);
    $sth->execute();


    //on affichage le classement
    while($row = $sth->fetch()){
        $classement = $classement.$row["nickname"]." : ".$row["score"]."<br /><br />";
    }
    return $classement;

}

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/Style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="../JS/index.js" defer></script>
  <title>FindTheBreach</title>
</head>

<body>

    <!-- HEADER -->
    <header>
        <a href="../index.php">
            <img class="logo" src="../IMAGE/FindTheBreach.png" alt="IMG FindTheBreach">
        </a>
        <a class="Title" href="../index.php">
            <p>
                Find The Breach
            </p>
        </a>
        <?php
        if( !(sizeof($_SESSION)===0) && ($_SESSION['user'])){
            ?>
            <a class="connexionHeader" href="pageConnection.php">
                <p>
                    Connecté
                </p>
            </a>
            <?php
        }else{
            ?>
            <a class="connexionHeader" href="pageConnection.php">
                <p>
                    Connection
                </p>
            </a>
            <?php
        }
        ?>
    </header>

    <!-- LOGO -->
  <div class="container">

    <!-- CONNEXION -->
    <div class="tab-body" data-id="Question">
        <h1>Modifier une question</h1>
        <form method="post" action="../PHP/question.php">
            <div class="row">
                <input type="number" class="input" placeholder="Num Question" name="numque" max="10" min="1" size="1em" required="required"/>
            </div>
            <div class="row">
                <input type="text" class="input" placeholder="Question" name="question" required="required"/>
            </div>
            <div class="row">
                <textarea name="Consigne" rows="5" cols="80"  class="input" placeholder="Consigne" required="required" aria-required="true" style="min-height: 30%;height: 30%; width: 100%;" ></textarea>
            </div>
            <div class="row">
                <input type="text"  class="input" placeholder="Réponse" name="réponse" required="required"/>
            </div>
            <div class="row">
                <input type="text" class="input" placeholder="Indice" name="Indice" required="required"/>
            </div>
            <input type="submit" value="Valider" class="btn">
        </form>
    </div>

    <!-- INSCRIPTION -->
    <div class="tab-body" data-id="Joueur">
        <h1>LeaderBoard</h1>
        <div class="tab-link active">
            <?php 
            echo(afficherClassement());
            ?>
        </div>
    </div>

    <div class="tab-footer">
      <a class="tab-link active" data-ref="Question" href="javascript:void(0)">Question</a>
      <a class="tab-link" data-ref="Joueur" href="javascript:void(0)">Joueur</a>
    </div>
  </div>
    <footer>
        <p class="credits">Find the breach © 2022-2023</p>
        <div class="footer_contact">
            <a class="mailto" href="mailto:findthebreach.noreply@gmail.com">Send mail</a>
        </div>
    </footer>
</body>

</html>