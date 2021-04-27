<?php

//      ****************************************************
//      *    Variable de connection pour base de donnée    *
//      ****************************************************

$GLOBALS['bdd_address'] = '127.0.0.1';      // addresse de la BDD
$GLOBALS['bdd_user'] = 'admin';             // nom d'utilisateur
$GLOBALS['bdd_password'] = 'test';          // mot de passe utilisateur
$GLOBALS['bdd'] = 'PCP21';            // nom de la base de donnée



// ====================================================================
// Ne rien changer pour la suite.


$GLOBALS['mysqli'] = new mysqli($GLOBALS['bdd_address'], $GLOBALS['bdd_user'], $GLOBALS['bdd_password'], $GLOBALS['bdd']);
    if ($GLOBALS['mysqli']->connect_errno) {
        echo "Echec lors de la connexion à MySQL : (" . $GLOBALS['mysqli']->connect_errno . ") " . $GLOBALS['mysqli']->connect_error;
    }
?>