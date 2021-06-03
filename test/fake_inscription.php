<?php 
require_once '../config.php';

$nb_inscription = 20;

$tab_date = array();
$tab_heure = array();

// création des heures
for($i = 8; $i <= 19; $i++)
{
	array_push($tab_heure, $i.":00:00");
}

// création des dates
for($i = 0 ; $i < 6 ; $i++)
{
	$temp = strtotime('+'.$i.' days');
	$temp = gmdate("Y-m-d", $temp);
	array_push($tab_date, $temp);
}

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
WHERE NOT Point_RDV.idPoint_RDV = 1 AND Covoitureur.is_Confirme = 1
ORDER BY `Covoitureur`.`idCovoitureur` ASC";
echo "$sql\n";
$res = $GLOBALS['mysqli']->query($sql);
while ($row = $res->fetch_assoc())
{
    array_push($tab_covoitureur, $row);
}



foreach($tab_covoitureur as $j => $covoitureur)
{
    //$tab_covoitureur[$j]['date'] = $tab_date[rand(0,sizeof($tab_date)-1)];
    $tab_covoitureur[$j]['date'] = $tab_date[rand(0,2)];
    //$tab_covoitureur[$j]['heure'] = $tab_heure[rand(0, sizeof($tab_heure)-1)];
    $tab_covoitureur[$j]['heure'] = $tab_heure[rand(0,2)];
}


foreach($tab_covoitureur as $covoitureur)
{
    do{
        // on cherche un covoiturage
        $idLigne = $covoitureur['idLigne'];
        $heure = $covoitureur['heure'];
        $date = $covoitureur['date'];
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
            echo "$sql\n";
            $GLOBALS['mysqli']->query($sql);
        }
        
    } while (mysqli_num_rows($res) != 0);

}



?>