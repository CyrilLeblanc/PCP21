<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="index.css" />
	<script type="checkbox"></script>
	<title>Inscription - Covoiturage Participatif</title>
	<?php include('./bootstrap.html') ?>
</head>
<body class="bg-success">
<div class="container rounded shadow border bg-white">
	<br>
  <h1>Ajout du point de rendez-vous</h1>
  <div class="form-group">
<input type="radio"
  name="choix1"
  value="choix1"> Utiliser un point existant déjà
  	<br>
<input type="radio"
  name="choix2"
  value="choix2"> Créer un nouveau point de rendez-vous
</div>
<form method="post" action="Form_Ajout_Point.php" class="form-group">
<div class="form-group">
      <label for="name">Nom du point *:</label>
      <input type="name" class="form-control" id="nom_point" placeholder="" name="nom_point" required>
    </div>
<div class="form-group">
      <label for="name">Adresse *:</label>
      <input type="name" class="form-control" id="Adresse" placeholder="" name="Adresse" required>
    </div>
<div class="form-group">
      <label for="name">Coordonées Longitude *:</label>
      <input type="float" class="form-control" id="Longitude" placeholder="" name="Longitude" required>
    </div>
<div class="form-group">
      <label for="name">Coordonées Latitude *:</label>
      <input type="float" class="form-control" id="Latitude" placeholder="" name="Latitude" required>
    </div>

<br>
<div class="form-group">
<button type="submit" class="btn btn-primary">Terminer</button>
</body>
</html>