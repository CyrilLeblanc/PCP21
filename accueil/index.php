<?php
session_start();
require_once '../verif_session.php';
ini_set('display_errors', 1);   #DEBUG
ini_set('display_startup_errors', 1);   #DEBUG
require_once '../config.php';
?>


<!DOCTYPE html>
<html>

<head>
	<?php
	include $GLOBALS['racine'] . 'bootstrap.php';
	?>
	<title>Accueil - PCP21</title>
</head>

<body>
	<div class="container-fluid">
		<?php
		include $GLOBALS['racine'] . 'header.php';
		include 'DemandeCovoiturage/index.php';
		include 'Classement/Classement.php';
		include 'Historique/Historique.php';
		?>

		<div class="container-fluid p-3 my-3 border shadow rounded">
			<!-- CONTAINER PRINCIPAL -->

			<div align="center">
				<button type="button" class="btn btn-success p-3 w-100" data-toggle="modal" data-target="#DemandeCovoiturage">
					Demande de Covoiturages
				</button>
			</div>

			<div class="row">

				<div class="col-6" align="center">
					<button type="button" class="btn btn-success p-2 my-1 w-100" data-toggle="modal" data-target="#historique">
						Historique</button>
				</div>

				<div class="col-6" align="center">
					<button type="button" class="btn btn-success p-2 my-1 w-100" data-toggle="modal" data-target="#Classement">
						Classement
					</button>
				</div>

			</div>

			<hr>

			<?php include 'tab_prochain_covoit.php'; ?>
			<!-- TABLEAU DE PROCHAINS COVOITURAGE AFFICHER -->

		</div>
	</div>

	<?php include $GLOBALS['racine'] . 'footer.html'; ?>

</body>

</html>