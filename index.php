<?php
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
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/post.css">
    <script src="https://kit.fontawesome.com/f66cb7be42.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <title>Prompt</title>
</head>
<body>

<?php if (isset($_SESSION['user_mail'])) { ?>
    
<?php } else { ?>
    <div class="no-connected">
        <div class="no-connected-container">
            <p>Vous devez vous <span><a href="connexion.php" id="connected">connecter</a></span> afin de pouvoir poster !</p>
        </div>
    </div>

<?php } ?>

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
                <img src="Assets/user.svg" class="user-profile" alt="logo" height="80%" width="80%">

                    <div class="profile-action">

                        <div class="status">
                            <p id="pseudo">Pseudo</p>
                            <p id="connexion">Connecté</p>
                        </div>
                        
                        <div class="deconnexion">
                            <a href="deconnexion.php"><button class="deconnexion" type="reset"><i class="fa-solid fa-arrow-right-from-bracket fa-2xl" style="color: #ff4343;"></i></button></a>
                        </div>
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

    <button id="post-button" onclick="openModal()">
        <i class="fa-sharp fa-sharp fa-plus fa-fade fa-6x" style="color: black;"></i>
    </button>

    <div id="modal" class="post-container">
        <div class="modal-content">
            <span class="close" onclick="closeModal()"><i class="fa-solid fa-xmark fa-bounce fa-xl" style="color: #24242e;"></i></span>
            <form class="postForm" method="POST" action="insert-post.php">
            <textarea type="text" name="content" placeholder="une envie de partager ?"></textarea>
            <button type="submit" name="send-post"><i class="fa-regular fa-paper-plane fa-beat-fade fa-2xl" style="color: #24242e;"></i></button>
            <input type="hidden" name="name" value="<?= $_SESSION['user_name'] ?>">
            </form>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <p>© 2021 - Prompt</p>
        </div>
    </footer>
    
</body>
</html>