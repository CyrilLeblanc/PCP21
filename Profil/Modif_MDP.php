<?php

session_start();
require_once '../config.php';
require_once $GLOBALS['racine']."request/Covoitureur.php";

$idCovoitureur = $_SESSION['idCovoitureur'];

$mdp = $_POST['MotDePasseActuelle'];
$NouveauMDP = $_POST['NouvMotDePasse'];
$ConfirmeMDP = $_POST['ConfMotDePasse'];

$mdpActuel = new Covoitureur();
$verif_mdpActuel = $mdpActuel -> get_mdp_actuelle($idCovoitureur);

if(isset($mdp) && isset($NouveauMDP) && isset($ConfirmeMDP))
{
    
    if($mdp == $verif_mdpActuel["Mot_De_Passe"])
    {
        if($NouveauMDP == $ConfirmeMDP)
        {
            $sql= "UPDATE Covoitureur SET Mot_De_Passe='$ConfirmeMDP' WHERE idCovoitureur = $idCovoitureur;";

            $res = $GLOBALS['mysqli'] ->query($sql);
        }
    }
}

if (!isset($erreur))
{
	header('Location: ./');
} else {
	header('Location: ../?erreur='.$erreur);
}

?>