<!--HTML W3C fait-->

<?php
// php STAN 9
session_start();
?>
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

    <div class="container">

        <div class="tab-body" data-id="passwordForget">

            <p>Recuperation de mot de passe</p>

            <!-- Form to redeem the password -->
            <form method="post" action="../php/forgot-password.php">

                <div class="row">
                    <i class="far fa-envelope"></i>
                    <!-- Write the email-->
                    <input type="email" class="input" placeholder="Email" name="mail" required="required">
                </div>

                <input type="submit" value="Valider" class="btn">

            </form>

        </div>

        <div class="tab-footer">
            <a class="tab-link active" data-ref="passwordForget" href="javascript:void(0)"></a>
        </div>

    </div>

    <?php include("../footer-header/footer.php") ?>

</body>
</html>