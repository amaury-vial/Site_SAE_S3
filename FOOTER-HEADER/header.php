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
