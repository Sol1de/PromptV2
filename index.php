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
    <script src="https://kit.fontawesome.com/f66cb7be42.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <img src="Assets/prompt.svg" alt="logo" height="100" width="300">
    </header>
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
                //contenu de l'utilisateur
            </div>
            <div class="search">
                <form method="GET" action="search.php">
                    <input class="searchbar" type="search" name="search" id="" placeholder="Rechercher"><button class="searchbutton"type="submit"><i class="fa-solid fa-magnifying-glass fa-xl" style="color: #626268;"></i></button>
                </form>
                <div class="search-result">
                    //resultat de la recherche
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