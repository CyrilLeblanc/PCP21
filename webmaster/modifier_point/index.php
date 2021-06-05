<!DOCTYPE html>
<html>

<head>
	<?php 
		require_once '../../config.php'; 
		require_once $GLOBALS['racine'] . 'request/Point.php';
		include $GLOBALS['racine'] . 'bootstrap.php';
		include $GLOBALS['racine'] . 'webmaster/modifier_point/popupModifPoint.php'; 
		ini_set('display_errors', 1);   #DEBUG
		ini_set('display_startup_errors', 1);   #DEBUG
	?>
	<script src="./popup.js"></script>
	<title>Modifier Point RDV</title>
</head>

<body>
	<div class="container p-3 my-3 border shadow rounded" align="center">

		<div class="container bg-success p-2 my-2 roun#ded" >
			<a href="../../accueil">
			<button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
			</a>
			<h2 class="text-center" style="color: white;">Modifier Point RDV</h2>
		</div>

		<!-- TABLE -->
		<div class="container overflow-auto" style="font-size: 12px; height: 450px;">
		<table class="table">


			<!-- TABLE Header -->
			<thead align="center">
			<tr>
				<th>Nom</th>
				<th>Coordonnées</th>
				<th>Modifier</th>
			</tr>
			</thead>


			<!-- TABLE Body -->
			<tbody align="center" style="height: 100px; overflow: auto;">
			
				<?php
					$Point = new Point();
					$table = $Point -> get_Point(True);

					foreach($table as $value)
					{
						echo 
							'<tr> 
								<td>
									<div style="padding-top: 1em; padding-bottom: 1em;">
										' . $value["Nom"] . ' </div></td>

								<td>
									<div style="padding-top: 1em; padding-bottom: 1em;">
										<a href="https://www.google.com/maps/place/' . $value["Latitude"] . ',' . $value["Longitude"] . '" onclick="window.open(this.href); return false;"" 
											style="font-weight: bold; color: green;">' . $value["Latitude"] . '<br/>' . $value["Longitude"] . ' </a></div></td>

								<td> 
									<div style="padding-top: 0.5em; padding-bottom: 0.5em;">
										<button class="btn material-icons bg-success" style="color: white; font-size: 200%;"
										onclick="popupModifPoint(`' . $value["Nom"] . '`,`' . $value["Adresse"] . '`,`' . $value["Ville"] . '`,`' . $value["Latitude"] . '`,`' . $value["Longitude"] . '`,`' . $value["Point_Image"] . '`,`' . $value["idPoint_RDV"] . '`)" 
										data-toggle="modal" data-target="#popupModifPoint">&#xe3c9;</button></div></td>
									
									<input value="' . $value["idPoint_RDV"] . '" id="idPoint_RDV" hidden></input>
							</tr>';
					}
				?>

			</tbody>
		</table>
		</div>

		<?php  
			//Vérifie si le point a bien été modifié
			$Verif_Point = new Point();
			if(isset($_POST['nomPoint']) && isset($_POST['adressePoint']) && isset($_POST['villePoint']) && isset($_POST['latitudePoint']) && isset($_POST['longitudePoint']) && isset($_POST['idPoint']) )
			{
				if($Verif_Point->verif_Point($_POST['nomPoint'],$_POST['adressePoint'],$_POST['villePoint'],$_POST['latitudePoint'],$_POST['longitudePoint'],$_POST['idPoint']))
				{
				echo "</br></br>
					<div class='alert alert-success text-center'>
					<h5><strong>Le Point de RDV a bien été modifié.</strong></h5>
					</div>";
				}
				else
				{
				echo "</br></br>
					<div class='alert alert-danger text-center'>
					<h2><strong>Erreur de modification du Point de RDV.</strong></h2>
					</div>";
				}
			}
		?> 

	</div>
</body>

</html>
