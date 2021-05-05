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
	private $tab_etape_retour = array();		// tableau qui contient les covoiturages créers pour les enregistrers


	function __construct(&$ligne, $date, $heure, $is_depart_lycee)
	{
		$tab_etape = &$ligne->get_ref_tab_etape();
		foreach($tab_etape as $k => $etape)
		{
			// on regarde si il y a des gens sur cette étape
			if (sizeof($etape->get_ref_tab_covoitureur()) < 1)
			{
				continue;
			}
			echo "####################\n";
			echo "\t ETAPE ".$etape->get_id_Point_A()." ~ ".$etape->get_id_Point_B()."\n\n";
	
			#####################################
			#	Détermination du Conducteur		#
			#####################################

			// le conducteur sera en priorité un covoitureur voulant un aller retour 

			$conducteur = null;
			$voiture = &$etape->get_ref_voiture();
			$voiture = null;

			// on détermine si il reste des covoitureurs voulant un simple aller
			$aller_retour_remain = False;

			$tab_covoitureur = &$etape->get_ref_tab_covoitureur();
			foreach($tab_covoitureur as $covoitureur)
			{
				if (null !== $covoitureur->get_heure_retour())
				{
					$aller_retour_remain = True;
				}
			}


			foreach($tab_covoitureur as $j => $covoitureur)
			{
				if (isset($covoitureur) && $covoitureur->get_have_voiture())
				// on cherche un covoitureur avec une voiture en partant des plus pauvres
				{
					if ($aller_retour_remain && null == $covoitureur->get_heure_retour())
					// si il reste de utilisateur voulant un aller retour et que le covoitutreur séléctionner n'a pas de retour (donc il veux un aller simple)
					// alors on passe séléctionne le covoitureur suivant
					{
						continue;
					}
					$conducteur = $covoitureur;
					$voiture = new Voiture($conducteur);
					$etape->rm_covoitureur($covoitureur->get_id());

					// on ajoute le conducteur à sa voiture
					$voiture->add_passager($conducteur);
					echo "#Voiture de : ".$conducteur->get_id()." \t$= ".$covoitureur->get_Nbr_Alveole()."\t\t want_retour : ".$covoitureur->get_heure_retour()."\n".
					"idVoiture : ".$voiture->get_id()."\t nb_place : ".$voiture->get_place_restante()."\n\n";
					break;
				}
			}



			#################################
			#	Remplissage de la voiture	#
			#################################

			// on trie les covoitureurs sur l'étape pour avoir en priorité les plus riches en alvéoles
			
			// par bubble sort
			$tab_passager = &$voiture->get_ref_tab_passager();
			$tab_covoitureur = &$etape->get_ref_tab_covoitureur();
			$this->combler_tab($tab_covoitureur);

			for($i=0; $i<sizeof($tab_covoitureur)-1; $i++) {
				for($j=0; $j<(sizeof($tab_covoitureur)-1-$i); $j++) {
					if ($tab_covoitureur[$j]->get_Nbr_Alveole() > $tab_covoitureur[$j+1]->get_Nbr_Alveole() ) {
						$temp = $tab_covoitureur[$j+1];
						$tab_covoitureur[$j+1] = $tab_covoitureur[$j];
						$tab_covoitureur[$j] = $temp;
					}
				}
			}

			// on trie le tableau des covoitureurs sur l'étape pour avoir en priorité les covoitureurs sans voitures et ensuite les plus riches
			
				foreach($tab_covoitureur as $j => $covoitureur)
				{
					if ($covoitureur->get_have_voiture())
					{
						// on déplace le covoitureur à la fin du tab_covoiturage
						$etape->rm_covoitureur($covoitureur->get_id());
						$etape->add_covoitureur($covoitureur);
					}
				}



			foreach($tab_covoitureur as $j => $covoitureur)
			{
				if((isset($conducteur) && $voiture->get_place_restante() > 1) || sizeof($tab_covoitureur) == 1)# NOTE : On utilise toute les place que si il ne reste qu'une personne sur le point	
				{
					if ($tab_passager[0]->get_heure_retour() == null && $covoitureur->get_heure_retour() !== null)
					// si le conducteur veux un aller simple il ne prendra que des passagers voulant la même chose
					{
						continue;
					}
					echo "#ID : ".$covoitureur->get_id()."  \t$ = ".$covoitureur->get_Nbr_Alveole()."\t\t\t want_retour : ".$covoitureur->get_heure_retour()."\n";
					$covoitureur->set_have_voiture(False);							// on retire l'accès à la voiture du covoitureur passager
					$voiture->add_passager($covoitureur);
					$etape->rm_covoitureur($covoitureur->get_id());
				}
			}

			#####################################################
			#	Déplacement des passager à la prochaine étape	#
			#####################################################

			if (isset($tab_etape[$k+1]) && isset($voiture))
			{
				foreach($tab_passager as $passager)
				{
					// on ajoute les covoitureur seulement si il n'y sont pas déjà
					$is_already_here = False;
					$sup_tab_covoitureur = &$tab_etape[$k+1]->get_ref_tab_covoitureur();
					foreach($sup_tab_covoitureur as $covoitureur)
					{
						if ($covoitureur == $passager)
						{
							$is_already_here = True;
						}
					}

					if (!$is_already_here)
					{
						//array_push($ligne->tab_etape[$k+1]->Point_A->tab_covoitureur, $passager);
						$tab_etape[$k+1]->add_covoitureur($passager);
					}
					
				}
				$voiture->set_kilometrage($etape->get_distance());
			}

				
			// on ajoute l'étape actuel dans un tableau pour déterminer les retour plus tard
			array_push($this->tab_etape_retour, clone $etape);

			echo "\n\n\n";
			$this->save($etape,$ligne->get_id(), $is_depart_lycee, $date, $heure);
		}



		#################################
		#	Planification des retour	#
		#################################
		/*
		foreach($this->tab_etape_retour as $j => $etape)
		{
			// on retire tout les covoitureurs sans retour de la voiture
			foreach($etape->voiture->tab_passager as $k => $passager)
			{
				if (!isset($passager->heure_retour))
				{
					unset($this->tab_etape_retour[$j]->voiture->tab_passager[$k]);
				}
			}

			// on inverse pour chaque étape le point_A et le point_B
			
			$temp = $etape->Point_A;
			$etape->Point_A = $etape->Point_B;
			$etape->Point_B = $temp;

			echo "===================\n";
			echo "\t ETAPE ".$etape->Point_A->id."~".$etape->Point_B->id."\n\n";

			echo "#Voiture de : ".$etape->voiture->tab_passager[0]->id." \t$= ".$etape->voiture->tab_passager[0]->Nbr_Alveole." \t\twant_retour : ".$etape->voiture->tab_passager[0]->heure_retour."\n";
			echo "idVoiture : ".$etape->voiture->id." \tnb_place : ".$etape->voiture->place_restante."\n\n";
			foreach($etape->voiture->tab_passager as $k => $passager)
			{
				if ($k == 0)
				{
					continue;
				}
				echo "#ID : ".$passager->id." \t$ = ".$passager->Nbr_Alveole." \t\t\twant_retour : ".$passager->heure_retour."\n";
			}
		}
		*/
	}

	function combler_tab(&$tab)
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

