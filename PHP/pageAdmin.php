<?php 

date_default_timezone_set('Europe/Paris');

$host = "lucky.db.elephantsql.com";
$user = "xpirrwid";
$pass = "LkhxflJA_GDQQI_nqpkJBIbFBc955fiL";
$db = "xpirrwid";

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
                echo("<br />");
                echo("<br />");
                echo("<br />");
                    try { 
                        //connection a la base de donnée
                        $con = new PDO("pgsql:host=$host; port=5432; dbname=$db; user=$user; password=$pass")
                        or die ("Could not connect to server\n");

                        $sqlClassement = "Select nickname, score FROM USERS where score is not null order by score DESC limit 5";
                        $sth = $con->prepare($sqlClassement);
                        $sth->execute();
                        $classement = array();
                        while($row = $sth->fetch()){
                            echo($row["nickname"]);
                            echo(" : ");
                            echo($row["score"]);
                            echo("<br/>");
                            echo("<br/>");
                            echo("<br/>");
                        }
                        $con = null;
                    }

                    catch(PDOException $e){
                        echo $e->getMessage();
                        }
                    ?>
            </div>
        </section>
    </section>
    <footer>
        ben le footer
    </footer>
</body>


</html>
