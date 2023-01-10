<!--HTML W3C fait-->

<?php 
// php STAN 9
    session_start();

    if((!isset($_SESSION['admin'])) || ($_SESSION['admin'] == false)){
        header("location:../index.php");
        exit;
    }

    function maxId($flag){
        require("../php/bdcon.php");

        $sql = "Select MAX(q_id) FROM QUESTION";
        $sth = $con->prepare($sql);
        $sth->execute();
        $row = $sth->fetch();

        if ($flag){
            return "<input type='number' class='input' placeholder='Num Question' name='numQuestion' min='15' max='". $row["max"] ."'required='required'>";
        }else{
            return "<input type='number' class='input' placeholder='Num Question' name='numQuestion' min='1' max='". $row["max"] ."'required='required'>";
        }

    }

    function printLeaderBoard():String{
        require("../php/bdcon.php");
        $leaderBoard = "<br /><br />";

        $sql = "Select nickname, score FROM USERS where score is not null order by score DESC limit 5";
        $sth = $con->prepare($sql);
        $sth->execute();

        while($row = $sth->fetch()){
            $leaderBoard = $leaderBoard.$row["nickname"]." : ".$row["score"]."<br /><br />";
        }

        return $leaderBoard;
    }

    function printQuestions():String{
        require("../php/bdcon.php");
        $questions = "<br /><br />";

        $sql = "Select q_id, title FROM question order by q_id";
        $sth = $con->prepare($sql);
        $sth->execute();

        while($row = $sth->fetch()){
            $questions = $questions.$row["q_id"]." : ".$row["title"]."<br /><br />";
        }
        return $questions;
    }


?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin-question.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"> </script>
  <script src="../js/index.js" defer></script>
  <title>FindTheBreach</title>
</head>
<body>

    <!-- HEADER -->
    <?php include("../footer-header/header.php");?>

    <div class="container">
        <div class="icone">
            <i class="fas fa-users-cog  fa-4x"></i>
        </div>
        <div class="tab-body" data-id="Question">
            <div class="adminQ">
                <div>
                    <h1>Liste des Questions</h1>
                    <?php echo(printQuestions());?>
                </div>
                <div>
                    <h1>Modifier une question</h1>
                    <form method="post" action="../php/question.php">
                        <div class="row">
                            <i class="fa-solid fa-3"></i>
                            <?php echo(maxId(false)) ?>
                        </div>
                        <div class="row">
                            <input type="text" class="input" placeholder="Question" name="question" required="required">
                        </div>
                        <div class="row">
                            <i class="fa-solid fa-question"></i>
                            <textarea name="Consigne" rows="5" cols="80"  class="input" placeholder="       Consigne" aria-required="true" style="min-height: 30%;height: 30%; width: 100%;" ></textarea>
                        </div>
                        <div class="row">
                            <i class="fa-solid fa-check"></i>
                            <input type="text"  class="input" placeholder="Réponse" name="réponse" required="required">
                        </div>
                        <div class="row">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <textarea name="Indice" rows="5" cols="80"  class="input" placeholder="Indice" aria-required="true" style="min-height: 30%;height: 30%; width: 100%;" ></textarea>
                        </div>
                        <input type="submit" value="Valider">
                    </form>
                    <br>
                    <h1>Ajouter une question</h1>
                    <form method="post" action="../php/addQuestion.php">
                        <div class="row">
                            <input type="text" class="input" placeholder="Question" name="question" required="required">
                        </div>
                        <div class="row">
                            <i class="fa-solid fa-question"></i>
                            <textarea name="Consigne" rows="5" cols="80"  class="input" placeholder="Consigne" aria-required="true" style="min-height: 30%;height: 30%; width: 100%;" ></textarea>
                        </div>
                        <div class="row">
                            <i class="fa-solid fa-check"></i>
                            <input type="text"  class="input" placeholder="Réponse" name="réponse" required="required">
                        </div>
                        <div class="row">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <textarea name="Indice" rows="5" cols="80"  class="input" placeholder="Indice" aria-required="true" style="min-height: 30%;height: 30%; width: 100%;" ></textarea>
                        </div>
                        <input type="submit" value="Valider">
                    </form>
                    <br>
                    <h1>Supprimer une question</h1>
                    <form method="post" action="../php/deleteQuestion.php">
                        <div class="row">
                            <i class="fa-solid fa-3"></i>
                            <?php echo(maxId(true)) ?>
                        </div>
                        <input type="submit" value="Valider">
                    </form>
                    
                </div>
            </div>

        </div>

        <div class="tab-body" data-id="Joueur">
            <h1>LeaderBoard</h1>
            <div>
                <?php
                echo(printLeaderBoard());
                ?>
            </div>
            <h1>Recherche Joueurs</h1>
            <div>
                <form method="post" action="../php/getScore.php">
                    <div class="row">
                        <i class="fa-solid fa-users"></i>
                        <input type="text" class="input" placeholder="Liste des noms (ex: Luca, Fred, Nils)" name="nom" required="required">
                    </div>
                    <div class="row">
                        <i class="fa-solid fa-at fa-2x"></i>
                        <input type="text" class="input" placeholder="Votre eMail" name="mail" required="required">
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

    <?php include("../footer-header/footer.php") ?>
</body>
</html>
