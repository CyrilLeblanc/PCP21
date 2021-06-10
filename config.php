<?php
//ini_set('display_errors', 1);   #DEBUG
//ini_set('display_startup_errors', 1);   #DEBUG

//      ****************************************************
//      *    Variable de connection pour base de donnée    *
//      ****************************************************

$adress = '127.0.0.1';      // addresse du serveur. En cas d'erreur mettre 'localhost'
$user = 'admin';            // nom d'utilisateur
$password = 'Snir2021';         // mot de passe utilisateur
$bdd = 'PCP21';       // nom de la base de donnée

$GLOBALS['racine'] = "/var/www/html/";    // racine du projet

// ====================================================================
// Ne rien changer pour la suite.


$GLOBALS['mysqli'] = new mysqli($adress, $user, $password, $bdd);
    if ($GLOBALS['mysqli']->connect_errno) {
        echo "Echec lors de la connexion à MySQL : (" . $GLOBALS['mysqli']->connect_errno . ") " . $GLOBALS['mysqli']->connect_error;
    }
?>
