<?php

// Ce script redirige le covoitureur sur l'accueil si il est connecté ou sur la page de connexion si il ne l'est pas

session_start();
if(isset($_SESSION['idCovoitureur']) && $_SESSION['idCovoitureur'] != null)
{
    header("Location: ./accueil");
} else {
    header("Location: ./login/connect.php");
}

?>