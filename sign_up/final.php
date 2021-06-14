<?php
session_start();
require_once '../config.php';

// on détermine le point
if (isset($_GET['idPoint_RDV']) && $_GET['idPoint_RDV'] != "")
{
    // on utilise un point déjà existant si demandé
    $idPoint_RDV = $_GET['idPoint_RDV'];
} elseif (isset($_POST['nom']) && isset($_POST['ville']) && isset($_POST['adresse']) && isset($_POST['latitude']) && isset($_POST['longitude']))
{
    // on créer le point si demandé
    $nom = $_POST['nom'];
    $ville = $_POST['ville'];
    $adresse = $_POST['adresse'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $sql = "INSERT INTO Point_RDV (Nom, Latitude, Longitude, Adresse, Ville, is_Confirme) VALUES 
    ('$nom', $latitude, $longitude, '$adresse', '$ville', 0)";
    
    $GLOBALS['mysqli']->query($sql);
    $idPoint_RDV = $GLOBALS['mysqli']->insert_id;
}


// on ajoute le covoitureur
$nom = $_SESSION['_Covoitureur']['Nom'];
$prenom = $_SESSION['_Covoitureur']['Prenom'];
$tel = $_SESSION['_Covoitureur']['Num_Telephone'];
$mail = $_SESSION['_Covoitureur']['Email'];
$password = $_SESSION['_Covoitureur']['Mot_De_Passe'];


$sql = "INSERT INTO Covoitureur (Nom, Prenom, Num_Telephone, Email, Mot_De_Passe, Nbr_Alveoles, is_Confirme, idPoint_RDV) VALUES
('$nom', '$prenom', '$tel', '$mail', '$password', 0, 0, $idPoint_RDV)";
$GLOBALS['mysqli']->query($sql);

$idCovoitureur = $GLOBALS['mysqli']->insert_id;

// on ajoute la voiture
$modele = $_SESSION['_Voiture']['Modele'];
$marque = $_SESSION['_Voiture']['Marque'];
$annee = $_SESSION['_Voiture']['Annee'];
$couleur = $_SESSION['_Voiture']['Couleur'];
$nb_place = $_SESSION['_Voiture']['Nbr_Place'];

$sql = "INSERT INTO Voiture (Modele, Marque, Annee, Couleur, Nbr_Place, idCovoitureur) VALUES 
('$modele', '$marque', '$annee', '$couleur', $nb_place, $idCovoitureur)";
$GLOBALS['mysqli']->query($sql);

header('Location: ../');



?>