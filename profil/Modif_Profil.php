<?php
session_start();

$idCovoitureur = $_SESSION['idCovoitureur'];

$Nom = $_POST['Nom'];
$Prenom = $_POST['Prenom'];
$Email = $_POST['Email'];
$NumTelephone = $_POST['Telephone'];

$Marque = $_POST['Marque'];
$Modele = $_POST['Modele'];
$Annee = $_POST['Annee'];
$Type = $_POST['Type'];
$Couleur = $_POST['Couleur'];

$mdp = $_POST['MotDePasseActuelle'];
$NouveauMDP = $_POST['NouvMotDePasse'];
$ConfirmeMDP = $_POST['ConfMotDePasse'];

$PointFav = $_POST[''];

//Modifier information personnelle

if(isset($Nom) || isset($Prenom) || isset($NumTelephone) || isset($Email))
{
	$sql = "";

	$GLOBALS['mysqli']->query($sql);

    echo 'sql';
}
else
{
    echo 'pas bon';
}

?>