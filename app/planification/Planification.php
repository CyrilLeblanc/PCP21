<?php
require_once "Ligne_c.php";
require_once "Covoiturage_c.php";

$tab_date = array("2021-04-12");
$tab_heure = array("12:00:00");
$is_depart_lycee = array(0);			// TODO

$tab_covoitureur_retour = array();

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

		while (sizeof($ligne->get_population()) > 0)
		{
			$covoiturage = new Covoiturage($ligne, $date, $heure, $sens);
			foreach($covoiturage->get_tab_covoitureur_retour() as $covoitureur)
			{
				array_push($tab_covoitureur_retour, $covoitureur);
			}
			echo "\n\n\n\n\n\n\n\n\n\n";
		}
	}
	foreach($tab_covoitureur_retour as $covoitureur)	#DEBUG
	{
		echo "#" . $covoitureur->get_id() . " \t home : " . $covoitureur->get_idPoint_home() . " \t voiture_at : " . $covoitureur->get_voiture_at_point() . "  \t heure_retour : " . $covoitureur->get_heure_retour() . "\n";
	}
	echo "\n\n\n\n\n";

	#########################################################
	#	Injection des covoitureurs voulant simple retour	#
	#########################################################

	#TODO

	#########################################
	#	Détermination des heures de retour	#
	#########################################

	// pour chaque heure_retour de chaque covoitureur on ajoute les heure_retour dans $tab_heure_retour si il n'y est pas déjà
	$tab_heure_retour = array();
	foreach($tab_covoitureur_retour as $covoitureur)	
	{
		$heure_already_exist = false;
		foreach($tab_heure_retour as $heure_retour)
		{
			if($covoitureur->get_heure_retour() == $heure_retour)
			{
				$heure_already_exist = true;
			}
		}

		if (!$heure_already_exist)
		{
			array_push($tab_heure_retour, $covoitureur->get_heure_retour());
		}
	}

	// trie de $tab_heure_retour dans l'ordre croissant des heures

	// on récupère d'abord les heure simple exemple : "13:00:00" => "13"
	$tab = array();
	foreach($tab_heure_retour as $heure)
	{
		array_push($tab, $heure[0].$heure[1]);
	}
	
	// trie des heures par bubble sort
	for($i=0; $i<sizeof($tab)-1; $i++) {
		for($j=0; $j<(sizeof($tab)-1-$i); $j++) {
			if ($tab[$j] > $tab[$j+1]) {
				$temp = $tab[$j+1];
				$tab[$j+1] = $tab[$j];
				$tab[$j] = $temp;
			}
		}
	}

	// pour chaque heure on retourne à un format heure normal exemple "13" => "13:00:00"
	foreach($tab as $j => $heure)
	{
		$tab[$j] .= ":00:00";
	}

	$tab_heure_retour = $tab;
	
	$tab = array();
	foreach($tab_heure_retour as $heure)			// on créer pour chaque heure un tableau associatif 
	{
		array_push($tab, array(	"heure" => $heure, 
								"covoitureur" => array()));
	}

	$tab_heure_retour = $tab;

	#############################
	#	Trie des covoitureur	#
	#############################

	// on trie les covoitureurs en fonction de leurs heures de retour 
	foreach($tab_covoitureur_retour as $covoitureur)
	{
		foreach($tab_heure_retour as $j => $heure)
		{
			if($covoitureur->get_heure_retour() == $heure["heure"])
			{
				array_push($tab_heure_retour[$j]["covoitureur"], $covoitureur);
				continue;
			}
		}
	}
	// ensuite on les tries en fonction de accès à leurs voiture ou non


	foreach($tab_heure_retour as $heure)
	{
		echo "\n". $heure["heure"] . "\n";
		foreach($heure["covoitureur"] as $covoitureur)
		{
			echo "#".$covoitureur->get_id() . "\t home : " . $covoitureur->get_idPoint_home() ."\t voiture_at : ". $covoitureur->get_voiture_at_point() ."\n";
		}
		echo "\n";
	}


	#############################
	#	Création des retours 	#
	#############################

	foreach($tab_heure_retour as $heure)
	{
		// on injecte les covoitureurs au premier point de la ligne pour ensuite créer les covoiturages avec la classe Covoiturage
	}

}





?>