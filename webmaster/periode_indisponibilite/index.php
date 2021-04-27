<?php 
  include('../bootstrap.html');

  if(isset($_POST['date_debut']) && isset($_POST['date_fin']))
  {
    require_once "../request/Indisp.php"; 
    
    $Ajouter_Indisponibilite = new Indisp();
    $Ajouter_Indisponibilite->add_indisp($_POST['date_debut'],$_POST['date_fin'],$_POST['flexRadioDefault'],1);
  }?>

<title>Période Indisponibilité</title>

<div class="container p-3 my-3 border shadow rounded" align="center">


  <div class="container bg-success p-2 my-2 rounded">
    <a href="/index.php">
      <button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
    </a>
    <h2 class="text-center" style="color: white;">Période Indisponibilité</h2>
  </div>


  <!-- FORM -->
  <form class="needs-validation" method="post" action="">


    <!-- FORM Input Fields -->
    <div class="form-group" align="center">
      <label for="date_debut" class="mr-sm-2">Date de début : </label><br/>
      <input type="date" class="mb-2 mr-sm-2" placeholder="aaaa-mm-jj" name="date_debut" required>
    </div>

    <div class="form-group" align="center">
      <label for="date_fin" class="mr-sm-2">Date de fin : </label><br/>
      <input type="date" class="mb-2 mr-sm-2" placeholder="aaaa-mm-jj" name="date_fin" required>
    </div>


    <!-- FORM Radio Buttons -->
    <div class="container" align="center" required>

      <div class="form-check">
        <input class="form-check-input" checked="checked" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Vacances">
        <label class="form-check-label" for="flexRadioDefault1">Vacances</label>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Confinement">
        <label class="form-check-label" for="flexRadioDefault2">Confinement</label>
      </div>

    </div>


    <!-- FORM Submit Button -->
    <div align="center">
      <br/><button type="submit" class="btn btn-success">Valider</button>

      <?php

        if(isset($_GET['error']) && $_GET['error'] == 'ok')
        {
          echo "</br></br>
            <div class='alert alert-success text-center'>
            <h5><strong>La période d'indisponibilité a bien été ajoutée.</strong></h5>
            </div>";
        }

        if(isset($_GET['error']) && $_GET['error'] == 'erreur')
        {
          echo "</br></br>
            <div class='alert alert-danger text-center'>
            <h2><strong>Erreur</strong></h2>
            </div>";
        }

        $verif_ajout = new Indisp();

        if($verif_ajout->verif_indisp($_POST['date_debut'],$_POST['date_fin'],$_POST['flexRadioDefault'],1) == True)
        {
          header('Location: ?error=ok');
        }
        else
        {
          header('Location: ?error=erreur');
        }
      ?>

    </div>

  </form>

</div>
