<?php

session_start();
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/Style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
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
            <p>Find The Breach</p>
        </a>
        <?php
        if(!(sizeof($_SESSION)===0) && ($_SESSION['user'])){
            ?>
            <a class="connexionHeader" href="#">
                <p>
                    Connecté
                </p>
            </a>
            <?php
        }else{
            ?>
            <a class="connexionHeader" href="#">
                <p>
                    Connection
                </p>
            </a>
            <?php
        }
        ?>

    </header>

    <div class="container">
    <?php
    if(!(sizeof($_SESSION)===0) && ($_SESSION['user'])){
        ?>
        <a href="../PHP/deco.php">
            <div class="icone">
                <i class="fas fa-user"></i>
            </div>
        </a>
        <?php
    }else{
        ?>
            <div class="icone">
                <i class="fas fa-user"></i>
            </div>
        <?php
    }
    ?>

    <!-- CONNEXION -->
    <div class="tab-body" data-id="connexion">
      <form method="post" action="../PHP/login.php">
        <div class="row">
          <i class="far fa-user"></i>
          <input type="text" class="input" placeholder="Pseudo" name="pseudo">
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" class="input" placeholder= "Mot de Passe" name="password">
        </div>

        <!-- MOT DE PASSE OUBLIE -->

        <a href="motDePasseOublie.php" class="link">Mot de passe oublié ?</a>

        <!-- BOUTTON CONNEXION-->

        <input type="submit" value="Connexion" class="btn">
      </form>
    </div>

    <!-- INSCRIPTION -->
    <div class="tab-body" data-id="inscription">
        <form method="post" action="../PHP/register.php">
        <div class="row">
          <i class="far fa-user"></i>
          <input type="text" class="input" placeholder="Pseudo" name="pseudo" maxlength="10">
        </div>
        <div class="row">
          <i class="far fa-envelope"></i>
          <input type="email" class="input" placeholder= "Email" name="adr">
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" class="input" placeholder= "Mot de Passe" name="password" minlength="12">
        </div>
        <input type="submit" value="Inscription" class="btn">
      </form>
    </div>

    <div class="tab-footer">
      <a class="tab-link active" data-ref="connexion" href="javascript:void(0)">Connexion</a>
      <a class="tab-link" data-ref="inscription" href="javascript:void(0)">Inscription</a>
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