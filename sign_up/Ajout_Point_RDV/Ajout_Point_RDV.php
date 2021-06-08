<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="index.css" />
      <link rel="stylesheet" href="Modal.css" />
	<script type="checkbox"></script>
	<title>Inscription - Covoiturage Participatif</title>
	<?php include('../../bootstrap.php') ?>
      <?php include('../../config.php') ?>
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
<button id="myBtn">Terminer</button>
<div id="myModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Covoiturage Participatif Lycée Charles-Poncet</h2>
    </div>
    <div class="modal-body">
      <p>Votre demande d'inscription a bien été transmise.</p>
      <p>Veuillez patienter jusqu'à la prise en compte complète par le Webmaster pour vous connectez.</p>
    </div>
    <div class="modal-footer">
      <h3>Vous pouvez fermer cette page</h3>
    </div>
  </div>
</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>