<?php
session_start();
if(!isset($_SESSION['idCovoitureur']) && !(bool)$_SESSION['is_Webmaster'])
{
    header("Location: ./accueil?try_access_wb=true");
}

?>