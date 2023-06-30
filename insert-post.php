<?php
require 'template/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $name = $_POST['name'];

    $insert = $database->prepare("INSERT INTO post (name, content) VALUES (:Name, :Content)");
    $insert->execute([
        "Name" => $name,
        "Content" => $content
    ]);

    // Redirection vers la page d'accueil après l'insertion du twoot
    header("Location: index.php");
    exit;
}
?>