<!DOCTYPE html>
<html>

<head>
	<?php 
		include('../../bootstrap.html');
		require_once "../request/Point.php"; 
	?>
	<script src="./popup.js"></script>
	<title>Modifier Point RDV</title>
</head>

<body>

	<div class="container p-3 my-3 border shadow rounded" align="center">

	<div class="container bg-success p-2 my-2 rounded" >
		<a href="/index.php">
		<button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
		</a>
		<h2 class="text-center" style="color: white;">Modifier Point RDV</h2>
	</div>

		<!-- TABLE -->
		<div class="container overflow-auto" style="font-size: 10px; height: 400px;">
		<table class="table">


			<!-- TABLE Header -->
			<thead align="center">
			<tr>
				<th>Nom</th>
				<th>Adresse</th>
				<th>Coordonnées</th>
				<th>Photo</th>
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
								<td>' . $value["Nom"] . '</td>

								<td>' . $value["Adresse"] . '<br/>' . $value["Ville"] . '</td>

								<td> <a href="https://www.google.com/maps/place/' . $value["Latitude"] . ',' . $value["Longitude"] . '" onclick="window.open(this.href); return false;"" style="font-weight: bold; color: green;">' . $value["Latitude"] . '<br/>' . $value["Longitude"] . '</td>

								<td> <a href="' . $value["Point_Image"] . '"onclick="window.open(this.href); return false;"> <img src="' . $value["Point_Image"] . '"class="img-fluid rounded" width="150"></img></a> </td>

								<td>' . '<button class="btn btn-success material-icons btn-sm" style="font-size: 150%" onclick="popupModifPoint(`' . $value["Nom"] . '`,`' . $value["Adresse"] . '`,`' . $value["Ville"] . '`,`' . $value["Latitude"] . '`,`' . $value["Longitude"] . '`,`' . $value["Point_Image"] . '`)" data-toggle="modal" data-target="#popupModif">&#xe3c9;</button>' . '</td>
							</tr>';
					}
				?>

			</tbody>
		</table>
		</div>



		<!-- POPUP -->
		<div class="modal fade" id="popupModif">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">


			<!-- POPUP Header -->
			<div class="modal-header">
				<h4 class="modal-title">Modification Point de RDV</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>


			<!-- POPUP body -->
			<div class="modal-body">

				<form class="modifPoint" method="post">

					<div class="container border rounded shadow">
						<div class="form-group" align="left">
							<label for="nomPoint" class="mr-sm-2">Nom : </label><br/>
							<input type="text" class="mb-2 mr-sm-2" id="nomPoint" name="nomPoint" value="" required>

						</div>

						<div class="form-group" align="left">
							<label for="adressePoint" class="mr-sm-2">Adresse : </label><br/>
							<input type="text" class="mb-2 mr-sm-2" placeholder="1 avenue de Charles Poncet" id="adressePoint" name="adressePoint" value="" required>

						</div>

						
						<div class="form-group" align="left">
							<label for="villePoint" class="mr-sm-2">Ville : </label><br/>
							<input type="text" class="mb-2 mr-sm-2" placeholder="74300 Cluses" id="villePoint" name="villePoint" value="" required>

						</div>

						<div class="form-group" align="left">
							<label for="latitudePoint" class="mr-sm-2">Latitude : </label><br/>
							<input type="text" class="mb-2 mr-sm-2" placeholder="46.0618" id="latitudePoint" name="latitudePoint" value="" required>

						</div>

						<div class="form-group" align="left">
							<label for="longitudePoint" class="mr-sm-2">Longitude : </label><br/>
							<input type="text" class="mb-2 mr-sm-2" placeholder="6.57994" id="longitudePoint" name="longitudePoint" value="" required>

						</div>

						<div class="form-group" align="left">
							<label for="imagePoint" class="mr-sm-2">Photo : </label><br/>
							<img src="" id="lienImage" class="img-fluid rounded" width="200"><br/>
							<input type="file" class="mb-2 mr-sm-2" placeholder="../images/" id="imagePoint" name="imagePoint" value="">

						</div>
					</div>

					<!-- POPUP footer -->
					<div class="modal-footer justify-content-center">
						<button type="submit" class="btn btn-success">Enregistrer</button>
					</div>

				</form>

			</div>
			</div>
		</div>
		</div>

	</div>
</body>

</html>