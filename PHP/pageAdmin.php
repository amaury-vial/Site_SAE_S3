<?php 

function afficherClassement(){
    require ("bdcon.php");// on require la page pour ce connecter a la bd
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

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/StyleIndex.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
  <script src="../JS/index.js" defer></script>
  <title>FindTheBreach</title>
</head>

<body>

    <!-- HEADER -->
    <header>
        <a href="../index.html">
            <img class="logo" src="../IMAGE/FindTheReach.png" alt="IMG FindTheBreach">
        </a>
        <a class="Title" href="../index.html">
            <p>
                Find The Breach
            </p>
        </a>
    </header>

    <!-- LOGO -->
  <div class="container">

    <!-- CONNEXION -->
    <div class="tab-body" data-id="Question">
        <h1>Modifier une question</h1>
        <form method="post" action="question.php">
            <label>No Question : </label><input type="number" name="numque" max="10" min="1" size="1em" required="required"/>
            <br>
            <br>
            <label>Question : </label><input type="text" name="question" required="required"/>
            <p>Consigne : </p>
            <textarea name="Consigne" rows="5" cols="80"  required="required" aria-required="true" style="height: 30%; width: 100%;" ></textarea>
            <br>
            <br>
            <label>Réponse : </label><input type="text" name="réponse" required="required"/>
            <br>
            <br>
            <label>Indice : </label><input type="text" name="Indice" required="required"/>
            <br>
            <br>
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
</body>

</html>

<i class="fa-sharp fa-solid fa-text"></i>
<i class="fa-regular fa-lightbulb"></i>
<i class="fa-regular fa-hashtag"></i>
<i class="fa-solid fa-question"></i>