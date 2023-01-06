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
    if(isset($_SESSION['user'])){
        ?>
        <a class="connexionHeader" href="../PHP/deco.php">
            <p>
                Se deconnecter
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
