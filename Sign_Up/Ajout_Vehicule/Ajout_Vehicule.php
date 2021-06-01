<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="index.css" />
	<script type="checkbox"></script>
	<title>Inscription - Covoiturage Participatif</title>
	<?php include('./bootstrap.html') ?>
  <?php include('./config.php') ?>
</head>
<body class="bg-success">
<div class="container rounded shadow border bg-white">
	<br>
  <h1>Ajout du véhicule</h1>
  <form method="post" action="Form_Ajout_Véhicule_BDD_1.php" class="form-group">
<div class="form-group">
      <label for="name">Marque *:</label>
      <input type="name" class="form-control" id="marque" placeholder="" name="marque" required>
    </div>
<div class="form-group">
      <label for="name">Modèle *:</label>
      <input type="name" class="form-control" id="modele" placeholder="" name="modele" required>
    </div>
<div class="form-group">
      <label for="name">Couleur *:</label>
      <input type="name" class="form-control" id="couleur" placeholder="" name="couleur" required>
    </div>
<div class="form-group">
      <label for="name">Année *:</label>
      <input type="name" class="form-control" id="annee" placeholder="" name="annee" required>
    </div>
<div class="form-group">
      <label for="name">Nombre de place *:</label>
      <input type="name" class="form-control" id="nbr_place" placeholder="" name="nbr_place" required>
    </div>
      <button type="submit" class="btn btn-primary">Suivant</button>
    </form>
</body>
</html>