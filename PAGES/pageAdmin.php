<?php 

    session_start();

    if( $_SESSION['admin'] == false){
        header("location:../index.php");
        exit;
    }

    function afficherClassement(){
        require("../PHP/bdcon.php");// on require la page pour ce connecter a la bd
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

    function afficherQuestion(){
        require("../PHP/bdcon.php");// on require la page pour ce connecter a la bd
        $liste = "<br /><br />";

        $sql = "Select q_id, title FROM question order by q_id";// requete pour recuperer le classement
        $sth = $con->prepare($sql);
        $sth->execute();

        //on affichage le classement
        while($row = $sth->fetch()){
            $liste = $liste.$row["q_id"]." : ".$row["title"]."<br /><br />";
        }
        return $liste;
    }


?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/Style.css">
    <link rel="stylesheet" href="../CSS/StyleAdminQuestion.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="../JS/index.js" defer></script>
  <title>FindTheBreach</title>
</head>
<body>
    <!-- HEADER -->
    <?php include("../FOOTER-HEADER/header.php") ?>

    <div class="container">
        <div class="tab-body" data-id="Question">
            <div class="adminQ">
                <div>
                    <h1>Liste des Questions</h1>
                    <?php echo(afficherQuestion());?>
                </div>
                <div>
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
                            <textarea name="Indice" rows="5" cols="80"  class="input" placeholder="Indice" required="required" aria-required="true" style="min-height: 30%;height: 30%; width: 100%;" ></textarea>
                        </div>
                        <input type="submit" value="Valider" class="btn">
                    </form>
                </div>
            </div>

        </div>

        <div class="tab-body" data-id="Joueur">
            <h1>LeaderBoard</h1>
            <div>
                <?php
                echo(afficherClassement());
                ?>
            </div>
            <h1>Recherche Joueur</h1>
            <div>
                <form method="post" action="../PHP/recupScore.php">
                    <div class="row">
                        <input type="text" class="input" placeholder="Nom" name="nom" size="1em" required="required"/>
                    </div>
                    <div class="row">
                        <input type="text" class="input" placeholder="eMail" name="mail" required="required"/>
                    </div>
                    <input type="submit" value="Valider" class="btn">
                </form>
            </div>
        </div>

        <div class="tab-footer">
            <a class="tab-link active" data-ref="Question" href="javascript:void(0)">Question</a>
            <a class="tab-link" data-ref="Joueur" href="javascript:void(0)">Joueur</a>
        </div>
    </div>

    <?php include("../FOOTER-HEADER/footer.php")?>
</body>
</html>
