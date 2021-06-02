<?php
require_once './config.php';
#  Script déconnectant le client de son navigateur web

session_start();
$_SESSION['idCovoitureur'] = null;

// Suppression de la session
session_reset();
session_destroy();

// Suppression du token dans la BDD
$token = $_COOKIE['token'];
$sql = "DELETE FROM Token WHERE Content = '$token';";
setcookie('token',$token,time()+3600*24*30, '/');
$GLOBALS['mysqli']->query($sql);

// redirection sur la page de connexion
header("Location: ./login?disconnect=success");
?>