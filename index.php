<!--HTML W3C fait-->

<?php // PHP STAN 9
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
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
        if(isset($_SESSION['user'])){
            ?>
            <a class="connexionHeader" href="../PHP/deco.php">
                <p>
                Se deconnecter
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
     if(isset($_SESSION['admin'])){
        ?>
        <a href="PAGES/pageAdmin.php">
            <p>Cliquez pour allez sur la page admin</p>
        </a>
        <?php
     }
    ?>


    <?php
    if(isset($_SESSION['user'])){
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
            <p>Dans une seconde partie,  vous allez mettre en <br>
            application ce que vous avez appris et bien plus ! <br>
            Vous serez guidés à l'aide de questions et de consignes <br>
            dans la traque des malfaiteurs. Vous pouvez ici aussi,<br>
             vous aider de votre navigateur pour parvenir à trouver<br>
              ces fameux hackers !</p><br>

            <img class="iconJava" src="IMAGE/play_button.png" alt="icon jouer">
        </div>
    </div>
    <?php include("FOOTER-HEADER/footer.php")?>
</body>
</html>
