<?php
include('./bootstrap.php');
include('./config.php');

$marque = $_POST['marque'];
$modele = $_POST['modele'];
$couleur = $_POST['couleur'];
$annee = $_POST['annee'];
$nbr_Place = $_POST['nbr_Place'];

$sql = "INSERT INTO `voiture`(`idVoiture`, `Modele`, `Marque`, `Annee`, `Couleur`, `Nbr_Place`, `Voiture_Image`, `idCovoitureur`) 
		VALUES (NULL,'$modele','$marque','$annee','$couleur',$nbr_Place,NULL,NULL)";

$mysqli->query($sql);
header("Location: Ajout_Point_RDV.php");
?>