<?php
require 'template/database.php';

$supp = $database -> prepare("DELETE FROM post WHERE id = :id");
$supp -> execute(
    [
        "id" => $_POST['supp']
    ]
);

header("Location: index.php");