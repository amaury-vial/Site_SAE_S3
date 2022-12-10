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
            <p>
                Find The Breach
            </p>
        </a>
        <?php
        if(!(sizeof($_SESSION)===0) && ($_SESSION['user'])){
            ?>
            <a class="connexionHeader" href="pageConnection.php">
                <p>
                    Connecté
                </p>
            </a>
            <?php
        }else{
            ?>
            <a class="connexionHeader" href="pageConnection.php">
                <p>
                    Connection
                </p>
            </a>
            <?php
        }
        ?>
    </header>

  <div class="container">
    
    <!-- mot de passe oublie -->
    <div class="tab-body" data-id="mdpOublie">
      <p>Recuperation de mot de passe</p>
      <form method="post" action="../PHP/mdp_oublie.php">
        <div class="row">
          <i class="far fa-envelope"></i>
          <input type="email" class="input" placeholder="Email" name="mail" required="required">
        </div>
        <input type="submit" value="Valider" class="btn">
      </form>
    </div>
    <div class="tab-footer">
      <a class="tab-link active" data-ref="mdpOublie" href="javascript:void(0)"></a>
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