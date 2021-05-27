<?php
session_start();
require_once "./connect.php";
?>


<doctype HTML>
<html>
<head>
<!--
# Codée par : Cyril LEBLANC
# Date : 26/03/2021
# Description : Page de connexion à la plateforme de covoiturage participatif
# Modification : NONE
#
-->
	<?php include_once '../bootstrap.html'; ?>
	<style>
	.center{
		padding: auto;
		margin-top: 0%;
	}

	a
	{
		font-weight: bold;
	}

	.form-control
	{
		max-width:75%;
	}

	</style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-success justify-content-center text-white">
<ul class="navbar-nav">
	<li class="nav-item">
	  <h1>Covoiturage Participatif Charles Poncet</h1>
	</li>
</ul>
</nav>
<?php 
	// affichage des erreurs de connection
	if ($_GET['error'] == 'login')
	{
		echo "<BR/>
		<div class='alert alert-danger text-center'>
		<strong>Erreur :</strong> Mauvais mot de passe ou mauvaise adresse e-mail.
	  	</div>";
	} elseif($_GET['error'] == 'confirme')
	{
		echo "<BR/>
		<div class='alert alert-danger text-center'>
		<strong>Erreur :</strong> Compte non confirmé merci de contacté le webmaster en cas de problème.
	  	</div>";
	}

?>

<br/>
<div class="container border shadow rounded center bg-success" style="max-width: 40em;">
<br/>
	<div class="container border shadow rounded text-center bg-white">

	<form method="POST" action="./connect.php">
		<div class="d-flex flex-wrap">
			<div class="form-group p-2 flex-fill">
			<label for="email">Adresse e-mail</label></br>
			<input name="email" type="email" required id="email" class="form-control mx-auto"></input></br>
			</div>

			<div class="form-group p-2 flex-fill">
			<label for="password">Mot de passe</label></br>
			<input name="password" type="password" required id="password" class="form-control mx-auto"></input></br>
			</div></br>
		</div>

		<div class="custom-control custom-checkbox">
		<input type="checkbox" id="remember" name="remember" value="True" class="custom-control-input"></input>
		<label for="remember" class="custom-control-label"> Se souvenir de moi.</label><br/><br/>
		</div>

		<button class="btn btn-success" type="submit">Se connecter</button>
		
	</form>
	<p><a href='#TODO'><p>J'ai oublié mon mot de passe.</a></br>
	Si vous n'avez pas de compte vous pouvez <a href="TODO">vous inscrire</a>.</p>

	</div>
<br/>
</div>
<br/><br/>
<?php include_once '../footer.html'; ?>
</body>
</html>