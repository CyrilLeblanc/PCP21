
<?php
require_once '../request/Point.php';
require_once '../request/Covoitureur.php';

?>
<!-- Modal -->
<div class="modal fade" id="DemandeCovoiturage" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        

        <div class="container">

    <form action="DemandeCovoiturage/check_demande_cov.php" id="titre_covoi" method="post">
    <h5 class="modal-title" id="titre_covoiturage">Demande de Covoiturage</h5>
    <br>

      <?php
/*
$PointD = new Point();
$table_depart = $PointD -> get_Point(True);

  echo '<div class="form-group ">';
  echo '<label for="arrive">Point de départ</label>';
  echo '<select class="custom-select my-1 mr-sm-2" id="point_depart" name="point_depart">';
  echo '<option selected value="NULL">Choisir...</option>';

  foreach($table_depart as $value)
  {
    echo '<option value="'.$value["idPoint_RDV"].'">'.$value["Nom"].'</option>';
          
  }

  echo '</select>';
  echo '</div>';

  */
?>

	<h6>Date de départ<h6>
      
  <div>
    <input type="date" id="date_depart" name="date_depart" required>
    <span class="validity"></span>
  </div>
      
      <br>


      <h6>Heure d'arrivée<h6>
      
  <input id="heure_arrive" type="time" name="heure_arrive"
         min="07:00" max="18:00" required>
  <span class="validity"></span>

      
      <br><br>

      
<?php
/*
$PointA = new Point();
$table_arrive = $PointA -> get_Point(True);

  echo '<div class="form-group ">';
  echo '<label for="arrive">Point arrivé</label>';
  echo '<select class="custom-select my-1 mr-sm-2" id="point_arrive" name="point_arrive">';
  echo '<option selected value="NULL">Choisir...</option>';

  foreach($table_arrive as $value)
  {
    echo '<option value="'.$value["idPoint_RDV"].'">'.$value["Nom"].'</option>';
          
  }

  echo '</select>';
  echo '</div>';
 */
?>

  
 <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="destination" value="1">Aller-Retour
  </label>
</div>

<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="destination" value="0">Aller
  </label>
</div>

<div class="form-check-inline disabled">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="destination" value="1">Retour
  </label>
</div>


  

      
      <br><br>


<div class="form-check-inline font-weight-bold">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="1" id="is_unique1" name="is_unique">Plannification Pour toute l'année 2020-2021
  </label>
</div>

<input type="hidden" class="form-check-input" value="0" id="is_unique0" name="is_unique">

      


  <div class="form-group">
    <label for="scroll_jour">Jour de semaine</label>
    <select class="custom-select my-1 mr-sm-2" id="jour" name="jour_semaine">
    <option value="NULL" selected>Choisir...</option>

    <option value="Lundi">Lundi</option>
    <option value="Mardi">Mardi</option>
    <option value="Jeudi">Jeudi</option>
    <option value="Vendredi">Vendredi</option>
    <option value="Samedi">Samedi</option>
    <option value="Dimanche">Dimanche</option>
    
  </select>
  </div>
      
      <br>

  <div class="form-group">
    <label for="scroll_regime">Régime de semaine</label>
    <select class="custom-select my-1 mr-sm-2" id="regime" name="semaine">
    <option value="NULL" selected>Choisir...</option>

    <option value="A">A</option>
    <option value="B">B</option>
    
  </select>
  </div>

  

  

      
      <br>
      

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-success">Confirmer</button>
        <?php

       

        ?>
      </div>
      
        </div>
    </div>
    </div>
  </div>
</div>

</form>

<script>


</script>