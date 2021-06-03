<?php
session_start();
if($_SESSION['idCovoitureur'] == null)
{
    header("Location: ../disconnect.php");
}

?>