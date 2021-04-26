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
	public $id;
	public $Nbr_Alveole;
	public $have_voiture = True;
	public $heure_retour = null;

	function __construct($id)
	{
		$this->id = $id;
		$sql = "SELECT Nbr_Alveoles FROM Covoitureur WHERE idCovoitureur = $id";
		$this->Nbr_Alveole = (int)$GLOBALS['mysqli']->query($sql)->fetch_assoc()['Nbr_Alveoles'];
	}

}