<?php 
function classement(){
    require ("bdcon.php");// on require la page pour ce connecter a la bd
    $classement = "<br><br><br>";
        $sqlClassement = "Select nickname, score FROM USERS where score is not null order by score DESC limit 5";// requete pour recuperer le classement 
        $sth = $con->prepare($sqlClassement);
        $sth->execute();

        //on affichage le classement
        while($row = $sth->fetch()){
            $classement = $classement.$row["nickname"]." : ".$row["score"]."<br>";
        }
        return $classement;
}

?>

<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Page Admin</title>
<link rel="stylesheet" href="../CSS/StylePageAdmin.css">
</head>

<body>

    <!-- HEADER !-->

    <header>
        <a href="../index.html">
            <img class="Logo" src="../IMAGE/FindTheReach.png">
        </a>

        <h1 class="Link">
            <a class="Title" href="../index.html">
                <p>Find The Breach</p>    
            </a>
        </h1>
    </header>

    <section class="corp">
        <form method="post" action="question.php">
            <h1><p>Modifier une question :</p></h1>
            <div>
            <label><p>No Question :</p></label><input type="number", name="numque" max="10" min="1" size="1em" required="required"/>
            </div>
            <label><p>Question :</p></label><input type="text" name="question" required="required"/>
            <p>Consigne</p>
            <textarea name="Consigne" rows="5" cols="80"  required="required" aria-required="true" style="height: 30%; width: 100%;" ></textarea>
            <label><p>Réponse :</p></label><input type="text" name="réponse" required="required"/>
            <label><p>Indice :</p></label><input type="text" name="Indice" required="required"/>
            <br/>
            <div><input type="submit" value="Valider"></div>
        </form>
        <section class="LeaderBord">
            <h1><p>LeaderBoard</p></h1>
            <div class="Player">
                <?php 
                echo(classement());
                ?>
            </div>
        </section>
    </section>
    <footer>
        ben le footer
    </footer>
</body>
</html>
