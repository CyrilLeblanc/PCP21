<?php
require_once '../request/Point.php';
require_once '../request/Covoitureur.php';
?>

<script>
function check_plan(){
 let x = document.getElementById("is_unique").checked
 if(x)
 {
  document.getElementById("jour").removeAttribute("hidden");
  document.getElementById("regime").removeAttribute("hidden");
 } else {
  document.getElementById("jour").setAttribute("hidden", "");
  document.getElementById("regime").setAttribute("hidden", "");
 }
}
</script>

<!-- Modal -->
<div class="modal fade" id="DemandeCovoiturage" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titre_covoiturage">Demande de Covoiturage</h5>
      </div>
      <div class="container">
        <form action="DemandeCovoiturage/check_demande_cov.php" id="titre_covoi" method="post">
          <br>

          <h6>Date de départ<h6>
          <div>
            <input type="date" id="date_depart" name="date_depart">
            <span class="validity"></span>
          </div>
          <br>

          <h6>Heure d'arrivée<h6>
          <input id="heure_arrive" type="time" name="heure_arrive" min="07:00" max="18:00">
          <span class="validity"></span>
          <br><br>


          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="destination" value="1" checked>Aller-Retour
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
            <input type="hidden" class="form-check-input" value="0" name="is_unique">
            <input type="checkbox" class="form-check-input" value="1" id="is_unique" name="is_unique" onclick="check_plan()">
            <label class="form-check-label" for="is_unique">Plannification Pour toute l'année 2020-2021</label>
          </div>


          <div class="form-group" id="jour" hidden>
            <label for="scroll_jour">Jour de semaine</label>
            <select class="custom-select my-1 mr-sm-2" id="jour" name="jour_semaine">
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

          <div class="form-group" id="regime" hidden>
            <label for="scroll_regime">Régime de semaine</label>
            <select class="custom-select my-1 mr-sm-2" id="regime" name="semaine">
              <option selected>Choisir...</option>
              <option value="A">A</option>
              <option value="B">B</option>
            </select>
          </div>
          <br>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-success">Confirmer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>