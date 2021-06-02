<?php
session_start();
if(!isset($_SESSION['idCovoitureur']))
{
    header("Location: ./disconnect.php");
}

?>