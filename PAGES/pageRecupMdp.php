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
      
    </header>

    <!-- LOGO -->
  <div class="container">

    <!--  -->
    <div class="tab-body" data-id="connexion">
        <h1>
            Mot de Passe Oublié
        </h1>
      <form method="post" action="../PHP/token.php">
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
    <footer>
        <p class="credits">Find the breach © 2022-2023</p>
        <div class="footer_contact">
            <a class="mailto" href="mailto:findthebreach.noreply@gmail.com">Send mail</a>
        </div>
    </footer>
</body>
</html>