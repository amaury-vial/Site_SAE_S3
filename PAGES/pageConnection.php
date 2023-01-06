<!--HTML W3C fait-->


<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/Style.css">
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
  <script src="../JS/index.js" defer></script>
  <title>FindTheBreach</title>
</head>

<body>

    <!-- HEADER -->
    <?php include("../FOOTER-HEADER/header.php") ?>

    <div class="container">
      <div class="icone">
          <i class="fas fa-user fa-4x"></i>
      </div>
    <!-- CONNEXION -->
    <div class="tab-body" data-id="connexion">
      <form method="post" action="../PHP/login.php">
        <div class="row">
          <i class="far fa-user fa-2x"></i>
          <input type="text" class="input" placeholder="Pseudo" name="pseudo">
        </div>
        <div class="row">
          <i class="fas fa-lock fa-2x"></i>
          <input type="password" class="input" placeholder= "Mot de Passe" name="password">

        </div>
          <?php
          if(isset($_SESSION['err'])){
              echo "<p style='color: red'> Utilisateur ou mot de passe incorrect</p>";
          }
          ?>

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
    <?php include("../FOOTER-HEADER/footer.php")?>
</body>
</html>