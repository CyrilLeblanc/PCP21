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
	public $Point_A;
	public $Point_B;

	public $is_Depart_Lycee;

	public $distance;		// la distance séparant les deux points [FORMAT : ISODISTANCE]

	public $voiture;		// la voiture utilisé pour l'étape

	function __construct($idPoint_A, $idPoint_B)
	{
		$this->Point_A = new Point($idPoint_A);
		$this->Point_B = new Point($idPoint_B);
	}


	function set_distance()
	// permet de calculer la distance entre deux points en isodistance
	#TODO
	{

	}


	function set_covoitureur($date, $heure, $is_depart_lycee)
	// permet de set les covoitureurs en fonction de la date, de l'heure et du sens
	{
		$tab_temp = array();		// contient temporairement les idCovoitureur

		$idPoint = $this->Point_A->id;
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
		$test = array();
		while ($row = $res->fetch_assoc())
		{
			array_push($this->Point_A->tab_covoitureur, new Covoitureur($row['idCovoitureur']));
			array_push($test , new Covoitureur($row['idCovoitureur']));
		}
	}
}
?>