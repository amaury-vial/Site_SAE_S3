<!--HTML W3C fait-->

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"> </script>
    <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
    <script src="../js/index.js" defer></script>
    <title>FindTheBreach</title>
</head>

<body>

<!-- HEADER -->
<?php include("../footer-header/header.php") ?>

<div class="container">

    <div class="icone">
        <i class="fas fa-user fa-4x"></i>
    </div>
    <div class="tab-body" data-id="connexion">

        <form method="post" action="../php/login.php">

            <div class="row">
                <!-- Pseudo entry -->
                <i class="far fa-user fa-2x"></i>
                <input type="text" class="input" placeholder="Pseudo" name="nickname">
            </div>

            <!-- Password entry -->
            <div class="row">
                <i class="fas fa-lock fa-2x"></i>
                <input type="password" class="input" placeholder= "Mot de Passe" name="password">
            </div>

            <?php
            // If the password is invalid //
            if(isset($_SESSION['err'])){
              echo "<p style='color: red'> Utilisateur ou mot de passe incorrect</p>";
            }
            ?>

            <a href="mot-de-passe-oublie.php" class="link">Mot de passe oublié ?</a>

            <input type="submit" value="Connexion" class="btn">

        </form>
    </div>


    <!-- Tag for registration -->
    <div class="tab-body" data-id="register">

        <form method="post" action="../php/register.php">

            <!-- Pseudo entry -->
            <div class="row">
                <i class="far fa-user"></i>
                <input type="text" class="input" placeholder="Pseudo" name="nickname" maxlength="10" required>
            </div>

            <!-- Email entry -->
            <div class="row">
                <i class="far fa-envelope"></i>
                <input type="email" class="input" placeholder= "Email" name="mail" required>
            </div>

            <!--Password entry-->
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" class="input" placeholder= "Mot de Passe" name="password" minlength="12" required>
            </div>

            <div>
                <input type="checkbox" id="mention legale" name="language" value="mention legale" required>
                <label for="mention legale">J'accepte les <a href="../footer-header/mentions_legales.txt">mentions légale</a></label>
            </div>
            

            <!-- Button to validate the registration -->
            <input type="submit" value="Inscription" class="btn">

        </form>
    </div>

    <div class="tab-footer">

        <a class="tab-link active" data-ref="connexion" href="javascript:void(0)">Connexion</a>
        <a class="tab-link" data-ref="register" href="javascript:void(0)">Inscription</a>

    </div>

</div>

<?php include("../footer-header/footer.php") ?>

</body>
</html>
