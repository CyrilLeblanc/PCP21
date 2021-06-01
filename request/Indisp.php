<?php

class Indisp
{
    function __construct()
    {
        require_once '../config.php';
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

    function set_indisp($idIndisponibilite)
    {
        $sql = "UPDATE Indisponibilite SET $name = $value WHERE idIndisponibilite = $idIndisponibilite ;";
        return $GLOBALS['mysqli']->query($sql);
    }

}
?>