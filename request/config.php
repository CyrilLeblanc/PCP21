<?php

//      ****************************************************
//      *    Variable de connection pour base de donnée    *
//      ****************************************************

$adress = 'localhost';      // addresse du serveur. En cas d'erreur mettre 'localhost'
$user = 'admin';            // nom d'utilisateur
$password = 'test';         // mot de passe utilisateur
$bdd = 'PCP21';       // nom de la base de donnée


// ====================================================================
// Ne rien changer pour la suite.


$GLOBALS['mysqli'] = new mysqli($adress, $user, $password, $bdd);
    if ($GLOBALS['mysqli']->connect_errno) {
        echo "Echec lors de la connexion à MySQL : (" . $GLOBALS['mysqli']->connect_errno . ") " . $GLOBALS['mysqli']->connect_error;
    }
?>