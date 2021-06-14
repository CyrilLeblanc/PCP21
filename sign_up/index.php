<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="index.css" />
	<script type="checkbox"></script>
	<title>Inscription - Covoiturage Participatif</title>
	<?php include('../bootstrap.php') ?>
  <?php include('../config.php') ?>
  <script>
    function show_pass(checkbox)
    {
      if (checkbox.checked)
      {
        document.getElementById('password1').setAttribute('type','text');
        document.getElementById('password2').setAttribute('type','text');
      } else {
        document.getElementById('password1').setAttribute('type','password');
        document.getElementById('password2').setAttribute('type','password');
      }
    }

    function confirm_pass()
    {
      let pass1 = document.getElementById('password1').value;
      let pass2 = document.getElementById('password2').value;
      
      if (pass1 != pass2)
      {
        document.getElementById('error').removeAttribute('hidden');
      }
      return (pass1 == pass2)
    }
  </script>
</head>
<body class="bg-success">
<div class="container rounded shadow border bg-white">
  <h1>Inscription</h1>
    <form method="post" action="./Ajout_Utilisateur/Form_Ajout_Utilisateur.php" class="form-group" onsubmit="return confirm_pass()">
    <div class="form-group">
      <label for="nom">Nom *:</label>
      <input type="text" class="form-control" id="nom" placeholder="" name="nom" required>
    </div>
    <div class="form-group">
      <label for="prenom">Prénom *:</label>
      <input type="text" class="form-control" id="prenom" placeholder="" name="prenom" required>
    </div>
    <div class="form-group">
      <label for="num_telephone">N° Téléphone *:</label>
      <input type="tel" class="form-control" id="num_telephone" placeholder="" name="num_telephone" required>
    </div>
    <div class="form-group">
      <label for="email">E-Mail *:</label>
      <input type="email" class="form-control" id="email" placeholder="" name="email" required>
    </div>
    <div class="form-group">
      <label for="password1">Mot de passe * <small>(8 caractères minimum)</small>:</label>
      <input type="password" class="form-control" id="password1" placeholder="" name="password" pattern=".{8,}" title="8 Caractères au minimum" required>
      <br>Utilisez au moins huit caractères avec des lettres et des chiffres
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" onclick="show_pass(this)"> Afficher le mot de passe
      </label>
    </div>
    <div class="form-group">
      <label for="password2">Confirmer le mot de passe *:</label>
      <input type="password" class="form-control" id="password2" placeholder="" name="password" required>
    </div>
      <p id='error' style="color: red; font-weight: bold;" hidden>Les deux mots de passe ne sont pas identique</p>
      <button type="submit" class="btn btn-primary">Suivant</button>
    </form>
  <br>
  Si vous posséder déjà un compte, alors <a href="../login"> connectez-vous !</a>
</div>
</body>
</html>