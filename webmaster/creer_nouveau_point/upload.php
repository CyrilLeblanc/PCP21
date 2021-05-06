<?php
  include_once '../../bootstrap.html';
  require_once "../request/Point.php"; 

  $target_dir = "../images/";
  $target_file = $target_dir . basename($_FILES["photo"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
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

  // Check file size
  if ($_FILES["photo"]["size"] > 2000000) { //ToDO
    echo "</br></br>
      <div class='alert alert-danger text-center'>
      <h2><strong>Le fichier dépasse la taille maximale.</strong></h2>
      </div>";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "</br></br>
      <div class='alert alert-danger text-center'>
      <h2><strong>Seulement les fichiers .jpg, .jpeg et .png sont acceptés.</strong></h2>
      </div>";
    $uploadOk = 0;
  }

  $new_name = $_POST["nom"] . '_' . $_POST["ville"] . '.' . $imageFileType;

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "</br></br>
      <div class='alert alert-danger text-center'>
      <h2><strong>Il y a eu une erreur avec votre fichier.</strong></h2>
      </div>";
  // if everything is ok, try to upload file
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
  }
  
  //Pour pouvoir envoyer le chemin d'accès de l'image dans le BDD.
?>