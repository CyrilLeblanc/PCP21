<?php
session_start();

if (!isset($_POST['nom_point'],$_POST['Adresse'],$_POST['Longitude'],$_POST['Latitude']))
{
	header("Location: ../../?erreur=true");
	exit;
}

$_SESSION['_Point_RDV']['Nom'] = $_POST['nom_point'];
$_SESSION['_Point_RDV']['Adresse'] = $_POST['Adresse'];
$_SESSION['_Point_RDV']['Longitude'] = $_POST['Longitude'];
$_SESSION['_Point_RDV']['Latitude'] = $_POST['Latitude'];

header("Location: pop_up.php");
?>