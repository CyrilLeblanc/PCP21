<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="index.css" />
	<script type="checkbox"></script>
	<title>Inscription - Covoiturage Participatif</title>
	<?php include('../../bootstrap.php') ?>
      <?php include('../../config.php') ?>
</head>
<body class="bg-success">
<div class="container rounded shadow border bg-white">
	<br>
  <h1>Ajout du véhicule</h1>
  <form method="post" action="Form_Ajout_Véhicule.php" class="form-group">
      <div class="form-group">
            <label for="name">Marque *:</label>
            <input type="text" class="form-control" id="marque" placeholder="" name="marque" required>
      </div>
      <div class="form-group">
            <label for="name">Modèle *:</label>
            <input type="text" class="form-control" id="modele" placeholder="" name="modele" required>
      </div>
      <div class="form-group">
            <label for="name">Couleur *:</label>
            <input type="text" class="form-control" id="couleur" placeholder="" name="couleur" required>
      </div>
      <div class="form-group">
            <label for="name">Année *:</label>
            <input class="form-control" id="annee" placeholder="" name="annee" type="number" min="1900" max="2099" required>
      </div>
      <div class="form-group">
            <label for="name">Nombre de place *<small>(en comptant le conducteur)</small>: </label>
            <input class="form-control" id="nbr_place" placeholder="" name="nbr_place" type="number" min="2" max="20" required>
      </div>
      <button type="submit" class="btn btn-primary">Suivant</button>
    </form>
</body>
</html>