<?php

#
#	Codeur : Cyril
#	Description : 
#		un Covoitureur est une personne qui utilise le service
#
#

require_once "../../config.php";

class Covoitureur
{
	private $id;
	private $Nbr_Alveole;
	private $idPoint_home;

	private $have_voiture = True;
	private $heure_retour = null;
	private $voiture_at_point = null;			// contient l'id point où la voiture du covoitureur à été laisser

	function __construct($id)
	{
		$this->id = $id;
		$sql = "SELECT Nbr_Alveoles, idPoint_RDV FROM Covoitureur WHERE idCovoitureur = $id";
		$res = $GLOBALS['mysqli']->query($sql)->fetch_assoc();
		$this->Nbr_Alveole = (int)$res['Nbr_Alveoles'];
		$this->idPoint_home = (int)$res['idPoint_RDV'];
	}


## SETER & GETER

	function get_idPoint_home()
	{
		return $this->idPoint_home;
	}

	function get_id()
	{
		return $this->id;
	}

	function get_Nbr_Alveole()
	{
		return $this->Nbr_Alveole;
	}

	function get_have_voiture()
	{
		return $this->have_voiture;
	}

	function set_have_voiture($value)
	{
		$this->have_voiture = $value;
	}

	function set_heure_retour($value)
	{
		$this->heure_retour = $value;
	}

	function get_heure_retour()
	{
		return $this->heure_retour;
	}

	function get_voiture_at_point()
	{
		return $this->voiture_at_point;
	}

	function set_voiture_at_point($idPoint)
	{
		$this->voiture_at_point = $idPoint;
	}
}