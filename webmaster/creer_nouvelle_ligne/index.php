<!DOCTYPE html>
<html>

<head>
  <?php
		require_once '../../config.php'; 
    require_once $GLOBALS['racine'] . 'webmaster/verif_session_WB.php';
		include $GLOBALS['racine'] . 'bootstrap.php';
		require_once $GLOBALS['racine'] . 'request/Ligne.php';
	?>
  <title>Création Nouvelle Ligne</title>
</head>

<body>
  <div class="container p-3 my-3 border shadow rounded" align="center">

    <div class="container bg-success p-2 my-2 rounded" >
      <a href="../../accueil">
        <button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
      </a>
      <h2 class="text-center" style="color: white;">Créer Nouvelle Ligne</h2>
    </div>

    <!-- FORM -->
    <form class="needs-validation" method="post" action="">


      <!-- FORM Input Field -->
      <div class="form-group" align="center">
        <label for="nom" class="mr-sm-2">Veuillez choisir un nom pour la nouvelle Ligne : </label><br/>
        <input type="text" class="mb-2 mr-sm-2" name="nomLigne" required>
      </div>

      <!-- FORM Submit Button -->
      <div align="center">
        <br/><button type="submit" class="btn btn-success" name="submit">Valider</button>
        <?php
          if(isset($_POST['submit']))
          {
            $submit_Ligne = new Ligne();
            $submit_Ligne->add_Ligne($_POST['nomLigne']);
            
            echo '</br></br>
                <div class="alert alert-success text-center">
                <h5><strong>La Ligne " ' . $_POST['nomLigne'] . ' " a bien été créée.</strong></h5>
                <h5>Veuillez vous rendre dans "Modifier Ligne" pour lui ajouter des Points de RDV.</h5>
                </div>';
          }
        ?>
      </div>

    </form>

  </div>
</body>

</html>