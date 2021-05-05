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
	private $idConducteur;
	private $tab_passager = array();
	private $place_restante;
	private $id;
	private $kilometrage;

	function __construct($conducteur)
	// constructeur qui ajoute le conducteur au passager de la voiture
	{

		$this->idConducteur = $conducteur->get_id();

		// on utilise la voiture du conducteur
		$sql = "SELECT Nbr_Place, idVoiture FROM Voiture WHERE idCovoitureur = $this->idConducteur AND is_Favoris = 1";
		$res = $GLOBALS['mysqli']->query($sql)->fetch_assoc();
		$this->place_restante = $res['Nbr_Place'];
		$this->id = $res['idVoiture'];
	}

	function add_passager($passager)		// ajoute un passager dans la voiture
	{

		array_push($this->tab_passager, $passager);
		$this->place_restante--;
		if ($this->place_restante < 0)
		{
			echo "\t/!\ place fantôme\n";
		}
	}

	function rm_passager($id)
	{
		foreach($this->tab_passager as $j => $passager)
		{
			if($passager->get_id() == $id)
			{
				unset($this->tab_passager[$j]);
			}
		}
	}

## SETER & GETER

	function &get_ref_tab_passager()
	{
		return $this->tab_passager;
	}

	function get_place_restante()
	{
		return $this->place_restante;
	}

	function get_id()
	{
		return $this->id;
	}

	function set_kilometrage($value)
	{
		$this->kilometrage = $value;
	}

}
?>