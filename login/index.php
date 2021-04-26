<?php 

session_start();

// si l'utilisateur est déjà connecté on le renvoi sur la page d'accueil
if ($_SESSION['idCovoitureur'] != 0 && $_SESSION['is_Confirme'] == 1)
{
	header('Location: ./accueil.php');
	exit;
} elseif(isset($_COOKIE['email']) && isset($_COOKIE['password']))
// on regarde si il a un cookie avec ces infos de login
{
	$_POST['email'] = $_COOKIE['email'];
	$_POST['password'] = $_COOKIE['password'];
}


// on vérifie les informations de connection du formulaire
if (isset($_POST['email']) && isset($_POST['password']))
{
	require_once './config.php';

	// on récupère les infos de compte à partir du mail
	$email = $_POST['email'];
	$sql = "SELECT idCovoitureur, Mot_De_Passe, is_Confirme FROM Covoitureur WHERE email = '$email'";
	$res = $GLOBALS['mysqli']->query($sql)->fetch_assoc();

	if (password_verify($_POST['password'],$res['Mot_De_Passe']))
	// on vérifie si le mot de passe est bon
	{
		if ($res['is_Confirme'] == 0)
		// si le compte n'est pas vérifié on renvoi sur l'erreur de confirmation de compte
		{
			header('Location: ?error=confirme');
			exit;
		} else {
			$_SESSION['is_Confirme'] = $res['is_Confirme'];
			$_SESSION['idCovoitureur'] = $res['idCovoitureur'];

			// on prend en compte la checkbox "se souvenir de moi"
			if (!empty($_POST['remember']))
			{
				setcookie('email', $_POST['email'],time()+3600*24*10,NULL,'localhost');                     #TODO 'localhost'
				setcookie('password', $_POST['password'],time()+3600*24*10,NULL,'localhost');               #TODO 'localhost'
			}
			header('Location: ./acceuil.php');  #TODO
			exit;
		}
		
	} else {
		header('Location: ?error=login');
		exit;
	}
}


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

	<form method="POST">
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
		<input type="checkbox" id="remember" name="remember" value="1" class="custom-control-input"></input>
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