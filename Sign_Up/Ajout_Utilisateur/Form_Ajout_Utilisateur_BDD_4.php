<?php
include('./bootstrap.html');
include('./config.php');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$num_telephone =$_POST['num_telephone'];
$email = $_POST['email'];
$mot_de_passe = $_POST['password'];

$sql = "INSERT INTO `covoitureur`(`idCovoitureur`, `Nom`, `Prenom`, `Utilisateur_Image`, `Num_Telephone`, `Email`, `Mot_De_Passe`, `Nbr_Alveoles`, `is_Confirme`, `is_Webmaster`, `idPoint_RDV`) 
		VALUES (NULL,'$nom','$prenom',NULL,'$num_telephone','$email','$mot_de_passe',0,0,0,NULL)";

$mysqli->query($sql);
header("Location: Ajout_Vehicule.php");
?>
