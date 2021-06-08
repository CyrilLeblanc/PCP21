<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once '../bootstrap.php'?>
</head>
<body>
<?php
require_once '../config.php'; 
$idParticipation = $_GET['idParticipation'];
$sql ="SELECT Point_A.Nom AS Point_A_Nom, Point_B.Nom AS Point_B_Nom, Voiture.idCovoitureur AS Conducteur, Etape.Kilometrage FROM Etape 
INNER JOIN Point_RDV AS Point_A ON Etape.idPoint_RDV_A = Point_A.idPoint_RDV
INNER JOIN Point_RDV AS Point_B ON Etape.idPoint_RDV_B = Point_B.idPoint_RDV  
INNER JOIN Voiture ON Etape.idVoiture = Voiture.idVoiture
WHERE idParticipation = $idParticipation";
$res = $GLOBALS['mysqli']->query($sql);
while ($row = $res->fetch_assoc())
{
    echo "Conducteur = ".$row['Conducteur'].
    "<br/> Point_A = " . $row['Point_A_Nom'].
    "<br/> Point_B = " . $row['Point_B_Nom'].
    "<br/> Coût Alvéole = " . $row['Kilometrage'] . "<br/><br/>";
}

?>
</body>
</html>