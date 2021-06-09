<?php
require_once '../config.php'; 
require_once $GLOBALS['racine']."request/Point.php";
require_once $GLOBALS['racine']."request/Covoitureur.php";

?>

<!-- Modal -->
<div class="modal fade" id="historique" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Histo">Historique</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="input-group">
  <input type="search" class="form-control rounded col-sm-3" placeholder="Rechercher" aria-label="Rechercher"
    aria-describedby="search-addon" />
  <button type="button" class="btn btn-outline-success">Rechercher</button>
        </div>

  <br>

        <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Date - Heure (départ)</th>
        <th>Point départ</th>
        <th>Point d'arrivé</th>
        <th>Points</th>
        <th>Conducteur</th>
      </tr>
    </thead>

    <tbody>


<?php


$idCovoitureur = $_SESSION['idCovoitureur'];
$idParticipation = $_GET['idParticipation'];

$sql ="SELECT participation.Date, Point_A.Nom AS Point_A_Nom, Point_B.Nom AS Point_B_Nom, Etape.Kilometrage, covoitureur.Nom, covoitureur.Prenom 
FROM Covoiturage, Etape 
INNER JOIN Participation ON Etape.idParticipation = Participation.idParticipation 
INNER JOIN Point_RDV AS Point_A ON Etape.idPoint_RDV_A = Point_A.idPoint_RDV 
INNER JOIN Point_RDV AS Point_B ON Etape.idPoint_RDV_B = Point_B.idPoint_RDV 
INNER JOIN Voiture ON Etape.idVoiture=Voiture.idVoiture 
INNER JOIN Covoitureur ON Voiture.idCovoitureur=Covoitureur.idCovoitureur 
WHERE Participation.idCovoiturage = Covoiturage.idCovoiturage AND Participation.idCovoitureur=$idCovoitureur AND Etape.idParticipation = 1 AND is_Valide_Systeme=0";
$res = $GLOBALS['mysqli']->query($sql);
while ($row = $res->fetch_assoc())
{
    echo "<tr>
    <td>".$row['Date']."</td>
    <td>".$row['Point_A_Nom']."</td>
    <td>".$row['Point_B_Nom']."</td>
    <td>".$row['Kilometrage']."</td>
    <td>".$row['Nom']." ".$row['Prenom']."</td>
    </tr>";
    
}

?>
    </tbody>


  </table>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>