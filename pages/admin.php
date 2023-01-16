<!--HTML W3C fait-->

<?php 
// php STAN 9
// Require the isAdmin.php file
require("../php/isAdmin.php");
require("../php/printElemPageAdmin.php");
require("../php/bdcon.php");

// Function returns a HTML input tag with the max value from the database
function maxId($con){
    // Select the maximum q_id from the QUESTION table
    $sql = "Select MAX(q_id) FROM QUESTION";
    $sth = $con->prepare($sql);
    $sth->execute();
    // Fetch the row from the database
    $row = $sth->fetch();
    return $row["max"];
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
    <script src="../js/lisener.js"></script>
    <title>FindTheBreach</title>
</head>
<body>
    <!--inclusion of the file which has to provide access to all features in the file-->
    <?php include("../footer-header/header.php");?>
    

    <div class="container">

        <div class="icone">
            <i class="fas fa-users-cog  fa-4x"></i>
        </div>

        <div class="tab-body" data-id="question">
                
                <div>
                    <h1>Modifier une question</h1>

                    <!--Form to edit question-->
                    <form method="post" action="../php/question.php">

                        <div class="row">
                            <i class="fa-solid fa-3"></i>
                            <input onchange='lisenerFormId()' id='idquestion' type='number' class='input' placeholder='Num Question' name='numQuestion' min='1' max='<?php echo(maxId($con))?>' required='required'>
                        </div>
                        <!--Edit question-->
                        <div class="row">
                            <input type="text" id="question" class="input" placeholder="Question" name="question" required="required">
                        </div>

                        <!--Edit set-->
                        <div class="row">
                            <i class="fa-solid fa-question"></i>
                            <textarea id="consigne" name="consigne" rows="5" cols="80"  class="input" placeholder="Consigne" aria-required="true" style="min-height: 30%;height: 30%; width: 100%;" ></textarea>
                        </div>

                        <!--Edit answer-->
                        <div class="row">
                            <i class="fa-solid fa-check"></i>
                            <input type="text" id="reponse" class="input" placeholder="Réponse" name="reponse" required="required">
                        </div>

                        <!--Edit index-->
                        <div class="row">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <textarea name="indice" id="indice" rows="5" cols="80"  class="input" placeholder="Indice" aria-required="true" style="min-height: 30%;height: 30%; width: 100%;" ></textarea>
                        </div>

                        <input type="submit" value="Valider">

                    </form>
                    <br>

                    <h1>Ajouter une question</h1>

                    <!--Formt to add a question-->
                    <form method="post" action="../php/addQuestion.php">

                        <!--Add question-->
                        <div class="row">
                            <input type="text" class="input" placeholder="Question" name="question" required="required">
                        </div>

                        <!--Add set-->
                        <div class="row">
                            <i class="fa-solid fa-question"></i>
                            <textarea name="Consigne" rows="5" cols="80"  class="input" placeholder="Consigne" aria-required="true" style="min-height: 30%;height: 30%; width: 100%;" ></textarea>
                        </div>

                        <!--Add answer-->
                        <div class="row">
                            <i class="fa-solid fa-check"></i>
                            <input type="text"  class="input" placeholder="Réponse" name="réponse" required="required">
                        </div>

                        <!--Add index-->
                        <div class="row">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <textarea name="Indice" rows="5" cols="80"  class="input" placeholder="Indice" aria-required="true" style="min-height: 30%;height: 30%; width: 100%;" ></textarea>
                        </div>

                        <input type="submit" value="Valider">

                    </form>

                    <h1>Supprimer une question</h1>
                    <!--Form to delete question-->
                    <form method="post" action="../php/deleteQuestion.php">

                        <div class="row">
                            <i class="fa-solid fa-3"></i>
                            <input type='number' class='input' placeholder='Num Question' name='numQuestion' min='15' max='<?php echo(maxId($con)) ?>' required='required'>
                        </div>

                        <input type="submit" value="Valider">

                    </form>
                    
                </div>

        </div>

        <div class="tab-body" data-id="player">

            <h1>LeaderBoard</h1>

            <div>
                <?php
                echo(printLeaderBoard($con));
                ?>
            </div>

            <h1>Recherche Joueurs</h1>

            <div>

                <!-- Form to add score and user's name -->
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

            <a class="tab-link active" data-ref="question" href="javascript:void(0)">Questions</a>
            <a class="tab-link" data-ref="player" href="javascript:void(0)">Joueur</a>

        </div>

        

    </div>
    <div class="listequestion">
        <h1>Liste des Questions</h1><br>
        <?php echo(printQuestions($con));?>
    </div>
    <a class="goTop" href="#top"><i class="fa-solid fa-up-long"></i></i></a>
    <?php include("../footer-header/footer.php") ?>
</body>
</html>
