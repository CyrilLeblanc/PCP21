<?php
require_once '../config.php';
require_once $GLOBALS['racine'] . "request/Point.php";
require_once $GLOBALS['racine'] . "request/Covoitureur.php";

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

        <input type="text" id="MyInput" placeholder="Rechercher">

        <br>

        <table id="MyTable" class="table table-hover">
          <thead>
            <tr align="center">
              <th>Date - Heure (départ)</th>
              <th>Trajet</th>
              <th>Points</th>
              <th>Conducteur</th>
            </tr>
          </thead>
          <tbody align="center">

            <?php


            $idCovoitureur = $_SESSION['idCovoitureur'];

            $sql = "SELECT Participation.Date, Point_A.Nom AS Point_A_Nom, Point_B.Nom AS Point_B_Nom, Etape.Kilometrage, Covoitureur.Nom, Covoitureur.Prenom 
            FROM Covoiturage, Etape 
            INNER JOIN Participation ON Etape.idParticipation = Participation.idParticipation 
            INNER JOIN Point_RDV AS Point_A ON Etape.idPoint_RDV_A = Point_A.idPoint_RDV 
            INNER JOIN Point_RDV AS Point_B ON Etape.idPoint_RDV_B = Point_B.idPoint_RDV 
            INNER JOIN Voiture ON Etape.idVoiture=Voiture.idVoiture 
            INNER JOIN Covoitureur ON Voiture.idCovoitureur=Covoitureur.idCovoitureur 
            WHERE Participation.idCovoiturage = Covoiturage.idCovoiturage AND Participation.idCovoitureur=$idCovoitureur AND Participation.Date<NOW()
            ORDER BY Date";

            $res = $GLOBALS['mysqli']->query($sql);
            while ($row = $res->fetch_assoc()) 
            {
              echo "<tr>
              <td><div style='padding-top: 2em; padding-bottom: 2em;'>" . $row['Date'] . "</div></td>
              <td><div style='padding-top: 1em; padding-bottom: 1em;'>" . $row['Point_A_Nom'] . "<br/> ~ <br/>" .$row['Point_B_Nom'] ."</div></td>
              <td><div style='padding-top: 2em; padding-bottom: 2em;'>" . $row['Kilometrage'] . "</div></td>
              <td><div style='padding-top: 2em; padding-bottom: 2em;'>" . $row['Nom'] . " " . $row['Prenom'] . "</div></td>
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

<script>
  var $rows = $('#MyTable tr');
  $('#MyInput').keyup(function() {

    var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
      reg = RegExp(val, 'i'),
      text;

    $rows.show().filter(function() {
      text = $(this).text().replace(/\s+/g, ' ');
      return !reg.test(text);
    }).hide();
  });
</script>

<style>
  #myInput {
    background-position: 10px 10px;
    background-repeat: no-repeat;
    width: 100%;
    font-size: 16px;
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
  }
</style>