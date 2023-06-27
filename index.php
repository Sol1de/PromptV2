<?php

session_start();

require "template/database.php";

//préparation
$requete = $database->prepare("SELECT * FROM post ORDER BY date DESC");

//éxecution
$requete->execute();

//tablaeau associatif
$posts = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/navstyle.css">
    <script src="https://kit.fontawesome.com/f66cb7be42.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <title>Prompt</title>
</head>
<body>
    <header>
        <div class="openbtn">
            <span class="openbtn" onclick="toggleNav()">&#9776;</span>
        </div>
        <div class="header-logo">
            <img src="Assets/prompt.svg" alt="logo" height="100" width="300">
        </div>
    </header>

    <div class="sidenav" id="mySidenav">
        <a href="index.php">Accueil</a>
        <a href="searching.php">Recherche</a>
        <a href="profile.php">Compte</a>
        <a href="about.php">Infos</a>
    </div>
    
    <div class="container">

        <main class="main">
            <?php foreach ($posts as $post) { ?>
                <div class="post">
                    <div class="username">
                    <img src="Assets/user.svg" class="profile-picture" alt="logo" height="65" width="65">
                        <div>
                            <p><?= $post['name']; ?></p>
                            <p class="time">le <?php

                            $date = new DateTime($post['date']);
                            echo $date->format('d/m/Y à H:i'); 
                            
                            ?></p>
                        </div>  
                    </div>
                    <div class="action-post">
                        <div class="action">
                            <a><i class="fa-regular fa-heart fa-2xl" style="color: black;"></i></a>
                            <a><i class="fa-solid fa-repeat fa-2xl" style="color: black;"></i></i></a>
                        </div>
                        <div class="content">
                            <p><?= $post['content'] ?></p>
                        </div>               

                    </div>

                </div>
            <?php } ?>

        </main>
        <aside class="aside">
            <div class="user">
                <img src="Assets/user.svg" class="user-profile" alt="logo" height="138" width="138">

                <div class="profile-action">

                    <div class="status">
                        <h1>Pseudo</h1>
                        <p>Connecté</p>
                    </div>

                </div>

                <div class="deconnexion">
                        <button type="reset"><i class="fa-solid fa-arrow-right-from-bracket fa-2xl" style="color: #ff4343;"></i></i></button>
                    </div>
                
            </div>
            <div class="search">
                <form method="GET" action="search.php">
                    <input class="searchbar" type="search" name="search" id="" placeholder="Rechercher"><button class="searchbutton"type="submit"><i class="fa-solid fa-magnifying-glass fa-xl" style="color: #626268;"></i></button>
                </form>
                <div class="search-result">
                    <p>Aucun resultats trouvé</p>
                </div>
            </div>
        </aside>
    </div>

    <footer>
        <div class="footer-content">
            <p>© 2021 - Prompt</p>
        </div>
    </footer>
    
</body>
</html>