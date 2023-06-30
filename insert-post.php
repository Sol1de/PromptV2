<?php
require 'template/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $name = $_POST['name'];
    $tag = $_POST['tag'];

    $insert = $database->prepare("INSERT INTO post (name, content, tag) VALUES (:Name, :Content, :Tag)");
    $insert->execute([
        "Name" => $name,
        "Content" => $content,
        "Tag" => $tag
    ]);

    // Redirection vers la page d'accueil après l'insertion du twoot
    header("Location: index.php");
    exit;
}
?>