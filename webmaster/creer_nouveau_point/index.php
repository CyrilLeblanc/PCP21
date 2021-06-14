<!DOCTYPE html>
<html>

<head>
  <?php
    require_once '../../config.php'; 
    require_once $GLOBALS['racine'] . 'webmaster/verif_session_WB.php';
    include $GLOBALS['racine'] . 'bootstrap.php';
    require_once $GLOBALS['racine'] . 'request/Point.php';

    if(isset($_POST['submit']))
    {
        //Ajout du Point de RDV sans image
        $Ajouter_Point_RDV = new Point();
        $Ajouter_Point_RDV->add_Point($_POST['nom'],$_POST['adresse'],$_POST['ville'],$_POST['latitude'],$_POST['longitude'],null,1);
    }
  ?>
  <title>Création Nouveau Point RDV</title>
</head>

<body>
  <div class="container p-3 my-3 border shadow rounded" align="center">

    <div class="container bg-success p-2 my-2 rounded">
      <a href="../../accueil">
        <button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
      </a>
      <h2 class="text-center" style="color: white;">Créer Nouveau Point RDV</h2>
    </div>

    <!-- FORM -->
    <form class="needs-validation" method="post" action="" enctype="multipart/form-data">

      <!-- FORM Input Fields -->
      <div class="form-group" align="center">
        <label for="nom" class="mr-sm-2">Nom : </label><br/>
        <input type="text" class="mb-2 mr-sm-2 w-100" placeholder="Lycée Charles Poncet" name="nom" required>
      </div>

      <div class="form-group" align="center">
        <label for="adresse" class="mr-sm-2">Adresse : </label><br/>
        <input type="text" class="mb-2 mr-sm-2 w-100" placeholder="1 avenue de Charles Poncet" name="adresse" required>
      </div>

      <div class="form-group" align="center">
        <label for="ville" class="mr-sm-2">Ville : </label><br/>
        <input type="text" class="mb-2 mr-sm-2 w-100" placeholder="74300 Cluses" name="ville" required>
      </div>

      <div class="form-group" align="center">
        <label for="latitude" class="mr-sm-2">Latitude : </label><br/>
        <input type="text" class="mb-2 mr-sm-2 w-100" placeholder="46.0621" name="latitude" required>
      </div>

      <div class="form-group" align="center">
        <label for="longitude" class="mr-sm-2">Longitude : </label><br/>
        <input type="text" class="mb-2 mr-sm-2 w-100" placeholder="6.5787" name="longitude" required>
      </div>

      <input id="idPoint" name="idPoint" value="" hidden></input>

      <!-- FORM Submit Button -->
      <div align="center">
        <br/><button type="submit" class="btn btn-success" name="submit">Valider</button>

        <?php

          //Vérifie si le point a bien été ajouté
          $verif_ajout = new Point();
          if(isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['latitude']) && isset($_POST['longitude']))
          {
            $id = $GLOBALS['mysqli']->insert_id;

            if($verif_ajout->verif_Point($_POST['nom'],$_POST['adresse'],$_POST['ville'],$_POST['latitude'],$_POST['longitude'],$id))
            {
              echo "</br></br>
                <div class='alert alert-success text-center'>
                <h5><strong>Le Point de RDV a bien été ajouté.</strong></h5>
                </div>";
            }
            else
            {
              echo "</br></br>
                <div class='alert alert-danger text-center'>
                <h2><strong>Erreur d'ajout de Point de RDV.</strong></h2>
                </div>";
            }
          }
        ?>

      </div>

    </form>

  </div>
</body>

</html>
