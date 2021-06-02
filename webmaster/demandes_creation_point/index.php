<!DOCTYPE html>
<html>

<head>
	<?php 
		include '../../bootstrap.html';
		include './popupInfosPoint.php';
		include './popupAccepter.php';
		include './popupRefuser.php';
		require_once "../../request/Point.php";
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
						<th>Non</th>
						<th>Nom</th>
						<th>Informations</th>
						<th>Oui</th>
					</tr>
					</thead>';

				foreach($table as $value)
				{
					echo 
					'<!-- TABLE Body -->
					<tbody align="center" style="height: 100px; overflow: auto;">
						<tr> 
						<td>
							<div style="padding-top: 1em; padding-bottom: 1em;">
								<button class="btn material-icons" style="color: red; font-size: 200%;" data-toggle="modal" data-target="#popupRefuser">&#xe888;</button>
							</div>

							<td> 
								<div style="padding-top: 1em; padding-bottom: 1em;">' . $value["Nom"] . ' </div>
							</td>							

							<td> 
								<button class="btn material-icons container bg-success p-2 my-2 rounded" 
								onclick="popupInfosPoint(`' . $value["Nom"] . '`,`' . $value["Adresse"] . '`,`' . $value["Ville"] . '`,`' . $value["Latitude"] . '`,`' . $value["Longitude"] . '`,`' . $value["Point_Image"] . '`)"
								style="color: white; font-size: 200%;" data-toggle="modal" data-target="#popupInfosPoint">&#xe7ff;</button> 
							</td>

							<td>
								<div style="padding-top: 1em; padding-bottom: 1em;">
									<button class="btn material-icons" style="color: green; font-size: 200%;" data-toggle="modal" data-target="#popupAccepter">&#xe92d;</button>
								</div>
							</td>
						</tr>
					</tbody>
					</table>';
				}
			}
		?>

	</div>
</body>

</html>

<!--<td> 
		<a href="https://www.google.com/maps/place/' . $value["Latitude"] . ',' . $value["Longitude"] . '" onclick="window.open(this.href); return false;"" style="font-weight: bold; color: green;">' . $value["Latitude"] . '<br/>' . $value["Longitude"] . '
		<a href="' . $value["Point_Image"] . '"onclick="window.open(this.href); return false;"> <img src="' . $value["Point_Image"] . '"class="img-fluid rounded" width="100"></img></a> 
	</td>