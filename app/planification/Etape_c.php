<?php

#
#	Codeur : Cyril
#	Description : 
#		Une étape est un élément d'une ligne 
#		il est défini par les deux points qui les consituts
#
#

require_once "config.php";
require_once "Point_c.php";
require_once "Covoitureur_c.php";

class Etape
{

	// les deux étapes du Point
	private $Point_A;
	private $Point_B;

	private $is_Depart_Lycee;

	private $distance;		// la distance séparant les deux points [FORMAT : ISODISTANCE]

	private $voiture;		// la voiture utilisé pour l'étape

	function __construct($idPoint_A, $idPoint_B)
	{
		$this->Point_A = new Point($idPoint_A);
		$this->Point_B = new Point($idPoint_B);
	}

	function set_covoitureur($date, $heure, $is_depart_lycee)
	// permet de set les covoitureurs en fonction de la date, de l'heure et du sens
	{
		$tab_temp = array();		// contient temporairement les idCovoitureur

		$idPoint = $this->Point_A->get_id();
		// cette requête récupère les idCovoitureur des inscriptions en prenant seulement ceux
		// qui nous intéresse et en triant les entré en fonction des nbrAlveole
		$sql = "SELECT Covoitureur.idCovoitureur
		FROM Inscription
		INNER JOIN Covoitureur ON Inscription.idCovoitureur = Covoitureur.idCovoitureur
		WHERE Covoitureur.idPoint_RDV = $idPoint AND
		Inscription.Date_Depart = '$date' AND
		Inscription.Heure_Arrivee = '$heure' AND
		Inscription.is_Depart_Lycee = $is_depart_lycee
		ORDER BY Covoitureur.Nbr_Alveoles ASC;";


		if ($is_depart_lycee == 1)
		// si c'est un retour on récupère toute les inscriptions sans prendre en compte le point de départ
		{
			$sql = "SELECT Covoitureur.idCovoitureur
			FROM Inscription
			INNER JOIN Covoitureur ON Inscription.idCovoitureur = Covoitureur.idCovoitureur
			WHERE Inscription.Date_Depart = '$date' AND
			Inscription.Heure_Arrivee = '$heure' AND
			Inscription.is_Depart_Lycee = $is_depart_lycee
			ORDER BY Covoitureur.Nbr_Alveoles ASC;";
		}


		$res = $GLOBALS['mysqli']->query($sql);
		while ($row = $res->fetch_assoc())
		{
			$this->Point_A->add_covoitureur(new Covoitureur($row['idCovoitureur']));
		}
	}

	function rm_covoitureur($id)
	{
		$this->Point_A->rm_covoitureur($id);
	}

	function add_covoitureur($covoitureur)
	{
		$this->Point_A->add_covoitureur($covoitureur);
	}


## SETER & GETER

	function &get_ref_tab_covoitureur()
	{
		return $this->Point_A->get_ref_tab_covoitureur();
	}

	function &get_ref_voiture()
	{
		return $this->voiture;
	}


	function set_distance()
	// permet de calculer la distance entre deux points en isodistance
	#TODO
	{

	}


	function set_id_Point_A($id)
	{
		$this->Point_A->set_id($id);
	}

	function set_id_Point_B($id)
	{
		$this->Point_B->set_id($id);
	}

	
	function get_id_Point_A()
	{
		return $this->Point_A->get_id();
	}

	function get_id_Point_B()
	{
		return $this->Point_B->get_id();
	}

	
	function get_distance()
	{
		return $this->distance;
	}
}
?>