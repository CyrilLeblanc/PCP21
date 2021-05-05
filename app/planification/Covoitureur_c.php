<?php

#
#	Codeur : Cyril
#	Description : 
#		un Covoitureur est une personne qui utilise le service
#
#

require_once "config.php";

class Covoitureur
{
	private $id;
	private $Nbr_Alveole;
	private $have_voiture = True;
	private $heure_retour = null;

	function __construct($id)
	{
		$this->id = $id;
		$sql = "SELECT Nbr_Alveoles FROM Covoitureur WHERE idCovoitureur = $id";
		$this->Nbr_Alveole = (int)$GLOBALS['mysqli']->query($sql)->fetch_assoc()['Nbr_Alveoles'];
	}


## SETER & GETER

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
}