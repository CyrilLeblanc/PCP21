<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="index.css" />
	<script type="checkbox"></script>
	<title>Inscription - Covoiturage Participatif</title>
	<?php include('./Config/bootstrap.html') ?>
  <?php include('./Config/config.php') ?>
</head>
<body class="bg-success">
<div class="container rounded shadow border bg-white">
  <h1>Inscription</h1>
    <form method="post" action="./Sign_Up/Ajout_Utilisateur/Form_Ajout_Utilisateur_BDD_4.php" class="form-group">
    <div class="form-group">
      <label for="name">Nom *:</label>
      <input type="name" class="form-control" id="nom" placeholder="" name="nom" required>
    </div>
    <div class="form-group">
      <label for="lastname">Prénom *:</label>
      <input type="name" class="form-control" id="prenom" placeholder="" name="prenom" required>
    </div>
    <div class="form-group">
      <label for="tel">N° Téléphone *:</label>
      <input type="Varchar" class="form-control" id="num_telephone" placeholder="" name="num_telephone" required>
    </div>
    <div class="form-group">
      <label for="email">E-Mail *:</label>
      <input type="email" class="form-control" id="email" placeholder="" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Mot de passe *:</label>
      <input type="password" class="form-control" id="password" placeholder="" name="password" required>
      <br>Utilisez au moins huit caractères avec des lettres et des chiffres
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" onclick="Afficher()" name="affiche"> Afficher le mot de passe
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