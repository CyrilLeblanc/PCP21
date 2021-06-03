<?php
ini_set('display_errors', 1);   #DEBUG
ini_set('display_startup_errors', 1);   #DEBUG

//      ****************************************************
//      *    Variable de connection pour base de donnée    *
//      ****************************************************

$adress = '127.0.0.1';      // addresse du serveur. En cas d'erreur mettre 'localhost'
<<<<<<< HEAD
$user = 'root';            // nom d'utilisateur
$password = '';         // mot de passe utilisateur
$bdd = 'mydb';       // nom de la base de donnée


=======
$user = 'admin';            // nom d'utilisateur
$password = 'test';         // mot de passe utilisateur
$bdd = 'PCP21';       // nom de la base de donnée
>>>>>>> ffab849cc89f388b81cee776dead0130ab736e97
// ====================================================================
// Ne rien changer pour la suite.


$GLOBALS['mysqli'] = new mysqli($adress, $user, $password, $bdd);
    if ($GLOBALS['mysqli']->connect_errno) {
        echo "Echec lors de la connexion à MySQL : (" . $GLOBALS['mysqli']->connect_errno . ") " . $GLOBALS['mysqli']->connect_error;
    }
?>


