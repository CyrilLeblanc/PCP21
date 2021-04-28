<?php
require_once 'request/Point.php';
require_once 'request/Covoitureur.php';

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

      <tr>
        <td>22/03/2021</td>
        <td>74170 Saint-Gervais-les-Bains</td>
        <td>74300 Lycée Charles Poncet</td>
        <td>-12</td>
        <td>TERRE David</td>
      </tr>

<?php



$Inscription = new Covoitureur();
$table_info_inscr = $Inscription -> get_date_depart(1);

$PointA = new Point();
$table1 = $PointA -> get_point_info(1);

$PointB = new Point();
$table2 = $PointB -> get_point_info(2);

$Kilom = new Covoitureur();
$table_info_kilom = $Kilom -> get_participation(11);

$Conducteur = new Covoitureur();
$table_conduct = $Conducteur -> get_user(20);




for($i = 0; $i < sizeof($table_info_kilom);$i++)
{
          
    echo
      '<tr>
          <td>'.$Inscription->get_date_depart($table_info_inscr['idInscription'])['Date_Depart'].'</td>'.
          '<td>'.$PointA->get_point_info($table1['idPoint_RDV'])['Nom'].'</td>'.
          '<td>'.$PointB->get_point_info($table2['idPoint_RDV'])['Nom'].'</td>'.

          '<td>'.$table_info_kilom[$i]["Kilometrage"].'</td>'. //modifier par le km dans participation
          
          '<td>'.$Conducteur->get_user($table_conduct['idCovoitureur'])['Nom'].' '.$Conducteur->get_user($table_conduct['idCovoitureur'])['Prenom'].'</td>
         
      </tr>';


          
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