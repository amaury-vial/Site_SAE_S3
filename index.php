<!--HTML W3C fait-->


<?php // php STAN 9
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/main.css">
  <title>FindTheBreach</title>
</head>

<body>

    <!-- HEADER -->
    <header>
        <a href="index.php">
            <img class="logo" src="pictures/FindTheBreach.png" alt="IMG FindTheBreach">
        </a>
        <a class="title" href="index.php">
            <h1>Find The Breach</h1>
        </a>
        <?php
        // If the user is connected... //
        if(isset($_SESSION['user'])){
            ?>
            <a class="connexionHeader" href="php/disconnection.php">
                <!--il obtient la possibilité de se déconnecter -->
                <p>
                Se deconnecter
                </p>
            </a>
            <?php
        }else{
            ?>
                <!--Else, he has the possibility to connect-->
            <a class="connexionHeader" href="pages/connection.php">
                <p>Connexion</p>
            </a>
            <?php
        }
        ?>

    </header>

    <?php
    //If the person connected is an Admin, he obtains a page reserved for admins//
     if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
        ?>
            <a href="pages/admin.php" id="adminPageBtn">
                <h2>Accès à la page admin</h2>
            </a>
        <?php
     }
    ?>


    <?php
    // If an user is connected //
    if(isset($_SESSION['user'])){
        ?>
        <!--a download link is displayed -->
        <a id="downloadApplication-container" href="Find The Breach.jar" download>
            <img id="downloadApplication" src="pictures/logo.png" alt="IMG FindTheBreach">
        </a>
           
        <?php
    }else{
        ?>
            <!-- else a page to connect is displayed -->
        <a id="downloadApplication-container" href="pages/connection.php">
            <img id="downloadApplication" src="pictures/logo.png" alt="IMG FindTheBreach">
        </a>
        <?php
    }
    ?>
    <h1 id="downloadText" >Cliquez sur l'image pour télécharger le jeu</h1>


    <div class = "scenario">
        <h1>Notre application vous permet de progresser en réseau de manière ludique !</h1><br><br>
        <h1>Scénario :</h1>
          <p>  Vous êtes un étudiant en informatique et vous venez de trouver une signature<br>
            laissée par un groupe de hacker. Votre mission est de les retrouver afin de<br>
            les dénoncer à la police.
            </p><br>
    </div>

    <div id="instructions">
        <h1>Comment fonctionne l'application ?</h1>
        <div id = "firstPart">
            <img class="applicationButton" src="pictures/practice_button.png" alt="icon pratice">
            <p>Dans un première partie vous allez apprendre les
                éléments nécéssaire à votre recherche. Vous serez
                guidés à l'aide de questions et de consignes.
                N'hésitez pas à utiliser votre navigateur internet
                pour trouver les solutions.
                </p>
        </div>
        <br>
        <div id = "secondPart">
            <p>Dans une seconde partie,  vous allez mettre en application ce que vous avez appris et bien plus !
            Vous serez guidés à l'aide de questions et de consignes
            dans la traque des malfaiteurs. Vous pouvez ici aussi,
             vous aider de votre navigateur pour parvenir à trouver
              ces fameux hackers !</p>
            <img class="applicationButton" src="pictures/play_button.png" alt="icon play">
        </div>
    </div>
    <?php include("footer-header/footer.php") ?>
</body>
</html>
