<?php

session_start();
require_once '../config.php';

$idCovoitureur = $_SESSION['idCovoitureur'];

$Nom = $_POST['Nom'];
$Prenom = $_POST['Prenom'];
$Email = $_POST['Email'];
$NumTelephone = $_POST['Telephone'];

/*
$Marque = $_POST['Marque'];
$Modele = $_POST['Modele'];
$Annee = $_POST['Annee'];
$Type = $_POST['Type'];
$Couleur = $_POST['Couleur'];

$mdp = $_POST['MotDePasseActuelle'];
$NouveauMDP = $_POST['NouvMotDePasse'];
$ConfirmeMDP = $_POST['ConfMotDePasse'];

$PointFav = $_POST['PointFavori'];
*/

//Modifier information personnelle

if(isset($Nom))
{
	$sql = "UPDATE Covoitureur SET Nom='$Nom' WHERE idCovoitureur=$idCovoitureur";

	$GLOBALS['mysqli']->query($sql);
    
}

if(isset($Prenom))
{
	$sql = "UPDATE Covoitureur SET Prenom='$Prenom' WHERE idCovoitureur=$idCovoitureur";

	$GLOBALS['mysqli']->query($sql);

}

if(isset($Email))
{
	$sql = "UPDATE Covoitureur SET Email='$Email' WHERE idCovoitureur=$idCovoitureur";

	$GLOBALS['mysqli']->query($sql);
    
}

if(isset($NumTelephone))
{
	$sql = "UPDATE Covoitureur SET Num_Telephone='$NumTelephone' WHERE idCovoitureur=$idCovoitureur";

	$GLOBALS['mysqli']->query($sql);

}

if (!isset($erreur))
{
	header('Location: ./');
} else {
	header('Location: ../?erreur='.$erreur);
}


?>