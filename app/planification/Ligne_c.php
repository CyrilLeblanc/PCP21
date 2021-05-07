<?php

#
#	Codeur : Cyril
#	Description : 
#		Une ligne est un ensemble d'étape sur lesquels des voitures 
#		peuvent passer pour aller d'un point à un autre
#
#

require_once "config.php";
require_once "Etape_c.php";

class Ligne
{

	private $id;
	private $tab_etape = array();			// contient les étapes demandés

	function __construct($id, $is_depart_lycee)
	// créer les étapes pour la ligne automatiquement en fonction de l'idLigne et du sens
	{
		$this->id = $id;
		$composition = $this->get_composition($id, $is_depart_lycee);		// on récupère la composition de points

		// on créer les étape en fonction de si le points suivant existe
		foreach($composition as $k => $value)
		{
			if (isset($composition[$k+1]) && $composition[$k])
			{
				array_push($this->tab_etape, new Etape($composition[$k], $composition[$k+1]));
			}
		}
	}


	private function get_composition($id, $is_depart_lycee)
	// utilisé par le constructeur
	// permet de récupéré la composition d'une ligne en fonction de son sens et de son id
	{
		$composition = array();		// contient les composition de la ligne

		$sql = "SELECT Rang, idPoint_RDV FROM Composition WHERE idLigne = $id ORDER BY Rang";
		if ($is_depart_lycee != 1)		// on inverse l'ordre des points si c'est un aller
		{
			$sql .= " DESC";
		}

		if ($is_depart_lycee)
		// si c'est un retour on rajoute le premier point (1)
		{
			array_push($composition, 1);
		}

		$res = $GLOBALS['mysqli']->query($sql);
		while( $row = $res->fetch_assoc())		// pour chaque ligne de la requête on créer une etape
		{
			array_push($composition, (int)$row['idPoint_RDV']);
		}

		if (!$is_depart_lycee)
		// si c'est un aller un ajoute le dernier point (1)
		{
			array_push($composition, 1);
		}

		return $composition;
	}




	function set_covoitureur($date, $heure, $is_depart_lycee)
	// set les covoitureurs en fonction des inscriptions
	{
		if ($is_depart_lycee == 1)
		// si c'est un retour on set les covoitureurs seulement sur le lycée
		{
			$this->tab_etape[0]->set_covoitureur($date, $heure, $is_depart_lycee);
		} elseif ($is_depart_lycee == 0)
		// si c'est un aller on set les covoitureur sur toutes les étapes
		{
			foreach($this->tab_etape as $etape)
			{
				$etape->set_covoitureur($date, $heure, $is_depart_lycee);
			}
		}
		
		$this->del_empty();
	}

	function inject_covoitureur($tab_covoitureur)
	{
		
	}


	function del_empty()
	{
		// pour chaque étape on regarde si le point A a du monde
		// si il n'y a personne on supprime l'étape

		foreach($this->tab_etape as $k => $etape)
		{
			if (sizeof($etape->get_ref_tab_covoitureur()) < 1)
			// si il n'y a personne sur le point on le retire
			{
				unset($this->tab_etape[$k]);
			}
		}
		// on retire les trous du tableaux d'étape
		$tab_temp = array();
		foreach($this->tab_etape as $etape)
		{
			if (isset($etape))
			{
				array_push($tab_temp, $etape);
			}
		}
		$this->tab_etape = $tab_temp;
		// on relis les étapes entre elle
		foreach($this->tab_etape as $k => $etape)
		{
			if (isset($this->tab_etape[$k+1]))
			{
				//$this->tab_etape[$k]->Point_B->id = $this->tab_etape[$k+1]->Point_A->id;
				$etape->set_id_Point_B($this->tab_etape[$k+1]->get_id_Point_A());
			}
		}
	}

	function get_population()
	{
		$population = array();
		foreach($this->tab_etape as $etape)
		{
			$tab_covoitureur = &$etape->get_ref_tab_covoitureur();
			foreach($tab_covoitureur as $covoitureur)
			{
				array_push($population, $covoitureur);
			}
		}
		return $population;
	}

	function &get_ref_tab_etape()
	{
		return $this->tab_etape;
	}

## SETER & GETER

	function get_id()
	{
		return $this->id;
	}

	function get_id_final()
	{
		return $this->tab_etape[sizeof($this->tab_etape)-1]->get_id_Point_B();
	}
}
?>