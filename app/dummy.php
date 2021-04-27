<?php 
require_once '../config.php';

$nb_inscription = 20;
$date = "2021-04-12";
$depart_lycee = 0;
$heure = '12:00:00';


$sql = "DELETE FROM Inscription;";
echo "$sql\n";
$GLOBALS['mysqli']->query($sql);



$sql = "DELETE FROM Voiture;";
echo "$sql\n";
$GLOBALS['mysqli']->query($sql);



$sql = "DELETE FROM Covoitureur";
echo "$sql\n";
$GLOBALS['mysqli']->query($sql);



for($i = 1; $i<$nb_inscription ; $i++)
{
    $sql = "INSERT INTO Covoitureur (idCovoitureur, Nbr_Alveoles, idPoint_RDV) VALUES ($i, " . rand(0,50) ."," . rand(2,4) . ");";
    echo "$sql\n";
    $GLOBALS['mysqli']->query($sql);
}

for($i = 1; $i<$nb_inscription ; $i++)
{
    $sql = "INSERT INTO Voiture (idVoiture, Nbr_Place , is_Favoris ,idCovoitureur) VALUES ($i, ".rand(5,7).", 1, $i); ";
    echo "$sql\n";
    $GLOBALS['mysqli']->query($sql);
}

for($i = 1; $i<$nb_inscription ; $i++)
{
    $sql = "INSERT INTO Inscription (idInscription, idCovoitureur, Date_Depart, is_Depart_Lycee, Heure_Arrivee) VALUES ($i, $i, '$date', $depart_lycee, '$heure');";
    echo "$sql\n";
    $GLOBALS['mysqli']->query($sql);
	if (rand(0,1) == 1)
	{
		$heure_retour = rand(12,18).":00:00";
		$sql = "INSERT INTO Inscription (idInscription, idCovoitureur, Date_Depart, is_Depart_Lycee, Heure_Arrivee) VALUES ($i+$nb_inscription, $i, '$date', 1, '$heure_retour');";
		echo "$sql\n";
		$GLOBALS['mysqli']->query($sql);
	}
}

?>
