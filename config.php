<?php

//      ****************************************************
//      *    Variable de connection pour base de donnée    *
//      ****************************************************

$adress = '127.0.0.1';      // addresse du serveur. En cas d'erreur mettre 'localhost'
$user = 'root';            // nom d'utilisateur
$password = '';         // mot de passe utilisateur
$bdd = 'mydb';       // nom de la base de donnée


// ====================================================================
// Ne rien changer pour la suite.


$GLOBALS['mysqli'] = new mysqli($adress, $user, $password, $bdd);
    if ($GLOBALS['mysqli']->connect_errno) {
        echo "Echec lors de la connexion à MySQL : (" . $GLOBALS['mysqli']->connect_errno . ") " . $GLOBALS['mysqli']->connect_error;
    }
?>


