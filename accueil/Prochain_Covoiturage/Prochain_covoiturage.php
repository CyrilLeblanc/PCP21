<?php
//include_once 'Detail.php';
require_once '../config.php';
require_once $GLOBALS['racine']."request/Covoitureur.php";
?>

<h2 style="text-align: center;">Mes Prochains Covoiturages</h2>

  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Date - Heure (départ)</th>
        <th>Point départ</th>
        <th>Point d'arrivée</th>
        <th>Points</th>
        <th>Détails</th>
        <!--<th>Annuler</th>-->
      </tr>
    </thead>
    <tbody>

<?php
  $idCovoitureur = $_SESSION['idCovoitureur'];

  $InfoConduct = new Covoitureur();
  $is_conducteur = $InfoConduct -> get_is_conduct($idCovoitureur);

  $InfoProchainsCov = new Covoitureur();
  $table = $InfoProchainsCov -> get_info_prochains_covoiturages($idCovoitureur);

foreach($table as $covoit)
{
    echo
      '<tr>
          <td>'.$covoit["Date"].'</td>'.
          '<td>'.$covoit["PointA_Nom"].'</td>'.
          '<td>'.$covoit["PointB_Nom"].'</td>'.
          '<td>'.$is_conducteur.$covoit["Kilometrage"].'</td>'.
          '<td> <button class="btn material-icons float-center" data-toggle="modal" data-target="#detail" style="color: green; font-size: 200%;">&#xe531;</button></td>
      </tr>';
}


?>
      
    </tbody>

  </table>

  <!-- '<td>'.$Conducteur->get_user($table_conduct['idCovoitureur'])['Nom'].' '.$Conducteur->get_user($table_conduct['idCovoitureur'])['Prenom'].'</td> -->



