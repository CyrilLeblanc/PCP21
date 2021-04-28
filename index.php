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
  <h1>Inscription</h1>
  <form action="/action_page.php">
    <div class="form-group">
      <label for="name">Nom *:</label>
      <input type="name" class="form-control" id="nom" placeholder="" name="name" required>
    </div>
    <div class="form-group">
      <label for="lastname">Prénom *:</label>
      <input type="name" class="form-control" id="name" placeholder="" name="name" required>
    </div>
    <div class="form-group">
      <label for="tel">N° Téléphone *:</label>
      <input type="Varchar" class="form-control" id="name" placeholder="" name="name" required>
    </div>
    <div class="form-group">
      <label for="email">E-Mail *:</label>
      <input type="email" class="form-control" id="name" placeholder="" name="name" required>
    </div>
    <div class="form-group">
      <label for="pwd">Mot de passe *:</label>
      <input type="password" class="form-control" id="password" placeholder="" name="password" required>
      <br>Utilisez au moins huit caractères avec des lettres et des chiffres
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Afficher le mot de passe
      </label>
    </div>
    <div class="form-group">
      <label for="pwd">Confirmer le mot de passe *:</label>
      <input type="password" class="form-control" id="password" placeholder="" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Suivant</button>
  </form>
  <br>
  Si vous posséder déjà un compte, alors <a href="Connexion.php"> connectez-vous !</a>
</div>
</body>
</html>