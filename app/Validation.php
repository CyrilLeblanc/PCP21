<?php

// Validation des covoiturages de la veille et mise à jour des Nbr_Alveoles des covoitureurs ayant eu un covoiturage la veille.

require_once "../config.php";


#################################################
#   Récupération des covoiturages effectué      #
#################################################

// on créer la date de la veille
$date_temp = getdate(strtotime('-1 day'));
$date_veille = $date_temp['year'] . "-" . $date_temp['mon'] . "-" . $date_temp['mday'];

#DEBUG
$date_veille = "2021-06-05";

// on récupère toute les étapes effectué la veille
$sql = "SELECT Participation.idCovoitureur AS 'idPassager', Etape.Kilometrage, Voiture.idCovoitureur as 'idConducteur', Conducteur.Nbr_Alveoles AS 'Conducteur_Alveole', Passager.Nbr_Alveoles as 'Passager_Alveole' FROM Participation 
INNER JOIN Etape ON Etape.idParticipation = Participation.idParticipation 
INNER JOIN Voiture ON Etape.idVoiture = Voiture.idVoiture
INNER JOIN Covoitureur AS Conducteur ON Voiture.idCovoitureur = Conducteur.idCovoitureur 
INNER JOIN Covoitureur AS Passager ON Participation.idCovoitureur = Passager.idCovoitureur 
WHERE Participation.is_Conducteur = 0 AND Participation.Date = '$date_veille'
ORDER BY `Etape`.`idVoiture` ASC";

$res = $GLOBALS['mysqli']->query($sql);

while ($row = $res->fetch_assoc())
{
    // on retire le nombre de kilomètre au Passager en Alvéole
    $nb = $row['Passager_Alveole'] - $row['Kilometrage'];
    $idCovoitureur = $row['idPassager'];
    $sql = "UPDATE Covoitureur SET Nbr_Alveoles = $nb WHERE idCovoitureur = $idCovoitureur";
    $GLOBALS['mysqli']->query($sql);
    echo "#$idCovoitureur \t". $row['Passager_Alveole'] . " => $nb\n";

    // on ajoute le nombre de kilomètre au Conducteur en Alvéole
    $nb = $row['Conducteur_Alveole'] + $row['Kilometrage'];
    $idCovoitureur = $row['idConducteur'];
    $sql = "UPDATE Covoitureur SET Nbr_Alveoles = $nb WHERE idCovoitureur = $idCovoitureur";
    $GLOBALS['mysqli']->query($sql);
    echo "\t#$idCovoitureur\t". $row['Conducteur_Alveole'] . " => " . $nb . "\n\n\n";
}

?>