<?php
session_start();

if (!isset($_POST['marque'],$_POST['modele'],$_POST['couleur'],$_POST['annee'],$_POST['nbr_place']))
{
	header("Location: ../../?erreur=true");
	exit;
}


$_SESSION['_Voiture']['Marque'] = $_POST['marque'];
$_SESSION['_Voiture']['Modele'] = $_POST['modele'];
$_SESSION['_Voiture']['Couleur'] = $_POST['couleur'];
$_SESSION['_Voiture']['Annee'] = $_POST['annee'];
$_SESSION['_Voiture']['Nbr_Place'] = (int)$_POST['nbr_place'];


header("Location: ../Ajout_Point_RDV/");
?>