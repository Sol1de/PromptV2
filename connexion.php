<?php
    require_once("connexion-script.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://kit.fontawesome.com/f66cb7be42.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <script src="js/script.js"></script>
</head>
<body>
    <header>
        <span class="openbtn" onclick="toggleNav()"><i class="fa-solid fa-bars fa-3x" style="color: #ffffff;"></i></span>
        <div class="header-logo">
            <img src="Assets/prompt.svg" alt="logo">
        </div>
    </header>

    <div class="sidenav" id="mySidenav">
        <a href="index.php">Accueil</a>
        <a href="searching.php">Recherche</a>
        <a href="profile.php">Compte</a>
        <a href="about.php">Infos</a>
        <a href="connexion.php">Connexion</a>
    </div>

    <div class="container">

        <main>

            <h1>Connexion</h1>
            <form class="sign-in" method="POST" action="connexion-script.php">
                <input class="form" type="text" name="mail" placeholder="Mail">
                <input class="form" type="password" name="password" placeholder="Mot de passe">
                <div class="action-button">

                    <button class="send" type="submit">Se connecter</button> 
                    <a href="inscription.php" id="switch">Je n'ai pas de compte</a>

                </div>
            </form>
        </main>

    </div>

</body>
</html>