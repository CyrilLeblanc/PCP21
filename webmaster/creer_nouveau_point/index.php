<!DOCTYPE html>
<html>

<head>
  <?php 
		include('../bootstrap.html');
		require_once "../request/Point.php"; 

    if(isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['photo']))
    {
      $Ajouter_Point_RDV = new Point();
      $Ajouter_Point_RDV->add_Point($_POST['nom'],$_POST['adresse'],$_POST['ville'],$_POST['latitude'],$_POST['longitude'],$_POST['photo']);
    }?>
	?>
  <title>Création Nouveau Point</title>
</head>

<body>
  <div class="container p-3 my-3 border shadow rounded" align="center">


    <div class="container bg-success p-2 my-2 rounded" >
      <a href="/index.php">
        <button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
      </a>
      <h2 class="text-center" style="color: white;">Créer Nouveau Point</h2>
    </div>

    <!-- FORM -->
    <form class="needs-validation" method="post" action="">


      <!-- FORM Input Fields -->
      <div class="form-group" align="center">
        <label for="nom" class="mr-sm-2">Nom : </label><br/>
        <input type="text" class="mb-2 mr-sm-2" placeholder="Lycée Charles Poncet" name="nom" required>
      </div>

      <div class="form-group" align="center">
        <label for="adresse" class="mr-sm-2">Adresse : </label><br/>
        <input type="text" class="mb-2 mr-sm-2" placeholder="1 avenue de Charles Poncet" name="adresse" required>
      </div>

      <div class="form-group" align="center">
        <label for="ville" class="mr-sm-2">Ville : </label><br/>
        <input type="text" class="mb-2 mr-sm-2" placeholder="74300 Cluses" name="ville" required>
      </div>

      <div class="form-group" align="center">
        <label for="latitude" class="mr-sm-2">Latitude : </label><br/>
        <input type="text" class="mb-2 mr-sm-2" placeholder="46.0621" name="latitude" required>
      </div>

      <div class="form-group" align="center">
        <label for="longitude" class="mr-sm-2">Longitude : </label><br/>
        <input type="text" class="mb-2 mr-sm-2" placeholder="6.5787" name="longitude" required>
      </div>

      <div class="form-group" align="center">
        <label for="photo" class="mr-sm-2">Photo : </label><br/>
        <input type="file" class="mb-2 mr-sm-2" name="photo" required>
      </div>

      <!-- FORM Submit Button -->
      <div align="center">
        <br/><button type="submit" class="btn btn-success">Valider</button>

        <?php

          if(isset($_GET['error']) && $_GET['error'] == 'ok')
          {
            echo "</br></br>
              <div class='alert alert-success text-center'>
              <h5><strong>Le Point de RDV a bien été ajouté.</strong></h5>
              </div>";
          }

          if(isset($_GET['error']) && $_GET['error'] == 'erreur')
          {
            echo "</br></br>
              <div class='alert alert-danger text-center'>
              <h2><strong>Erreur</strong></h2>
              </div>";
          }

          $verif_ajout = new Point();
      if(isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['photo']))
      {
        if($verif_ajout->verif_point($_POST['nom'],$_POST['adresse'],$_POST['ville'],$_POST['latitude'],$_POST['longitude'],$_POST['photo']) == True)
        {
          header('Location: ?error=ok');
        }
        else
        {
          header('Location: ?error=erreur');
        }
      }

          
        ?>

      </div>

    </form>

    </form>

  </div>
</body>

</html>
