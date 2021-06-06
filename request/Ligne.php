<?php

    class Ligne
    {
        function __construct()
        {
            require_once $GLOBALS['racine'] . 'config.php';
        }

        function get_ligne($idLigne)
        // Permet de récupérer la totalité des lignes en fonction de leur id
        {

            $sql = "SELECT * FROM Ligne WHERE idLigne = $idLigne ;";

            $res = $GLOBALS['mysqli']->query($sql);
            while ($row = $res->fetch_assoc())
            {
                return $row;
            }
        }
    }
?>