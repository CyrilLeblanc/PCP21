<?php

class Indisp
{
    function __construct()
    {
        
        require_once '../../config.php';
    }

    function add_indisp($Debut_Fermeture, $Fin_Fermeture, $Motif_Fermeture, $idCovoitureur)
    {
        $sql = "INSERT INTO Indisponibilite (Debut_Fermeture, Fin_Fermeture, Motif_Fermeture, idCovoitureur) 
        VALUES ('$Debut_Fermeture', '$Fin_Fermeture', '$Motif_Fermeture', $idCovoitureur);";
        return $GLOBALS['mysqli']->query($sql);
		
    }

    function get_indisp()
    {
        $sql = "SELECT * FROM Indisponibilite;";
        $res = $GLOBALS['mysqli']->query($sql);

        $stack = array();
        while ($row = $res->fetch_assoc())
        {
            array_push($stack,$row);
        }

        return $stack;
    }

    function del_indisp($idIndisponibilite)
    {
        $sql = "DELETE FROM Indisponibilite WHERE idIndisponibilite = $idIndisponibilite ;";
        return $GLOBALS['mysqli']->query($sql);
    }

    function set_indisp($name,$value,$idIndisponibilite)
    {
        $sql = "UPDATE Indisponibilite SET $name = $value WHERE idIndisponibilite = $idIndisponibilite ;";
        return $GLOBALS['mysqli']->query($sql);
    }

    function verif_indisp($Debut_Fermeture, $Fin_Fermeture, $Motif_Fermeture, $idCovoitureur)
    {
        $sql = "SELECT * FROM Indisponibilite WHERE Debut_Fermeture = '$Debut_Fermeture' AND Fin_Fermeture = '$Fin_Fermeture' AND Motif_Fermeture = '$Motif_Fermeture' AND idCovoitureur = $idCovoitureur ;";
		$res = $GLOBALS['mysqli']->query($sql);

        $stack = array();
        while ($row = $res->fetch_assoc())
        {
            array_push($stack,$row);
        }

        if(sizeof($stack) > 0)
        {
            return True;
        }
        else
        {
            return False;
        }
    }

}
?>