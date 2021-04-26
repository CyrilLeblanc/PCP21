
<?php
require_once 'request\Point.php';
require_once 'request\Covoitureur.php';

?>
<!-- Modal -->
<div class="modal fade" id="DemandeCovoiturage" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        

        <div class="container">

    <form action="./demande_Covoiturage.php" id="titre_covoi">
    <h5 class="modal-title" id="titre_covoiturage">Demande de Covoiturage</h5>
    <br>

      <?php

$PointD = new Point();
$table_depart = $PointD -> get_Point(True);

  echo '<div class="form-group ">';
  echo '<label for="arrive">Point de départ</label>';
  echo '<select class="custom-select my-1 mr-sm-2" id="point_depart">';
  echo '<option selected value="NULL">Choisir...</option>';

  foreach($table_depart as $value)
  {
    echo '<option value="">'.$value["Nom"].'</option>';
          
  }

  echo '</select>';
  echo '</div>';
?>

      <h6>Heure d'arrivée<h6>
      
  <input id="heure_arrive" type="time" name="heure_arrive"
         min="07:00" max="18:00" required>
  <span class="validity"></span>

      
      <br>

      <h6>Date de départ<h6>
      
  <div>
    <input type="date" id="date_depart" name="date_depart" required>
    <span class="validity"></span>
  </div>
      
      <br>
<?php

$PointA = new Point();
$table_arrive = $PointA -> get_Point(True);

  echo '<div class="form-group ">';
  echo '<label for="arrive">Point arrivé</label>';
  echo '<select class="custom-select my-1 mr-sm-2" id="point_arrive">';
  echo '<option selected value="NULL">Choisir...</option>';

  foreach($table_arrive as $value)
  {
    echo '<option value="">'.$value["Nom"].'</option>';
          
  }

  echo '</select>';
  echo '</div>';
?>

      
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="aller_retour">
  <label class="form-check-label" for="defaultCheck1">  
    Aller-Retour
  </label>
</div>

      
      <br>



<div class="form-check">
  <input class="form-check-input" type="checkbox" name="bouton" id="aller_retour">
  <label class="form-check-label" for="aller_retour">

    <h5>Plannification Pour toute l'année 2020-2021</h5>
  </label>
</div>
      


  <div class="form-group">
    <label for="scroll_jour">Jour de semaine</label>
    <select class="custom-select my-1 mr-sm-2" id="jour">
    <option selected>Choisir...</option>

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
    <select class="custom-select my-1 mr-sm-2" id="regime">
    <option selected>Choisir...</option>

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


<script type="text/javascript" language="javascript">
    function activer( elem, statut ){
    var mon_bouton = document.forms.formulaire.bouton;
 
        if (mon_bouton.value=='Activer') {
            elem.disabled = statut;
            mon_bouton.value = 'Desactiver'
        } else {
            elem.disabled = !statut;
            mon_bouton.value ='Activer'
        }
     
    }
</script>