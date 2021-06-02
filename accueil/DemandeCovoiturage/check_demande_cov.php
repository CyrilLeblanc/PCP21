<?php

/*
$date_depart = $_POST['date_depart'];
$semaine = $_POST['semaine'];
$is_unique = $_POST['is_unique'];
$destination = $_POST['destination'];
$jour_semaine = $_POST['jour_semaine'];
$heure_arrive = $_POST['heure_arrive'];
*/
$date_depart = "2021-10-20";
$semaine = "A";
$is_unique = "1";
$destination = "0";
$jour_semaine = "lundi";
$heure_arrive = "12:00:00";

$idLigne = 1;

require_once '../../config.php';
require_once '../../request/Covoitureur.php';


//vérifier l'idCovoiturage
/*
function checkIdCovoiturage($jour_semaine, $heure_arrive, $destination)
{

$sql = "SELECT idCovoiturage FROM covoiturage WHERE Jour = '$jour_semaine' AND Heure = '$heure_arrive' AND is_Depart_Lycee = $destination;";
$res = $GLOBALS['mysqli']->query($sql);
$i = 0;
while($res -> fetch_assoc())
{
$i++;
}

        return $i>0;

}
*/
//function IdCovoiturage($jour_semaine, $heure_arrive, $destination, $idLigne) {
        
//check Id du covoiturage
$nbIdCovoiturage=0;

do 
{
        $getId = "SELECT idCovoiturage FROM covoiturage WHERE Jour = '$jour_semaine' AND Heure = '$heure_arrive' AND is_Depart_Lycee = $destination AND idLigne = $idLigne;";
        echo "$getId\n";
        $res = $GLOBALS['mysqli']->query($getId)->fetch_assoc();

        if(!$res)
        {
                $ajout_covoiturage = "INSERT INTO covoiturage(Jour, Heure, is_Depart_Lycee, idLigne) VALUES ('$jour_semaine', '$heure_arrive', '$destination', '$idLigne');";
                $GLOBALS['mysqli'] ->query($ajout_covoiturage);
        }
        $nbIdCovoiturage++;

}
while(!isset($res) && $nbIdCovoiturage >0);
$idCovoiturage = $res['idCovoiturage'];

//check Id du Covoiturage






if(isset($_POST["date_depart"]) && isset($_POST["semaine"]) && isset($_POST["is_unique"]) && isset($_POST["destination"]) && isset($_POST["jour_semaine"]) && isset($_POST["heure_arrive"]))

{

$sql = "INSERT INTO inscription(idCovoitureur, idCovoiturage, Date_Depart, Semaine, is_Unique, is_Depart_Lycee, Jour_Semaine, Heure_Arrivee)
        VALUES (1, $idCovoiturage, '" . $_POST["date_depart"] . "',
        '".$_POST["semaine"]."','".$_POST["is_unique"]."','".$_POST["destination"]."','".$_POST["jour_semaine"]."','".$_POST["heure_arrive"]."');";
echo $sql;

        $GLOBALS['mysqli']->query($sql);
        echo "réussi.";
 }

 else {
 echo "pas bon.";
 }
