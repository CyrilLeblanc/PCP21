<!DOCTYPE html>
<html>

<head>
	<?php 
		require_once '../../config.php'; 
		require_once $GLOBALS['racine'] . 'request/Point.php';
		include $GLOBALS['racine'] . 'bootstrap.php';
		include $GLOBALS['racine'] . 'webmaster/demandes_creation_point/popupInfosPoint.php';
		include $GLOBALS['racine'] . 'webmaster/demandes_creation_point/popupValidate.php';
		include $GLOBALS['racine'] . 'webmaster/demandes_creation_point/popupValide.php';
		include $GLOBALS['racine'] . 'webmaster/demandes_creation_point/popupRefuse.php';
		ini_set('display_errors', 1);   #DEBUG
		ini_set('display_startup_errors', 1);   #DEBUG
	?>
	<script src="./popup.js"></script>
	<title>Demandes Création Point RDV</title>
</head>

<body>
	<div class="container p-3 my-3 border shadow rounded" align="center">

	<div class="container bg-success p-2 my-2 rounded" >
		<a href="../../accueil">
		<button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
		</a>
		<h2 class="text-center" style="color: white;">Demandes Création Point RDV</h2>
	</div>

		<?php
			$Point = new Point();
			$table = $Point -> get_Point(0);

			if(sizeof($table) == 0)
			{
				echo '</br></br><h4 align="center">Pas de nouvelle demande de point de RDV.</h4>';
			}

			else
			{
				echo
					'<!-- TABLE -->
					<div class="container overflow-auto" style="font-size: 10px; height: 400px;">
					<table class="table">


					<!-- TABLE Header -->
					<thead align="center">
					<tr>
						<th>Nom</th>
						<th>Coordonnées</th>
						<th>Informations</th>
						<th>Validation</th>
					</tr>
					</thead>';

				foreach($table as $value)
				{
					echo 
					'<!-- TABLE Body -->
					<tbody align="center" style="height: 100px; overflow: auto;">
						<tr> 
							<td> 
								<div style="padding-top: 1em; padding-bottom: 1em;">' . $value["Nom"] . ' </div>
							</td>	
							
							<td>
								<div style="padding-top: 1em; padding-bottom: 1em;">
									<a href="https://www.google.com/maps/place/' . $value["Latitude"] . ',' . $value["Longitude"] . '" onclick="window.open(this.href); return false;"" 
									style="font-weight: bold; color: green;">' . $value["Latitude"] . '<br/>' . $value["Longitude"] . ' </a></div></td>	

							<td> 
								<button class="btn material-icons container bg-success p-2 my-2 rounded" 
								onclick="popupInfosPoint(`' . $value["Nom"] . '`,`' . $value["Adresse"] . '`,`' . $value["Ville"] . '`,`' . $value["Latitude"] . '`,`' . $value["Longitude"] . '`,`' . $value["Point_Image"] . '`)"
								style="color: white; font-size: 200%;" data-toggle="modal" data-target="#popupInfosPoint">&#xe7ff;</button> 
							</td>

							<td>
								<div style="padding-top: 1em; padding-bottom: 1em;">
									<button class="btn material-icons" style="color: green; font-size: 200%;" data-toggle="modal" data-target="#popupValidate">&#xf1c2;</button>
								</div>
							</td>
							<input value="' . $value["idPoint_RDV"] . '" id="idPoint_RDV" hidden></input>
						</tr>
					</tbody>';
				}
				echo '</table>';
			}
			
		?>

	</div>
</body>

</html>
