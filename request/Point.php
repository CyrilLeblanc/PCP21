<?php

class Point
{
    function __construct()
    {
        require_once $GLOBALS['racine'] . 'config.php';
    }


    function get_Point($is_confirme)
    // donne tout les points en fonction de leurs confirmation
    // Renvoi un object sql
    {
        $sql = "SELECT * FROM Point_RDV WHERE is_Confirme = $is_confirme;";
        $res = $GLOBALS['mysqli'] ->query($sql);

        $stack = array();
        while ($row = $res->fetch_assoc())
        {
            array_push($stack,$row);
        }
        return $stack;
    }

 
    function add_Point($Nom, $Adresse, $Ville, $Latitude, $Longitude, $Point_Image, $is_confirme)
    {
        $Nom = addslashes($Nom);
        $Adresse = addslashes($Adresse);
        $Ville = addslashes($Ville);
        $sql = "INSERT INTO Point_RDV (Nom, Adresse, Ville, Latitude, Longitude, Point_Image, is_confirme) 
        VALUES ('$Nom', '$Adresse', '$Ville', $Latitude, $Longitude, '$Point_Image', $is_confirme);";
        return $GLOBALS['mysqli']->query($sql);
    }


    function verif_Point($Nom, $Adresse, $Ville, $Latitude, $Longitude, $idPoint_RDV)
    {
        $Nom = addslashes($Nom);
        $Adresse = addslashes($Adresse);
        $Ville = addslashes($Ville);
        $idPoint_RDV = addslashes($idPoint_RDV);

        $sql = "SELECT * FROM Point_RDV WHERE Nom = '$Nom' AND Adresse = '$Adresse' AND Ville = '$Ville' AND Latitude = $Latitude AND Longitude = $Longitude AND idPoint_RDV = $idPoint_RDV;";
        $res = $GLOBALS['mysqli']->query($sql);

        $stack = array();
        while ($row = $res->fetch_assoc())
        {
            array_push($stack,$row);
        }

        return (sizeof($stack) > 0);
    }

    
    function validate_Point($idPoint_RDV)
    {
        $sql = "UPDATE Point_RDV SET is_Confirme = 1 WHERE idPoint_RDV = $idPoint_RDV ;";

        return $GLOBALS['mysqli'] ->query($sql);
    }

    function set_Point($name, $value, $idPoint_RDV)
    {
        $sql = "UPDATE Point_RDV SET $name = $value WHERE idPoint_RDV = $idPoint_RDV;";
        return $GLOBALS['mysqli'] ->query($sql);
    }
    
    function del_Point($idPoint_RDV)
    {
        $sql = "DELETE FROM Point_RDV WHERE idPoint_RDV = $idPoint_RDV ;";

        return $GLOBALS['mysqli'] ->query($sql);
    }

    function get_point_info($id)
    {
       $sql= "SELECT * FROM Point_RDV WHERE idPoint_RDV = $id";

       $res = $GLOBALS['mysqli'] ->query($sql);
        
        while ($row = $res->fetch_assoc())
        {
                return $row;
        }

    }
}
?>