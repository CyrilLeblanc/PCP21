<?php
require_once "../../config.php";

echo "########\t Création de compte utilisateur \t########\n";
echo "(Les valeurs dans les [] sont des valeurs par défaut si jamais les valeurs ne sont pas défini)\n\n";

$is_webmaster = readline('is_Webmaster [0] : ');
if ($is_webmaster == "")
{
    $is_webmaster = "0";
}

$idPoint_RDV = readline("idPoint_RDV [random]: ");
if ($idPoint_RDV == "")
{
    $idPoint_RDV = rand(1,15);
}

$firstname = readline('Nom [Jon]: ');
if ($firstname == "")    
{
    $firstname = 'Jon';
}

$name = readline('Prénom [Doe]: ');
if ($name == "")
{
    $name = "Doe";
}

$number = readline("Numéro de Téléphone [06 00 ...] : ");
if ($number == "")
{
    $number = "0600000000";
}

$email = readline("E-mail [test@test.fr] : ");
if ($email == "")
{
    $email = "test@test.fr";
}

$password = readline("Mot de passe [test] : ");
if ($password == "")
{
    $password = "test";
}

$is_confirme = readline("is_Confirme [1] : ");
if ($is_confirme == "")
{
    $is_confirme = "1";
}

$nbr_Alveole = readline("Nombre d'Alvéole [random]: ");
if ($nbr_Alveole == "")
{
    $nbr_Alveole = rand(-20, 20);
}

echo "\n\n";
$choice = readline("Création de voiture ? [n] (y/n) ");

if ($choice == "n" || $choice == "")
{
    echo "Utilisation de voiture générique : \n";
    $modele = "C5";
    $marque = "Citrën";
    $annee = "2020";
    $couleur = "gris";
    $nbr_place = 5;
} else {
    $modele = readline("Modele [C5] : ");
    if ($modele == "")
    {
        $modele = "C5";
    }

    $marque = readline("Marque [Citroën] : ");
    if ($marque == "")
    {
        $marque = "Citroën";
    }

    $annee = readline("Année [2020] : ");
    if ($annee == "")
    {
        $annee = "2020";
    }

    $couleur = readline("Couleur [gris] :");
    if ($couleur == "")
    {
        $couleur = "gris";
    }

    $nbr_place = readline("Nombre de place [5] : ");
    if ($nbr_place == "")
    {
        $nbr_place = 5;
    }
}

$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO Covoitureur (is_Webmaster, idPoint_RDV, Nom, Prenom, Num_Telephone, Email, Mot_De_Passe, Nbr_Alveoles, is_Confirme) ".
"VALUE ($is_webmaster, $idPoint_RDV,'$firstname', '$name', '$number', '$email', '$password', $nbr_Alveole, $is_confirme);";
$GLOBALS['mysqli']->query($sql);

echo "\n\n$sql";

$idCovoitureur = $GLOBALS['mysqli']->insert_id;

$sql = "INSERT INTO Voiture (Modele, Marque, Annee, Couleur, Nbr_Place, idCovoitureur) ".
"VALUE ('$modele', '$marque', '$annee', '$couleur', $nbr_place, $idCovoitureur)";
$GLOBALS['mysqli']->query($sql);

echo "\n\n$sql";

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