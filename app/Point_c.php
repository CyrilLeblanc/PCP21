<?php

#
#	Codeur : Cyril
#	Description : 
#		Un point est un élément d'une étape. Il sert à contenir ces propres donnée 
#		mais aussi à définir les covoitureurs présent à un certain horaire
#
#

require_once "../config.php";

class Point
{

	// coordonée GSP [FORMAT : DECIMAL]
	private $latitude;
	private $longitude;

	private $id; 			// "idPoint_RDV" dans la base de donnée
	private $rang;

	private $tab_covoitureur = array();	// contient tout les covoitureurs à un horaire demandé



	function __construct($idPoint, $idLigne)
	{
		$this->id = $idPoint;

		// on récupère les coordonnées du point depuis la base de donnée
		$sql = "SELECT Latitude, Longitude FROM Point_RDV WHERE idPoint_RDV = $idPoint;";
		$res = $GLOBALS['mysqli']->query($sql)->fetch_assoc();
		$this->latitude = (float)$res['Latitude'];
		$this->longitude = (float)$res['Longitude'];

		// on récupère le rang du point sur la ligne
		$sql = "SELECT rang FROM Composition WHERE idPoint_RDV = $idPoint AND idLigne = $idLigne";
		$res = $GLOBALS['mysqli']->query($sql)->fetch_assoc();
		if ($this->id != 1)
		{
			$this->rang = (int)$res['rang'];
		}

	}

	function add_covoitureur(Covoitureur $covoitureur)
	{
		array_push($this->tab_covoitureur, $covoitureur);
	}

	function rm_covoitureur($id)
	{
		foreach($this->tab_covoitureur as $j => $covoitureur)
		{
			if ($covoitureur->get_id() == $id)
			{
				unset($this->tab_covoitureur[$j]);
			}
		}
	}


## SETER & GETER
	function get_id()
	{
		return $this->id;
	}

	function set_id($id)
	{
		$this->id = $id;
	}

	function get_rang()
	{
		return $this->rang;
	}

	function set_rang($value)
	{
		$this->rang = $value;
	}

	function &get_ref_tab_covoitureur()
	{
		return $this->tab_covoitureur;
	}	
}
?>