<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once '../bootstrap.php'?>
</head>
<body>
<?php
session_start();
require_once '../config.php'; 
require_once $GLOBALS['racine']."request/Point.php";
require_once $GLOBALS['racine']."request/Covoitureur.php";
$idCovoitureur = $_SESSION['idCovoitureur'];
$idParticipation = $_GET['idParticipation'];

$sql ="SELECT Point_A.Nom AS Point_A_Nom, Point_B.Nom AS Point_B_Nom, Etape.Kilometrage, covoitureur.Nom, covoitureur.Prenom
FROM Etape 
INNER JOIN Participation ON Etape.idParticipation = Participation.idParticipation
INNER JOIN Point_RDV AS Point_A ON Etape.idPoint_RDV_A = Point_A.idPoint_RDV 
INNER JOIN Point_RDV AS Point_B ON Etape.idPoint_RDV_B = Point_B.idPoint_RDV
INNER JOIN Voiture ON Etape.idVoiture=Voiture.idVoiture
INNER JOIN Covoitureur ON Voiture.idCovoitureur=Covoitureur.idCovoitureur
WHERE Participation.idCovoitureur=$idCovoitureur AND Etape.idParticipation = $idParticipation AND is_Valide_Systeme=1";
$res = $GLOBALS['mysqli']->query($sql);
while ($row = $res->fetch_assoc())
{
    echo "Conducteur = ".$row['Nom']." ".$row['Prenom'].
    "<br/> Point_A = " . $row['Point_A_Nom'].
    "<br/> Point_B = " . $row['Point_B_Nom'].
    "<br/> Coût Alvéole = " . $row['Kilometrage'] . "<br/><br/>";

}

?>

</body>
</html>