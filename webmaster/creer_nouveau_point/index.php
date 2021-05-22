<!DOCTYPE html>
<html>

<head>
<?php 
		include_once '../../bootstrap.html';
    require_once '../request/Point.php';
  ?>
  <title>Création Nouveau Point RDV</title>
</head>

<body>
  <div class="container p-3 my-3 border shadow rounded" align="center">


    <div class="container bg-success p-2 my-2 rounded" >
      <a href="/index.php">
        <button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
      </a>
      <h2 class="text-center" style="color: white;">Créer Nouveau Point RDV</h2>
    </div>


    <!-- FORM -->
    <form class="needs-validation" method="post" action="upload.php" enctype="multipart/form-data">

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
        <input type="file" class="mb-2 mr-sm-2" name="photo" id="photo">
      </div>

      <!-- FORM Submit Button -->
      <div align="center">
        <br/><button type="submit" class="btn btn-success" name="submit">Valider</button>


      </div>

    </form>

    </form>

  </div>
</body>

</html>
