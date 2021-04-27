<?php

#
#	Codeur : Cyril
#	Description : 
#		Créer tout les covoiturages et les enregistres automatiquement
#
#

require_once "config.php";
require_once "Voiture_c.php";

class Covoiturage
{
	public $ligne;

	private $tab_etape = array();		// tableau qui contient les covoiturages créers pour les enregistrers


	function __construct(&$ligne, $date, $heure, $is_depart_lycee)
	{
		foreach($ligne->tab_etape as $k => $etape)
		{
			// on regarde si il y a des gens sur cette étape
			if (sizeof($etape->Point_A->tab_covoitureur) < 1)
			{
				continue;
			}
			echo "####################\n";
			echo "\t ETAPE ".$etape->Point_A->id." ~ ".$etape->Point_B->id."\n\n";
	
			#####################################
			#	Détermination du Conducteur		#
			#####################################


			$conducteur = null;
			$etape->voiture = null;



			foreach($etape->Point_A->tab_covoitureur as $j => $covoitureur)
			{
				if (isset($covoitureur) && $covoitureur->have_voiture)
				// on cherche un covoitureur avec une voiture en partant des plus pauvres
				{
					$conducteur = $covoitureur;
					$etape->voiture = new Voiture($conducteur);
					unset($etape->Point_A->tab_covoitureur[$j]);

					// on ajoute le conducteur à sa voiture
					array_push($etape->voiture->tab_passager, $conducteur);
					$etape->voiture->place_restante--;
					echo "#Voiture de : $conducteur->id \t$= $covoitureur->Nbr_Alveole\t\t want_retour : $covoitureur->heure_retour\n".
					"idVoiture : ".$etape->voiture->id."\t nb_place : ".$etape->voiture->place_restante."\n\n";
					break;
				}
			}


			#################################
			#	Remplissage de la voiture	#
			#################################

			// on trie les covoitureurs sur l'étape pour avoir en priorité les plus riches en alvéoles
			
			// par bubble sort
			$tab = $etape->Point_A->tab_covoitureur;
			$this->combler_tab($tab);

			
			for($i=0; $i<sizeof($etape->Point_A->tab_covoitureur)-1; $i++) {
				for($j=0; $j<(sizeof($etape->Point_A->tab_covoitureur)-1-$i); $j++) {
					if ($tab[$j]->Nbr_Alveole > $tab[$j+1]->Nbr_Alveole ) {
						$temp = $tab[$j+1];
						$tab[$j+1] = $tab[$j];
						$tab[$j] = $temp;
					}
				}
			}

			$etape->Point_A->tab_covoitureur = $tab;

			// on trie le tableau des covoitureurs sur l'étape pour avoir en priorité les covoitureurs sans voitures et ensuite les plus riches
			
				foreach($etape->Point_A->tab_covoitureur as $j => $covoitureur)
				{
					if ($covoitureur->have_voiture)
					{
						array_push($etape->Point_A->tab_covoitureur, $covoitureur);
						unset($etape->Point_A->tab_covoitureur[$j]);
					}
				}



			foreach($etape->Point_A->tab_covoitureur as $j => $covoitureur)
			{
				if((isset($conducteur) && $etape->voiture->place_restante > 1) || sizeof($etape->Point_A->tab_covoitureur) == 1)		# NOTE : On utilise toute les place que si il ne reste qu'une personne sur le point
				{					
					echo "#ID : $covoitureur->id  \t$ = $covoitureur->Nbr_Alveole\t\t\t want_retour : $covoitureur->heure_retour\n";
					$covoitureur->have_voiture = False;							// on retire l'accès à la voiture du covoitureur passager
					array_push($etape->voiture->tab_passager, $covoitureur);
					$etape->voiture->place_restante--;
					unset($etape->Point_A->tab_covoitureur[$j]);
				}
			}

			#####################################################
			#	Déplacement des passager à la prochaine étape	#
			#####################################################

			if (isset($ligne->tab_etape[$k+1]) && isset($etape->voiture))
			{
				foreach($etape->voiture->tab_passager as $passager)
				{
					// on ajoute les covoitureur seulement si il n'y sont pas déjà
					$is_already_here = False;
					foreach($ligne->tab_etape[$k+1]->Point_A->tab_covoitureur as $covoitureur)
					{
						if ($covoitureur == $passager)
						{
							$is_already_here = True;
						}
					}

					if (!$is_already_here)
					{
						array_push($ligne->tab_etape[$k+1]->Point_A->tab_covoitureur, $passager);
					}
					
				}
				$etape->voiture->kilometrage = $etape->distance;
			}
			echo "\n\n\n";
			$this->save($etape,$ligne->id, $is_depart_lycee, $date, $heure);
		}	
	}


	function combler_tab(&$tab)							// non utilisé
	// permet de retirer les index vide d'un tableau
	{
		$temp = array();
		foreach($tab as $value)
		{
			if (isset($value))
			{
				array_push($temp, $value);
			}
		}
		$tab = $temp;
	}


	function save($etape, $idLigne, $is_depart_lycee, $date, $heure)
	#TODO
	{

		/*#####################################################
		#	Détermination de l'idCovoiturage dans la BDD	#
		#####################################################

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

		$jour_semaine = $tab_jourSemaine[date('w', $timestamp)];		// on récupère le jour de la semaine

		do{
			$sql = "SELECT idCovoiturage FROM Covoiturage WHERE is_Depart_Lycee = $is_depart_lycee ".
			"AND idLigne = $idLigne AND Heure = '$heure' AND Jour = '$jour_semaine';";
	
			$res = $GLOBALS['mysqli']->query($sql)->fetch_assoc();
	
			if (!$res)
			{
				$sql = "INSERT INTO Covoiturage (Jour, Heure, is_Depart_Lycee, idLigne) VALUES ('$jour_semaine', '$heure', $is_depart_lycee, $idLigne)";
				echo "$sql\n";
				//$GLOBALS['mysqli']->query($sql);
			}
		} while (!isset($res));*/
		
		
		

		
		
		
		
		
		





		//var_dump($etape);
	}
}

