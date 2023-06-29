<?php
require 'template/database.php';

//$insert = $database -> prepare("INSERT INTO tweet (contenu) VALUES (:Contenu) ");
//insert tweet with tag
$insert = $database -> prepare("INSERT INTO post (content) VALUES (:Content) ");
$insert -> execute(
    [
        "Content" => $_POST['content'],
    ]

);

header("Location: index.php"); ?>