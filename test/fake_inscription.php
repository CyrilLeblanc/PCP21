<?php 
require_once '../config.php';

$date = date("Y-m-d");
$heure = "08:00:00";


// suppression des Inscriptions, Participation, Etape et Covoiturage dans la BDD
$sql = "DELETE FROM Inscription;
DELETE FROM Participation; 
DELETE FROM Etape;
DELETE FROM Covoiturage;";
$GLOBALS['mysqli']->query($sql);

$tab_covoitureur = array();
$sql = "SELECT Covoitureur.idCovoitureur, Covoitureur.idPoint_RDV, Composition.idLigne FROM Covoitureur
INNER JOIN Point_RDV ON Covoitureur.idPoint_RDV = Point_RDV.idPoint_RDV
INNER JOIN Composition ON Composition.idPoint_RDV = Point_RDV.idPoint_RDV
WHERE NOT Point_RDV.idPoint_RDV = 1 AND Covoitureur.is_Confirme = 1 AND Covoitureur.Utilisateur_Image = 'https://thispersondoesnotexist.com/image'
ORDER BY `Covoitureur`.`idCovoitureur` ASC";
$res = $GLOBALS['mysqli']->query($sql);
while ($row = $res->fetch_assoc())
{
	$already_present = False;
	foreach($tab_covoitureur as $covoitureur)
	{
		if ($covoitureur['idCovoitureur'] == $row['idCovoitureur'])
		{
			$already_present = True;
		}
	}
	if (!$already_present)
	{
		array_push($tab_covoitureur, $row);
	}
}

foreach($tab_covoitureur as $covoitureur)
{
	$idCovoitureur = $covoitureur['idCovoitureur'];
	do{
		#################################################
		#   Création / Détermination du Covoiturage     #
		#################################################

		$idLigne = $covoitureur['idLigne'];
		$sql = "SELECT idCovoiturage FROM Covoiturage WHERE Heure = '$heure' AND idLigne = $idLigne";
		$res = $GLOBALS['mysqli']->query($sql);

		// on détermine le jour de la semaine
		$tab_date = explode('-', $date);		// on sépare chaque élément de la date
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
		if (mysqli_num_rows($res) == 0)
		{
			$sql = "INSERT INTO Covoiturage (Jour, Heure, is_Depart_Lycee, idLigne) VALUES ('$jour_semaine', '$heure', 0, $idLigne)";
			$GLOBALS['mysqli']->query($sql);
		}
	} while (mysqli_num_rows($res) == 0);
	$idCovoiturage = $res->fetch_assoc()['idCovoiturage'];
	$res = null;
		###################################################
		#   Création / Détermination de l'Inscription     #
		###################################################
	do{
		$sql = "SELECT idInscription FROM Inscription \n".
		"WHERE idCovoitureur = $idCovoitureur AND \n".
		"idCovoiturage = $idCovoiturage AND \n".
		"Date_Depart = '$date' AND \n".
		"Heure_Arrivee = '$heure';";
		$res = $GLOBALS['mysqli']->query($sql);
		
		if (mysqli_num_rows($res) == 0)
		{
			$sql = "INSERT INTO Inscription (idCovoitureur, idCovoiturage, Date_Depart, Heure_Arrivee) VALUES \n".
			"($idCovoitureur, $idCovoiturage, '$date', '$heure');";
			$GLOBALS['mysqli']->query($sql);
		}
	} while (mysqli_num_rows($res) == 0);
}



?>