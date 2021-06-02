<!DOCTYPE html>
<html>

<head>
	<?php 
		include '../bootstrap.html';
		require_once "../../request/Covoitureur.php"; 
	?>
	<title>Modifier Ligne</title>
</head>

<body>
	<div class="container p-3 my-3 border shadow rounded" align="center">


	<div class="container bg-success p-2 my-2 rounded" >
		<a href="../../accueil">
		<button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
		</a>
		<h2 class="text-center" style="color: white;">Modifier Ligne</h2>
	</div>

	<!-- TABLE -->
		<div class="container overflow-auto" style="font-size: 10px ;height: 400px; max-width: 2000px;">
		<table class="table">


			<!-- TABLE Header -->
			<thead align="center">
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>N° Téléphone</th>
				<th>E-mail</th>
				<th>Photo</th>
				<th>Marque</th>
				<th>Modèle</th>
				<th>Année</th>
				<th>Type</th>
				<th>Couleur</th>
				<th>Photo</th>
				<th>Modifier</th>
			</tr>
			</thead>


			<!-- TABLE Body -->
			<tbody align="center" style="height: 100px; overflow: auto;">
			

				<?php
					$Covoitureur = new Covoitureur();
					$table = $Covoitureur -> get_user(idCovoitureur);

					foreach($table as $value)
					{
						echo 
							'<tr> 
								<td>' . $value["Nom"] . '</td>

								<td>' . $value["Prenom"] . '</td>

								<td>' . $value["Num_Telephone"]. '</td>

								<td>' . $value["Email"] . '</td>

								<td>' . $value["Utilisateur_Image"]. '</td>

								<td>' . $value["Marque"] . '</td>

								<td>' . $value["Modèle"] . '</td>

								<td>' . $value["Annee"] . '</td>

								<td>' . $value["Type"] . '</td>

								<td>' . $value["Couleur"] . '</td>

								<td>' . $value["Voiture_Image"] . '</td>

								<td>' . '<button class="btn btn-success material-icons btn-sm" style="font-size: 150%" onclick="popupModifCovoit(`' . $value["Nom"] . '`,`...`,`' . $value["Latitude"] . ' ' . $value["Longitude"] . '`,`' . $value["Point_Image"] . '`)" data-toggle="modal" data-target="#popupModif">&#xe3c9;</button>' . '</td>
							</tr>';
					}
				?>

			<!--
			<tr>
				<td>VILLANOVA</td>
				<td>Quentin</td>
				<td>06.33.50.62.44</td>
				<td>
					<a href="mailto:?to=villanovaq@gmail.com" style="font-weight: bold; color: green;">villanovaq@gmail.com</a>
				</td>
				<td>
					<img src="./gestion_elements/images/temp.jpeg" class="img-fluid rounded" width="100"></a>
				</td>
				<td>Renault</td>
				<td>Twingo</td>
				<td>2012</td>
				<td>Voiture</td>
				<td>Cuivrée</td>
				<td>
					<img src="./gestion_elements/images/temp.jpeg" class="img-fluid rounded" width="100"></a>
				</td>
				<td>
					<a href="./gestion_elements/popups/valid_compte.php" data-toggle="modal" data-target="#validPopup">
						<button class="btn material-icons" style="color: green; font-size: 200%;">&#xe92d;</button>
					</a>
					<a href="./gestion_elements/popups/unvalid_compte.php" data-toggle="modal" data-target="#unvalidPopup">
						<button class="btn material-icons" style="color: red; font-size: 200%;">&#xe888;</button>
					</a>
				</td>
			</tr>

			<tr>
				<td>VILLANOVA</td>
				<td>Quentin</td>
				<td>06.33.50.62.44</td>
				<td>
					<a href="mailto:?to=villanovaq@gmail.com" style="font-weight: bold; color: green;">villanovaq@gmail.com</a>
				</td>
				<td>
					<img src="./gestion_elements/images/temp.jpeg" class="img-fluid rounded" width="100"></a>
				</td>
				<td>Renault</td>
				<td>Twingo</td>
				<td>2012</td>
				<td>Voiture</td>
				<td>Cuivrée</td>
				<td>
					<img src="./gestion_elements/images/temp.jpeg" class="img-fluid rounded" width="100"></a>
				</td>
				<td>
					<a href="./gestion_elements/popups/valid_compte.php" data-toggle="modal" data-target="#validPopup">
						<button class="btn material-icons" style="color: green; font-size: 200%;">&#xe92d;</button>
					</a>
					<a href="./gestion_elements/popups/unvalid_compte.php" data-toggle="modal" data-target="#unvalidPopup">
						<button class="btn material-icons" style="color: red; font-size: 200%;">&#xe888;</button>
					</a>
				</td>
			</tr>
		-->

			</tbody>

		</table>

		</div>
	</div>
</body>

</html>