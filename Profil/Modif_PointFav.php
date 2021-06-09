<?php

session_start();
require_once '../config.php';

$idCovoitureur = $_SESSION['idCovoitureur'];

$PointFav = $_POST['PointFavori'];

if(isset($PointFav))
{
	$sql= "UPDATE Covoitureur SET idPoint_RDV=$PointFav WHERE idCovoitureur = $idCovoitureur";

       $res = $GLOBALS['mysqli'] ->query($sql);
       
}

if (!isset($erreur))
{
	header('Location: ./');
} else {
	header('Location: ../?erreur='.$erreur);
}
?>