<?php
require_once "Ligne_c.php";
require_once "Covoiturage_c.php";

$tab_date = array("2021-04-12");
$tab_heure = array("12:00:00");
$is_depart_lycee = array(0,1);			// TODO


foreach($tab_date as $date)
{
	foreach($tab_heure as $heure)
	{
		foreach( $is_depart_lycee as $sens)
		{
			$ligne = new Ligne(1, $sens);
			$ligne->set_covoitureur($date, $heure, $sens);

			// on vérifie que les covoitureurs veulent un retour ou non
			if ($sens == 0)		// si c'est un aller
			{
				$tab_etape = &$ligne->get_ref_tab_etape();
				foreach($tab_etape as $etape)
				{
					$tab_covoitureur = &$etape->get_ref_tab_covoitureur();
					foreach($tab_covoitureur as $covoitureur)
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
				echo "\n\n\n\n\n\n\n\n\n\n";
			}
		}
	}
}



?>