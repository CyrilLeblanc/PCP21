<?php
require_once 'request/Covoitureur.php';

$semaine = $_POST["semaine"];
$date_depart = $_POST["date_depart"];
$heure_arrive = $_POST["heure_arrive"];
$jour_semaine = $_POST["jour_semaine"];
$destination = $_POST["destination"];

$Inscrire = new Covoitureur();
$ajout_donnee = $Inscrire -> inscription(20, $date_depart, $semaine, $is_unique, $destination, $jour_semaine, $heure_arrive)


