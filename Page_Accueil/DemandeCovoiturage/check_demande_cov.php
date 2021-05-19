<?php
require_once 'request/Covoitureur.php';
/*
$date_depart = $_POST['date_depart'];
$semaine = $_POST['semaine'];
$is_unique = $_POST['is_unique'];
$destination = $_POST['destination'];
$jour_semaine = $_POST['jour_semaine'];
$heure_arrive = $_POST['heure_arrive'];
*/

//$connection=mysqli_connect("localhost", "root", "", "mydb");

//$Inscrire = new Covoitureur();
//$ajout_donnee = $Inscrire -> inscription(20,'$_POST[date_depart]', '$_POST[semaine]','$_POST[is_unique]','$_POST[destination]','$_POST[jour_semaine]','$_POST[heure_arrive]');



        require_once './request/config.php';
    
        
if(isset($_POST["date_depart"]) && isset($_POST["semaine"]) && isset($_POST["is_unique"]) && isset($_POST["destination"]) && isset($_POST["jour_semaine"]) && isset($_POST["heure_arrive"]))

{

$sql = "INSERT INTO inscription(idCovoitureur, idCovoiturage, Date_Depart, Semaine, is_Unique, is_Depart_Lycee, Jour_Semaine, Heure_Arrivee)
        VALUES (20, 1, '" . $_POST["date_depart"] . "', '".$_POST["semaine"]."','".$_POST["is_unique"]."','".$_POST["destination"]."','".$_POST["jour_semaine"]."','".$_POST["heure_arrive"]."');";
echo $sql;

        $GLOBALS['mysqli']->query($sql);
        echo "réussi.";
 }

 else {
 echo "pas bon.";
 }
        
