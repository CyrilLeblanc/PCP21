<?php

class Ligne
{
    function __construct()
    {
        require_once $GLOBALS['racine']."config.php";
    }

    function rm_compo($idLigne, $idPoint_RDV)
    # Permet de retirer un point d'une ligne tout en gardant une cohérence dans les rang
    {
        // on récupère le rang du point 
        $sql = "SELECT Rang FROM Composition WHERE idLigne = $idLigne AND idPoint_RDV = $idPoint_RDV";
        $res = $GLOBALS['mysqli']->query($sql);
        $rang_del = null;
        if (!($rang_del = $res->fetch_assoc()['Rang']))
        {
            return false;
        }
        
        // on supprime le point
        $sql = "DELETE FROM Composition WHERE idLigne = $idLigne AND idPoint_RDV = $idPoint_RDV";
        $GLOBALS['mysqli']->query($sql);

        // on ajuste les rang des points qui vienne après dans la composition
        $sql = "SELECT * FROM Composition WHERE idLigne = $idLigne";
        $res = $GLOBALS['mysqli']->query($sql);
        while ($row = $res->fetch_assoc())
        {
            $idComposition = $row['idComposition'];
            if ($row['Rang'] >= $rang_del)
            {
                // on met à jour le rang en ajoutant -1 si le rang n'est pas de la bonne valeurs
                $sql = "UPDATE Composition SET Rang = " . (int)($row['Rang'] -1) . " WHERE idComposition = $idComposition";
                $GLOBALS['mysqli']->query($sql);
            }
        }
    }


    function add_compo($idPoint_RDV, $rang, $idLigne)
    # Permet d'ajouter un point d'une ligne tout en gardant une cohérence dans les rang
    {
        if ($rang > 1)
        {
            $rang--;
        }
        // on ajoute le points
        $sql = "INSERT INTO Composition (idPoint_RDV, Rang, idLigne) VALUES ($idPoint_RDV, $rang, $idLigne)";
        $GLOBALS['mysqli']->query($sql);

        // on ajuste les rang dans les composition de la ligne
        $sql = "SELECT * FROM Composition WHERE idLigne = $idLigne ORDER BY Rang";
        $res = $GLOBALS['mysqli']->query($sql);
        $last_rang = 0;
        while ($row = $res->fetch_assoc())
        {
            if ((int)$row['Rang'] != $last_rang+1)
            // si le rang ne correspond pas on l'ajuste
            {
                $sql = "UPDATE Composition SET Rang = " . (int)($last_rang+1) . " WHERE idComposition = " . $row['idComposition'];
                $GLOBALS['mysqli']->query($sql);
                $row['Rang'] = $last_rang+1;
            }
            $last_rang = (int)$row['Rang'];
        }
    }
}
?>