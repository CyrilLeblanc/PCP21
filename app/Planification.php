<?php

require_once "Ligne_c.php";
require_once "Covoiturage_c.php";


//on créer les dates pour les 6 prochains jours
$tab_date = array();
for($i = 0 ; $i < 6 ; $i++)
{
	$temp = strtotime('+'.$i.' days');
	$temp = gmdate("Y-m-d", $temp);
	array_push($tab_date, $temp);
}

//on créer les heurs de 8h à 19h
$tab_heure = array();
for($i = 8; $i <= 19; $i++)
{
	array_push($tab_heure, $i.":00:00");
}

foreach($tab_date as $date)
{
	foreach($tab_heure as $heure)
	{
		#############################
		#	Determination Aller		#
		#############################

		$sens = 0;
		$ligne = new Ligne(1, $sens);
		$ligne->set_covoitureur($date, $heure, $sens);

		// on associe pour chaque covoitureur leurs heure de retour
		if ($sens == 0)		// si c'est un aller
		{
			$tab_etape = &$ligne->get_ref_tab_etape();
			foreach($tab_etape as $etape)
			{
				$tab_covoitureur = &$etape->get_ref_tab_covoitureur();
				foreach($tab_covoitureur as $covoitureur)		// on associe les retours pour chaque covoitureur
				{
					$sql = "SELECT Heure_Arrivee FROM Inscription WHERE idCovoitureur = ".$covoitureur->get_id()." AND Date_Depart = '$date' AND is_Depart_Lycee = 1";
					$res = $GLOBALS['mysqli']->query($sql)->fetch_assoc();
					if (isset($res))
					{
						$covoitureur->set_heure_retour($res['Heure_Arrivee']);
					}
				}
			}
		}

		$covoiturage = new Covoiturage($ligne, $date, $heure, $sens);
		$covoiturage->save();
		$tab_covoiturage = array();
		array_push($tab_covoiturage, $covoiturage);
	}

	#################################
	#	Planification des retours 	#
	#################################
	// non codée pour le moment
}

?>