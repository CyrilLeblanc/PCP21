<!DOCTYPE html>
<html>

<head>
  <?php 
		include_once '../../bootstrap.html';
    require_once '../request/Point.php';

    if(isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['latitude']) && isset($_POST['longitude']))
    {

      if(isset($_POST['submit']))
      {
        $filename = $_FILES['photo']['name'];
        $tempname = $_FILES['photo']['tmp_name'];
        $folder = "../images/".$filename;

        $extension = new SplFileInfo($filename);
        $ext = $extension->getExtension();

        $newname = "/PCP21/webmaster/images/" . $_POST['nom'] . "_" . $_POST['ville'] . "." . $ext;
        $newfolder = "../images/" . $_POST['nom'] . "_" . $_POST['ville'] . "." . $ext;

        if(move_uploaded_file($tempname,$folder)) 
        {
          $_POST['photo'] = $newname;
        }
        else 
        { 
          $_POST['photo'] = "";

          echo "</br></br>
            <div class='alert alert-danger text-center'>
            <h2><strong>La photo ne s'est pas envoyée.</strong></h2>
            </div>"; 
        }
      }

      //Ajout du Point de RDV
      $Ajouter_Point_RDV = new Point();
      $Ajouter_Point_RDV->add_Point($_POST['nom'],$_POST['adresse'],$_POST['ville'],$_POST['latitude'],$_POST['longitude'],$_POST['photo'],1);

      rename($folder, $newfolder);
    }
  ?>
  <title>Création Nouveau Point RDV</title>
</head>

<body>
  <div class="container p-3 my-3 border shadow rounded" align="center">


    <div class="container bg-success p-2 my-2 rounded">
      <a href="/index.php">
        <button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
      </a>
      <h2 class="text-center" style="color: white;">Créer Nouveau Point RDV</h2>
    </div>


    <!-- FORM -->
    <form class="needs-validation" method="post" action="" enctype="multipart/form-data">

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

        <?php

          //Vérifie si le point a bien été ajouté
          $verif_ajout = new Point();
          if(isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['latitude']) && isset($_POST['longitude']))
          {
            if($verif_ajout->verif_Point($_POST['nom'],$_POST['adresse'],$_POST['ville'],$_POST['latitude'],$_POST['longitude']) == True)
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
                <h2><strong>Erreur d'ajout de point de RDV.</strong></h2>
                </div>";
            }
          }


          /*//Gestion de l'image
          $target_dir = "../images/";
          $target_file = $target_dir . basename($_FILES["photo"]["name"]);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          $fullPath = "/PCP21/webmaster/images/" . $_POST['photo'];

          echo $fullPath;

          //Vérifie s'il s'agit vraiment d'une image
          if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["photo"]["tmp_name"]);
            if($check !== false) {
              $uploadOk = 1;
            } else {
              echo "</br></br>
                <div class='alert alert-danger text-center'>
                <h2><strong>Le fichier n'est pas une image.</strong></h2>
                </div>";
              $uploadOk = 0;
            }
          }
          //Vérifie la taille de l'image
          if ($_FILES["photo"]["size"] > 2000000) { //ToDO
            echo "</br></br>
              <div class='alert alert-danger text-center'>
              <h2><strong>Le fichier dépasse la taille maximale.</strong></h2>
              </div>";
            $uploadOk = 0;
          }

          //Autorise certains formats de fichiers
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "</br></br>
              <div class='alert alert-danger text-center'>
              <h2><strong>Seulement les fichiers .jpg, .jpeg et .png sont acceptés.</strong></h2>
              </div>";
            $uploadOk = 0;
          }

          $new_name = $_POST["nom"] . '_' . $_POST["ville"] . '.' . $imageFileType;

          //Vérifie s'il y a eu une erreur
          if ($uploadOk == 0) {
            echo "</br></br>
              <div class='alert alert-danger text-center'>
              <h2><strong>Il y a eu une erreur avec votre fichier.</strong></h2>
              </div>";
          //Si tout est ok, on upload l'image
          } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir . $new_name)) {
              echo "</br></br>
              <div class='alert alert-success text-center'>
              <h5><strong>Le fichier ". htmlspecialchars(basename($new_name)). " a bien été uploadé.</strong></h5>
              </div>";
            } else {
              echo "</br></br>
                <div class='alert alert-danger text-center'>
                <h2><strong>Il y a une erreur.</strong></h2>
                </div>";
            }
          }*/
        ?>

      </div>

    </form>

  </div>
</body>

</html>
