<?php
session_start();

if (!isset($_POST['nom'],$_POST['prenom'],$_POST['num_telephone'],$_POST['email'],$_POST['password']))
{
    header('Location: ../../?erreur=true');
    exit;
}



include('../../config.php');
$_SESSION['_Covoitureur']['Nom'] = $_POST['nom'];
$_SESSION['_Covoitureur']['Prenom'] = $_POST['prenom'];
$_SESSION['_Covoitureur']['Num_Telephone'] =$_POST['num_telephone'];
$_SESSION['_Covoitureur']['Email'] = $_POST['email'];
$_SESSION['_Covoitureur']['Mot_De_Passe'] = password_hash($_POST['password'], PASSWORD_DEFAULT);


header("Location: ../Ajout_Vehicule/Ajout_Vehicule.php");
?>
