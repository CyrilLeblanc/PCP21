<?php
require_once "../../config.php";

$is_webmaster = $_POST['is_webmaster'];
if ($is_webmaster == "")
{
    $is_webmaster = "0";
}

$idPoint_RDV = $_POST['Point_RDV'];
if ($idPoint_RDV == "")
{
    $idPoint_RDV = rand(1,15);
}

$firstname = $_POST['prenom'];
if ($firstname == "")    
{
    $firstname = 'Jon';
}

$name = $_POST['nom'];
if ($name == "")
{
    $name = "Doe";
}

$number = $_POST['tel'];
if ($number == "")
{
    $number = "0600000000";
}

$email = $_POST['mail'];
if ($email == "")
{
    $email = "test@test.fr";
}

$password = $_POST['pass'];
if ($password == "")
{
    $password = "test";
}

$is_confirme = $_POST['confirm'];
if ($is_confirme == "")
{
    $is_confirme = "1";
}

$nbr_Alveole = $_POST['alveole'];
if ($nbr_Alveole == "")
{
    $nbr_Alveole = rand(-20, 20);
}

echo "\n\n";
$choice = readline("Création de voiture ? [n] (y/n) ");
$choice = 'y';

if ($choice == "n" || $choice == "")
{
    echo "Utilisation de voiture générique : \n";
    $modele = "C5";
    $marque = "Citrën";
    $annee = "2020";
    $couleur = "gris";
    $nbr_place = 5;
} else {
    $modele = $_POST['modele'];
    if ($modele == "")
    {
        $modele = "C5";
    }

    $marque = $_POST['marque'];
    if ($marque == "")
    {
        $marque = "Citroën";
    }

    $annee = $_POST['annee'];
    if ($annee == "")
    {
        $annee = "2020";
    }

    $couleur = $_POST['couleur'];
    if ($couleur == "")
    {
        $couleur = "gris";
    }

    $nbr_place = $_POST['nb_place'];
    if ($nbr_place == "")
    {
        $nbr_place = 5;
    }
}

$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO Covoitureur (is_Webmaster, idPoint_RDV, Nom, Prenom, Num_Telephone, Email, Mot_De_Passe, Nbr_Alveoles, is_Confirme) ".
"VALUE ($is_webmaster, $idPoint_RDV,'$firstname', '$name', '$number', '$email', '$password', $nbr_Alveole, $is_confirme);";
echo $sql . "<br><br>";
$GLOBALS['mysqli']->query($sql);


$idCovoitureur = $GLOBALS['mysqli']->insert_id;

$sql = "INSERT INTO Voiture (Modele, Marque, Annee, Couleur, Nbr_Place, idCovoitureur) ".
"VALUE ('$modele', '$marque', '$annee', '$couleur', $nbr_place, $idCovoitureur)";
echo $sql . "<br><br>";
$GLOBALS['mysqli']->query($sql);

echo "s'il n'y as pas eu d'erreur le covoitureur a été ajouté <a href='index.php'> retour </a>";


exit;
$idVoiture = $GLOBALS['mysqli']->insert_id;


echo "\n\n Résumé [Covoitureur] :\n".
"is_Webmaster = $is_webmaster\n".
"idPoint_RDV = $idPoint_RDV\n".
"Nom : $firstname\n".
"Prenom : $name\n".
"Num_Telephone : $number\n".
"Email : $email\n".
"Mot_De_Passe : $password\n".
"Nbr_Alveole : $nbr_Alveole\n".
"\n\n Résumé [Voiture] :\n".
"Modele : $modele\n".
"Marque : $marque\n".
"Annee : $annee\n".
"Couleur : $couleur\n".
"Nbr_Place : $nbr_place\n".
"\n\n\t#idCovoitureur = $idCovoitureur\n".
"\t#idVoiture = $idVoiture\n";
?>