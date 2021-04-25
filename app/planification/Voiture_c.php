<?php

#
#	Codeur : Cyril
#	Description : 
#		Une voiture est utilisé pour passer du point A d'une étape au point B 
#		
#

require_once "config.php";

class Voiture
{
	public $idConducteur;
	public $tab_passager = array();
	public $place_restante;
	public $id;
	public $kilometrage;

	function __construct($conducteur)
	// constructeur qui ajoute le conducteur au passager de la voiture
	{

		$this->idConducteur = $conducteur->id;

		// on utilise la voiture du conducteur
		$sql = "SELECT Nbr_Place, idVoiture FROM Voiture WHERE idCovoitureur = $this->idConducteur AND is_Favoris = 1";
		$res = $GLOBALS['mysqli']->query($sql)->fetch_assoc();
		$this->place_restante = $res['Nbr_Place'];
		$this->id = $res['idVoiture'];

	}
}
?>