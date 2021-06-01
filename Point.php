<?php

class Point
{
    function __construct()
    {
        require_once './config.php';
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

 
    function add_Point($Nom, $Latitude, $Longitude, $Point_Image)
    {
        $sql = "INSERT INTO Point_RDV (Nom, Latitude, Longitude, Point_Image) 
                VALUES ('$Nom', $Latitude, $Longitude, '$Point_Image');";

        $res = $GLOBALS['mysqli'] ->query($sql);
    }

    
    function validate_Point($idPoint_RDV)
    {
        $sql = "UPDATE Point_RDV SET is_Confirme = 1 WHERE idPoint_RDV = $idPoint_RDV ;";

        $res = $GLOBALS['mysqli'] ->query($sql);
    }
    
    function del_Point($idPoint_RDV)
    {
        $sql = "DELETE FROM Point_RDV WHERE idPoint_RDV = $idPoint_RDV ;";

        $res = $GLOBALS['mysqli'] ->query($sql);
    }
}
?>