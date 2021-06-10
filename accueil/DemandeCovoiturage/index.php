<script>
  function check_plan() {
    let x = document.getElementById("is_unique").checked
    if (x) {
      document.getElementById("jour").removeAttribute("hidden");
      document.getElementById("regime").removeAttribute("hidden");
      document.getElementById("date_depart").setAttribute('hidden', "");
    } else {
      document.getElementById("jour").setAttribute("hidden", "");
      document.getElementById("regime").setAttribute("hidden", "");
      document.getElementById("date_depart").removeAttribute("hidden");
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

          <div id="date_depart">
            <label for="date_depart">Date de Départ</label><br />
            <input type="date" id="date_depart" name="date_depart">
            <span class="validity"></span>
          </div>
          <br>

          <label for="heure_arrive">Heure d'arrivée</label><br />
          <input id="heure_arrive" type="time" name="heure_arrive" min="07:00" max="18:00">
          <span class="validity"></span>
          <br><br>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-success">Confirmer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>