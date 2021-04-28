<!DOCTYPE html>
<html>

<head>
	<?php 
		include('../bootstrap.html');
		require_once "../request/Covoitureur.php";
	?>
	<title>Modifier Covoitureur</title>
</head>

<body>
	<div class="container p-3 my-3 border shadow rounded" align="center">


	<div class="container bg-success p-2 my-2 rounded" >
		<a href="/index.php">
		<button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
		</a>
		<h2 class="text-center" style="color: white;">Modifier Covoitureur</h2>
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
				<th>Couleur</th>
				<th>Photo</th>
				<th>Modifier</th>
			</tr>
			</thead>


			<!-- TABLE Body -->
			<tbody align="center" style="height: 100px; overflow: auto;">
			

				<?php
					$Covoitureur = new Covoitureur();
					$table = $Covoitureur -> get_covoitureur(True);

					foreach($table as $value)
					{
						$voiture = $Covoitureur -> get_voiture($value["idCovoitureur"]);

						echo 
							'<tr> 
								<td>' . $value["Nom"] . '</td>

								<td>' . $value["Prenom"] . '</td>

								<td>' . $value["Num_Telephone"] . '</td>

								<td>' . $value["Email"] . '</td>

								<td> <a href="' . $value["Utilisateur_Image"] . '"onclick="window.open(this.href); return false;"> <img src="' . $value["Utilisateur_Image"] . '"class="img-fluid rounded" width="150"></img></a> </td>

								<td>' . $voiture["Marque"] . '</td>

								<td>' . $voiture["Modele"] . '</td>

								<td>' . $voiture["Annee"] . '</td>

								<td>' . $voiture["Couleur"] . '</td>

								<td> <a href="' . $voiture["Voiture_Image"] . '"onclick="window.open(this.href); return false;"> <img src="' . $voiture["Voiture_Image"] . '"class="img-fluid rounded" width="150"></img></a> </td>

								<td>' . '<button class="btn btn-success material-icons btn-sm" style="font-size: 150%" onclick="popupIndisp(`' . $value["Nom"] . $value["Prenom"] . $value["Num_Telephone"] . $value["Email"] . $value["Utilisateur_Image"] . $voiture["Marque"] . $voiture["Modele"] . $voiture["Annee"] . $voiture["Couleur"] . $voiture["Voiture_Image"] .'`)" data-toggle="modal" data-target="#popupModif">&#xe3c9;</button>' . '</td>
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
				<h4 class="modal-title">Modification Covoitureur - Work In Progress ...</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>


			<!-- POPUP body -->
			<div class="modal-body">

				<form class="modifCovoitureur" method="post">

					<div class="container border shadow rounded">
						<!-- Partie Covoitureur -->
						<div class="form-group" align="left">
							<label for="nomCovoitureur" class="mr-sm-2">Nom : </label><br/>
							<input type="text" class="mb-2 mr-sm-2" id="nomCovoitureur" name="nomCovoitureur" value="" required>
						</div>

						<div class="form-group" align="left">
							<label for="prenomCovoitureur" class="mr-sm-2">Prénom : </label><br/>
							<input type="text" class="mb-2 mr-sm-2" id="prenomCovoitureur" name="prenomCovoitureur" value="" required>
						</div>

						<div class="form-group" align="left">
							<label for="numCovoitureur" class="mr-sm-2">N° Téléphone : </label><br/>
							<input type="text" class="mb-2 mr-sm-2" id="numCovoitureur" name="numCovoitureur" value="" required>
						</div>

						<div class="form-group" align="left">
							<label for="mailCovoitureur" class="mr-sm-2">E-mail : </label><br/>
							<input type="text" class="mb-2 mr-sm-2" id="mailCovoitureur" name="mailCovoitureur" value="" required>
						</div>

						<div class="form-group" align="left">
							<label for="photoCovoitueur" class="mr-sm-2">Photo : </label><br/>
							<img src="" id="lienImage" class="img-fluid rounded" width="200"><br/>
							<input type="file" class="mb-2 mr-sm-2" id="photoCovoitueur" name="photoCovoitueur" value="" required>
						</div>
					</div>

					<div class="container border shadow rounded">
						<!-- Partie Voiture -->
						<div class="form-group" align="left">
							<label for="marqueVoiture" class="mr-sm-2">Marque : </label><br/>
							<input type="text" class="mb-2 mr-sm-2" id="marqueVoiture" name="marqueVoiture" value="" required>
						</div>

						<div class="form-group" align="left">
							<label for="modeleVoiture" class="mr-sm-2">Modèle : </label><br/>
							<input type="text" class="mb-2 mr-sm-2" id="modeleVoiture" name="modeleVoiture" value="" required>
						</div>

						<div class="form-group" align="left">
							<label for="anneeVoiture" class="mr-sm-2">Année : </label><br/>
							<input type="text" class="mb-2 mr-sm-2" id="anneeVoiture" name="anneeVoiture" value="" required>
						</div>

						<div class="form-group" align="left">
							<label for="couleurVoiture" class="mr-sm-2">Couleur : </label><br/>
							<input type="text" class="mb-2 mr-sm-2" id="couleurVoiture" name="couleurVoiture" value="" required>
						</div>

						<div class="form-group" align="left">
							<label for="photoVoiture" class="mr-sm-2">Photo : </label><br/>
							<img src="" id="lienImage" class="img-fluid rounded" width="200"><br/>
							<input type="file" class="mb-2 mr-sm-2" id="photoVoiture" name="photoVoiture" value="" required>
						</div>
					</div>

					<!-- POPUP footer -->
					<div class="modal-footer">
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