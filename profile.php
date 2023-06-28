<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <script src="https://kit.fontawesome.com/f66cb7be42.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <title>Document</title>
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
    </div>

    <main>
        <div class="right-side">
             <div class="infos-user">

                <img src="Assets/user.svg" class="profile-image" alt="logo">

                <div class="status">

                    <p id="pseudo">Pseudo</p>
                    <p id="connexion">Connecté <button class="deconnexion" type="reset"><i class="fa-solid fa-arrow-right-from-bracket fa-2xl" style="color: #ff4343;"></i></button></p>

                </div>

                <div class="more-infos">
                    <ul>
                        <li>Mail : <p id="mail"></p></li>
                        <li>Créé le : <p id="creation"></p></li>
                        <li>Mdp : <p id="mdp"></p></li>
                    </ul>

                </div>

            </div>

            <div class="post-history">

            </div>

        </div>

        
        <div class="left-side">

        </div>
    </main>


</body>
</html>