<?php
    require 'template/database.php';


    // vérifier si utilisateur connecté
    if (!isset($_SESSION['user_id'])) {
        header("Location: connexion.php");
        exit;
    }

    // informations de la session de l'utilisateur
    $user_id = $_SESSION['user_id'];
    $user_mail = $_SESSION['user_mail'];
    $user_name = $_SESSION['user_name'];

    //préparation 
    $requete = $database->prepare("SELECT * FROM user WHERE id = :user_id");

    //éxecution
    $requete->execute(['user_id' => $user_id]);

    //tablaeau associatif
    $user_info = $requete->fetch(PDO::FETCH_ASSOC);

    // informations de general de l'utilisateur
    $user_name = $user_info['name'];
    $user_date = $user_info['creation'];
?>


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
        <a href="connexion.php">Connexion</a>
    </div>

    <main>
        <div class="right-side">
             <div class="infos-user">

                <img src="Assets/user.svg" class="profile-image" alt="logo">

                <div class="status">

                    <p id="pseudo"><?php echo $user_name; ?></p>
                    <p id="connexion">Connecté <a href="deconnexion.php"><button class="deconnexion" type="submit"><i class="fa-solid fa-arrow-right-from-bracket fa-2xl" style="color: #ff4343;"></i></button></a></p>

                </div>

                <div class="more-infos">
                    <ul>
                        <li>Mail : <?php echo $user_mail; ?></li>
                        <li>Créé le : <?php echo $user_date; ?></li>
                        <li>ID utilisateur : #<?php echo $user_id; ?></li>
                    </ul>

                </div>

            </div>
            
            <div class="post-history">
                    <div class="content-post-history">
 
                    </div>

            </div>

        </div>

        
        <div class="left-side">

            <div class="search">
                <form class="form-searchbar" method="GET" action="search.php">
                    <input class="searchbar" type="search" name="search" id="" placeholder="Rechercher"><button class="searchbutton"type="submit"><i class="fa-solid fa-magnifying-glass fa-xl" style="color: #626268;"></i></button>
                </form>

                <div class="search-result">
                    <p>Aucun resultats trouvé</p>
                </div>

            </div>

        </div>
    </main>


</body>
</html>