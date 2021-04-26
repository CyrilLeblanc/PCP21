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
	require_once '../config.php';

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



<!--
#
# Codée par : Cyril LEBLANC
# Date : 
# Description : Page de connexion à la plateforme de covoiturage participatif
# Note : Pas d'utilisation de Bootstrap
# Modification : NONE
#
-->
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Se connecter - PCP21</title>
	</head>
	<body>
		<header>
			<h1>Covoiturage Participatif Charles Poncet</h1>
		</header>
		<main>
			<div class="container">
				<form method="post" action="">
					<div class="element">
						<label for="email">E-mail :</label><br/>
						<input type="email" name="email" id="email" required></input>
					</div>
					<div class="element">
						<label for="password">Mot de passe :</label><br/>
						<input type="password" name="password" id="password" required></input>
					</div>
				
					<div class="element">
						<input type="checkbox" name="remember" id="remember">
						<label for="remember">Se souvenir de moi</label>
					</div>
					<div class="element">
						<button type="submit">Se connecter</button>
					</div>
				</form>
				Si vous n'avez pas de compte vous pouvez <a href="#">vous inscrire</a>.
			</div>


			
		</main>
		<?php include_once '../footer.html'; ?>
	</body>
</html>