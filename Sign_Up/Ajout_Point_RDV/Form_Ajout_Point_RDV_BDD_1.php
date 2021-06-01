<?php
include('./bootstrap.html');
include('./config.php');

$ = $_POST['nom_point'];
$ = $_POST['Adresse'];
$ = $_POST['Longitude'];
$ = $_POST['Latitude'];


$sql = "INSERT INTO `point_rdv`(`idPoint_RDV`, `Nom`, `Adresse`, `Latitude`, `Longitude`, `Point_Image`, `is_Confirme`) 
		VALUES (1,'$nom_point','$Adresse','$Longitude','$Latitude',NULL,0)";

$mysqli->query($sql);
header("Location: pop_up.php");
?>