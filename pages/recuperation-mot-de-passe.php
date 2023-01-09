<!--HTML W3C fait-->
<!--PHP STAN 9-->
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/main.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
  <script src="../js/index.js" defer></script>
  <title>FindTheBreach</title>
</head>

<body>

    <!-- HEADER -->
    <?php include("../footer-header/header.php") ?>

    <!-- LOGO -->
  <div class="container">

    <!--  -->
    <div class="tab-body" data-id="connexion">
        <h1>
            Mot de Passe Oublié
        </h1>
      <form method="post" action="../php/token.php">
        <div class="row">
            <i class="fas fa-lock"></i>
          <input type="number" class="input" placeholder="Token" name="token" min="1000" max="9999">
        </div>
        <div class="row">
            <i class="far fa-envelope"></i>
          <input type="email" class="input" placeholder= "eMali" name="password">
        </div>
        <input type="submit" value="Valider" class="btn">
      </form>
    </div>
    <div class="tab-footer">
      <a class="tab-link active" data-ref="connexion" href="javascript:void(0)"></a>
    </div>
  </div>
    <?php include("../footer-header/footer.php") ?>
</body>
</html>
