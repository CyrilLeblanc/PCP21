<?php
require_once '../config.php';
?>

<!-- Modal -->
<div class="modal fade" id="Voiture" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Histo">Liste des voitures</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        </br>

        <table id="MyTable" class="table table-hover">
          <thead>
            <tr>
             <th>Voiture</th>
              <th>Marque</th>
              <th>Modèle</th>
              <th>Année</th>
              <th>Couleur</th>
              <th>Places</th>
            </tr>
          </thead>
          <tbody>

            <?php


            $idCovoitureur = $_SESSION['idCovoitureur'];

            $sql = "SELECT * FROM Voiture WHERE idCovoitureur=$idCovoitureur";
            $nbrVoiture=1;

            $res = $GLOBALS['mysqli']->query($sql);
            while ($row = $res->fetch_assoc()) 
            {
              echo "<tr>
              <td>"."#".$nbrVoiture."</td>
                <td>" . $row['Marque'] . "</td>
                <td>" . $row['Modele'] . "</td>
                <td>" . $row['Annee'] . "</td>
                <td>" . $row['Couleur'] . "</td>
                <td>" . $row['Nbr_Place'] . "</td>
              </tr>";

              $nbrVoiture++;
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