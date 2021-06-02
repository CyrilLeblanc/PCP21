<!DOCTYPE html>
<html>

<head>
  <?php 
		include_once '../../bootstrap.php';
    require_once '../../request/Point.php';

    if(isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['latitude']) && isset($_POST['longitude']))
    {
      if(isset($_POST['submit']) && !empty($_FILES['photo']['name']))
      {
        $filename = $_FILES['photo']['name'];
        $tempname = $_FILES['photo']['tmp_name'];
        $filesize = $_FILES['photo']['size'];
        $error = 1;
        $folder = "../images/".$filename;

        $extension = new SplFileInfo($filename);
        $ext = $extension->getExtension();

        $newname = "/PCP21/webmaster/images/" . $_POST['nom'] . "_" . $_POST['ville'] . "." . $ext;
        $newfolder = "../images/" . $_POST['nom'] . "_" . $_POST['ville'] . "." . $ext;

        $newname = addslashes($newname);

        if(move_uploaded_file($tempname,$folder)) 
        {
          $_FILES['photo'] = $newname;
        }
        else 
        { 
          $_FILES['photo'] = null;

          echo "</br></br>
            <div class='alert alert-danger text-center'>
            <h2><strong>Il y a un problème avec l'envoi de votre image.</strong></h2>
            </div>"; 
        }

        if($filesize > 5000000)
        {
          echo "</br></br>
            <div class='alert alert-danger text-center'>
            <h2><strong>Le fichier dépasse la taille maximale de 5Mo.</strong></h2>
            </div>";
          $error = 0;
        }

        if($ext != "jpg" && $ext != "jpeg" && $ext != "png")
        {
          echo "</br></br>
            <div class='alert alert-danger text-center'>
            <h2><strong>Seulement les fichiers .jpg, .jpeg et .png sont acceptés.</strong></h2>
            </div>";
          $error = 0;
        }

        if ($error == 0) 
        {
          unlink($folder);
          $newname = null;
          
          echo "</br></br>
            <div class='alert alert-danger text-center'>
            <h2><strong>Votre image n'a pas été ajoutée</strong></h2>
            </div>";
        }

        //Ajout du Point de RDV avec image
        $Ajouter_Point_RDV = new Point();
        $Ajouter_Point_RDV->add_Point($_POST['nom'],$_POST['adresse'],$_POST['ville'],$_POST['latitude'],$_POST['longitude'],$newname,1);

        if($error == 1)
        {
          rename($folder, $newfolder);
        }
      }
      elseif(isset($_POST['submit']) && empty($_FILES['photo']['name']))
      {
        //Ajout du Point de RDV sans image
        $Ajouter_Point_RDV = new Point();
        $Ajouter_Point_RDV->add_Point($_POST['nom'],$_POST['adresse'],$_POST['ville'],$_POST['latitude'],$_POST['longitude'],null,1);
      }

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

      <h1>Ajouter un point d'interrogation pour expliquer comment récupérer les coordonnées facilement.</h1>

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
            if($verif_ajout->verif_Point($_POST['nom'],$_POST['adresse'],$_POST['ville'],$_POST['latitude'],$_POST['longitude']))
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
        ?>

      </div>

    </form>

  </div>
</body>

</html>
