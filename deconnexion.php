<?php

session_start();
// on kill la session pour déconnecter l'utilisateur
session_destroy();

// redirection vers la page d'accueil après la déconnexion
header("Location: index.php");
exit;

?>