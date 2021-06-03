<?php
session_start();
require_once '../config.php';

$all = array();

$idCovoitureur = $_SESSION['idCovoitureur'];

$sql = "SELECT Participation.Date, Participation.is_Conducteur, 
Covoiturage.Heure, Covoiturage.is_Depart_Lycee,
Etape.idVoiture, Etape.Kilometrage AS KM_Etape,
PointA.idPoint_RDV as idPointA, PointB.idPoint_RDV as idPointB
FROM Participation
INNER JOIN Covoiturage ON Participation.idCovoiturage = Covoiturage.idCovoiturage
INNER JOIN Etape ON Etape.idParticipation = Participation.idParticipation
INNER JOIN Point_RDV AS PointA ON Etape.idPoint_RDV_A = PointA.idPoint_RDV
INNER JOIN Point_RDV AS PointB ON Etape.idPoint_RDV_B = PointB.idPoint_RDV
WHERE Participation.is_Valide_Systeme = 1 AND 
is_Invalide_Webmaster = 0 AND
idCovoitureur = $idCovoitureur AND 
Participation.Date > CURRENT_DATE
ORDER BY Date";

$res = $GLOBALS['mysqli']->query($sql);
while($row = $res->fetch_assoc())
{
        
}

?>