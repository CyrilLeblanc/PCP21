<?php

#  Script déconnectant le client de son navigateur web

session_start();
$_SESSION['idCovoitureur'] = null;

// Suppression de la session
session_reset();
session_destroy();

// Suppression du token
setcookie("token", "", time() - 3600);

// redirection sur la page de connexion
header("Location: ./login?disconnect=success");
?>