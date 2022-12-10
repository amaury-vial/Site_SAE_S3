<?php
session_start();
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/StyleIndex.css">
  <link rel="stylesheet" href="CSS/Style.css">
  <title>FindTheBreach</title>
</head>

<body>

    <!-- HEADER -->
    <header>
        <a href="index.php">
            <img class="logo" src="IMAGE/FindTheBreach.png" alt="IMG FindTheBreach">
        </a>
        <a class="Title" href="index.php">
            <p>Find The Breach</p>
        </a>
        <?php
        if( !(sizeof($_SESSION)===0) && ($_SESSION['user'])){
            ?>
            <a class="connexionHeader" href="PAGES/pageConnection.php">
                <p>
                    Connecté
                </p>
            </a>
            <?php
        }else{
            ?>
            <a class="connexionHeader" href="PAGES/pageConnection.php">
                <p>
                    Connection
                </p>
            </a>
            <?php
        }
        ?>

    </header>

    <?php
    if( !(sizeof($_SESSION)===0) && ($_SESSION['user'])){
        ?>
        <a href="https://google.com">
            <img class="logoTelechargement" src="IMAGE/logo.png" alt="IMG FindTheBreach">
        </a>
        <?php
    }else{
        ?>
        <a href="PAGES/pageConnection.php">
            <img class="logoTelechargement" src="IMAGE/logo.png" alt="IMG FindTheBreach">
        </a>
        <?php
    }
    ?>
    <h1>Cliquez sur l'image pour télécharger le jeu</h1>


    <div class = "scenario">
        <h1>Notre application vous permet de progresser en réseau de manière ludique !</h1><br><br>
        <h1>Scénario :</h1>
          <p>  Vous êtes un étudiant en informatique et vous venez de trouver une signature<br>
            laissée par un groupe de hacker. Votre mission est de les retrouver afin de<br>
            les dénoncer à la police.
            </p><br>
    </div>

    <div>
        <h1>Comment fonctionne <br> l'application ?</h1>
        <div class = "txt">
            <img class="iconJava" src="IMAGE/practice_button.png" alt="icon pratice"><br>
            <p>Dans un première partie vous allez apprendre les<br>
                éléments nécéssaire à votre recherche. Vous serez<br>
                guidés à l'aide de questions et de consignes.<br>
                N'hésitez pas à utiliser votre navigateur internet<br>
                pour trouver les solutions.
                </p>
            
        </div>
        <br>
        <div class = "txt2">
            <p>Dans un première partie vous allez apprendre les<br>
            éléments nécéssaire à votre recherche. Vous serez<br>
            guidés à l'aide de questions et de consignes.<br>
            N'hésitez pas à utiliser votre navigateur internet<br>
            pour trouver les solutions.</p><br>

            <img class="iconJava" src="IMAGE/play_button.png" alt="icon jouer">
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
