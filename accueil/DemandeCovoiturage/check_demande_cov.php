<?php
session_start();


$date_depart = $_POST['date_depart'];
$semaine = '';
$destination = 0;
$heure_arrive = $_POST['heure_arrive'];
$idCovoitureur = $_SESSION['idCovoitureur'];

$tab_date = explode('-', $date_depart);		// on sépare chaque élément de la date
$timestamp = mktime(0, 0, 0, $tab_date[1], $tab_date[2], $tab_date[0]);		// on créer la date à partir des éléments séparé
$tab_jourSemaine = array(
	1 => "lundi",
	2 => "mardi",
	3 => "mercredi",
	4 => "jeudi",
	5 => "vendredi",
	6 => "samedi",
	7 => "dimanche"
);
$jour_semaine = $tab_jourSemaine[date('w', $timestamp)];		// on récupère le jour de la semaine!




require_once '../../config.php';
require_once '../../request/Covoitureur.php';


	##################################
	#       Obtention IdLigne        #
	##################################

$sql = "SELECT idLigne FROM Composition ".
"INNER JOIN Covoitureur ON Covoitureur.idPoint_RDV = Composition.idPoint_RDV ".
"WHERE Covoitureur.idCovoitureur = $idCovoitureur";

$idLigne = (int)$GLOBALS['mysqli']->query($sql)->fetch_assoc()['idLigne'];
	
	#########################################
	#       Génération IdCovoiturage        #
	#########################################

do 
{
	$sql = "SELECT idCovoiturage FROM Covoiturage WHERE Jour = '$jour_semaine' AND Heure = '$heure_arrive' AND is_Depart_Lycee = $destination AND idLigne = $idLigne;";

	$res = $GLOBALS['mysqli']->query($sql);
	if(mysqli_num_rows($res) == 0)
	{
		$sql = "INSERT INTO Covoiturage(Jour, Heure, is_Depart_Lycee, idLigne) VALUES ('$jour_semaine', '$heure_arrive', '$destination', '$idLigne');";
		$GLOBALS['mysqli']->query($sql);
	}
}
while(mysqli_num_rows($res) == 0);

$idCovoiturage = $res->fetch_assoc()['idCovoiturage'];

	#########################################
	#       Generation de L'inscription     #
	#########################################

if(isset($date_depart) && isset($semaine) && isset($destination) && isset($jour_semaine) && isset($heure_arrive))
{
	$sql = "INSERT INTO Inscription (idCovoitureur,idCovoiturage, Date_Depart, Semaine, is_Unique, is_Depart_Lycee, Jour_Semaine, Heure_Arrivee) ".
	"VALUES ($idCovoitureur, $idCovoiturage, '$date_depart', '$semaine', 1, $destination, '$jour_semaine', '$heure_arrive');";
	$GLOBALS['mysqli']->query($sql);
}


if (!isset($erreur))
{
	header('Location: ../../');
} else {
	header('Location: ../../?erreur='.$erreur);
}

