<header>
    <a href="../index.php">
        <img class="logo" src="../pictures/FindTheBreach.png" alt="IMG FindTheBreach">
    </a>
    <a class="title" href="../index.php">
        <h1>Find The Breach</h1>
    </a>
    <?php
    if(isset($_SESSION['user'])){
        ?>
        <a class="connexionHeader" href="../php/disconnection.php">
            <p>
                Se deconnecter
            </p>
        </a>
        <?php
    }else{
        ?>
        <a class="connexionHeader" href="pageConnection.php">
            <p>
                Connexion
            </p>
        </a>
        <?php
    }
    ?>
</header>
