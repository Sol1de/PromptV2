<?php

require 'template/database.php';

$insert = $database -> prepare("INSERT INTO user (mail, name, password) VALUES (:Mail, :Name, :Password) ");
$insert -> execute(
    [
        "Mail" => $_POST['mail'],
        "Name" => $_POST['name'],
        "Password" => password_hash($_POST['password'], PASSWORD_BCRYPT)

    ]

);

header("Location: index.php"); ?>