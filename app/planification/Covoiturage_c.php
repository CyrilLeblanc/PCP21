<?php
 
#
#	Codeur : Cyril
#	Description : 
#		Créer tout les covoiturages et les enregistres automatiquement
#
#

require_once "../../config.php";
require_once "Voiture_c.php";

class Covoiturage
{
	private $idLigne;
	private $date;
	private $heure;
	private $is_depart_lycee;
	private $idCovoiturage;

	private $tab_etape_covoiturage = array(); 	// garde en mémoire toute les étapes créers


	function __construct(&$ligne, $date, $heure, $is_depart_lycee)
	{
		$this->idLigne = $ligne->get_id();
		$this->date = $date;
		$this->heure = $heure;
		$this->is_depart_lycee = $is_depart_lycee;
		while (sizeof($ligne->get_population()) > 0)
		// tant qu'il reste du monde sur l'étape on créer des voitures
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
						echo "#Voiture de : ".$conducteur->get_id()." \t$= ".$covoitureur->get_Nbr_Alveole()."\t\t home: ".$covoitureur->get_idPoint_home()."\twant_retour : ".$covoitureur->get_heure_retour()."\n".
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
						if ($covoitureur->get_have_voiture())
						// si le futur passager à encore sa voiture on défini le $covoitureur->voiture_at_point comme étant le point actuel
						{
							$covoitureur->set_voiture_at_point($etape->get_id_Point_A());
						}
						echo "#ID : ".$covoitureur->get_id()."  \t$ = ".$covoitureur->get_Nbr_Alveole()."\t\t\t home: ".$covoitureur->get_idPoint_home()."\tvoiture_at : ".$covoitureur->get_voiture_at_point()."\t want_retour : ".$covoitureur->get_heure_retour()."\n";
						$covoitureur->set_have_voiture(False);							// on retire l'accès à la voiture du covoitureur passager
						$voiture->add_passager($covoitureur);
						$etape->rm_covoitureur($covoitureur->get_id());
					}
				}

				$temp = array(
					'idPointA' => $etape->get_id_point_A(),
					'idPointB' => $etape->get_id_point_B(),
					'voiture' => clone $etape->get_ref_voiture()
				);
				array_push($this->tab_etape_covoiturage, $temp);


				#####################################################
				#	Déplacement des passagers à la prochaine étape	#
				##################################################### 

				if (isset($tab_etape[$k+1]) && isset($voiture))
				{
					foreach($tab_passager as $j => $passager)
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

					
				// on ajoute tout les passagers arriver au bout de leurs voyages dans $tab_covoitureur_retour

				echo "\n\n\n";

				if($ligne->get_id_final() == $etape->get_id_Point_B())				// si c'est la dernière étape
				{
					foreach($tab_passager as $j => $passager)
					{
						if ($j == 0)												// pour le conducteur
						{
							$passager->set_voiture_at_point($ligne->get_id_final());// on dit que sa voiture est au point final
						}
					}
				}
			}
		}
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


	function save()
	#TODO
	{

		#############################################################
		#	Détermination / Création de l'idCovoiturage dans la BDD	#
		#############################################################

		// on détermine le jour de la semaine
		$tab_date = explode('-', $this->date);		// on sépare chaque élément de la date
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

		$nbAttempt = 10;		// permet d'éviter une boucle infini en cas de mauvaise connexion avec la BDD  
		do{
			// on va chercher l'idCovoiturage qui correspond au jour de la semaine, à l'heure et à la même ligne
			$is_depart_lycee = $this->is_depart_lycee;
			$idLigne = $this->idLigne;
			$heure = $this->heure;
			
			$sql = "SELECT idCovoiturage FROM Covoiturage WHERE is_Depart_Lycee = $is_depart_lycee ".
			"AND idLigne = $idLigne AND Heure = '$heure' AND Jour = '$jour_semaine';";
	
			$res = $GLOBALS['mysqli']->query($sql)->fetch_assoc();
	
			if (!$res)
			// si l'idCovoiturage n'existe pas alors on le créer
			{
				$sql = "INSERT INTO Covoiturage (Jour, Heure, is_Depart_Lycee, idLigne) VALUES ('$jour_semaine', '$heure', $is_depart_lycee, $idLigne)";
				$GLOBALS['mysqli']->query($sql);
			}
			$nbAttempt++;
		} while (!isset($res) && $nbAttempt > 0);
		$idCovoiturage = (int)$res['idCovoiturage'];
		$res = null;
		$this->idCovoiturage = $idCovoiturage;

		echo "idCovoiturage : $idCovoiturage\n";

		#####################################################
		#	Détermination / Création de la Participation	#
		#####################################################

		// on regarde si une participation pour ce covoitureur pour ce covoiturage à une certaine date existe déjà
		foreach($this->tab_etape_covoiturage as $etape)
		{
			$tab_passager = $etape['voiture']->get_ref_tab_passager();
			foreach($tab_passager as $passager)
			{
				$nbAttempt = 0;
				do{
					$nbAttempt++;
					$idPassager = $passager->get_id();
					$is_conducteur = 0;
					if($etape['voiture']->get_ref_tab_passager()[0]->get_id() == $idPassager)
					{
						$is_conducteur = 1;
					}
					// on cherche l'idParticipation pour ce covoiturage
					$sql = "SELECT idParticipation FROM Participation WHERE idCovoitureur = $idPassager AND is_conducteur = $is_conducteur";
					$res = $GLOBALS['mysqli']->query($sql)->fetch_assoc();
					if(!$res)
					// si il n'existe pas on créer la Participation
					{
						$date = $this->date;
						$kilometrage = (int)$etape['voiture']->get_kilometrage();
						$idCovoitureur = $passager->get_id();
						$sql = "INSERT INTO Participation (is_Conducteur, Date, is_Valide_Systeme, is_Invalide_Webmaster, kilometrage, idCovoitureur, idCovoiturage) ".
						"VALUES ($is_conducteur, '$date', 1, 1, $kilometrage ,$idCovoitureur, $idCovoiturage);\n";
						$res = $GLOBALS['mysqli']->query($sql)->fetch_assoc();		# TODO Verifié ici
					}
					if ($res != "True")
					{
						// mise en place des idParticipation pour chaque covoitureur
						$passager->set_idParticipation($res['idParticipation']);
					}
				} while (!isset($res) && $nbAttempt > 0);
			}
		}
		$res = null;

		#############################################
		#	Création / Détermination de l'Etape		#
		#############################################

		// pour chaque etape
		foreach($this->tab_etape_covoiturage as $etape)
		{
			$tab_passager = $etape['voiture']->get_ref_tab_passager();
			foreach($tab_passager as $passager)
			{
				$nbAttempt = 0;
				do{
					$nbAttempt++;
					// on vérifie que l'Etape n'existe pas déjà
					$idPointA = $etape['idPointA'];
					$idPointB = $etape['idPointB'];
					$idVoiture = $etape['voiture']->get_id();
					$idParticipation = $passager->get_idParticipation();
					$kilometrage = (int)$etape['voiture']->get_kilometrage();
					$sql = "SELECT idEtape FROM Etape WHERE idPoint_RDV_A = $idPointA AND idPoint_RDV_B = $idPointB AND idVoiture = $idVoiture AND idParticipation = $idParticipation;";
					$res = $GLOBALS['mysqli']->query($sql)->fetch_assoc();
					
					if(!isset($res))
					// si elle n'existe pas on l'ajoute
					{
						$sql = "INSERT INTO Etape (Duree, Kilometrage, idPoint_RDV_A, idPoint_RDV_B, idVoiture, idParticipation) ".
						"VALUES (0, $kilometrage, $idPointA, $idPointB, $idVoiture, $idParticipation);";
						$GLOBALS['mysqli']->query($sql);
					}
				} while (!isset($res) && $nbAttempt > 0);				
			}
		}
	}
}

