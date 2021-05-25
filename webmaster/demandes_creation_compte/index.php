<!DOCTYPE html>
<html>

<head>
	<?php 
		include('../../bootstrap.html');
		require_once "../request/Covoitureur.php"; 
	?>
	<title>Demandes Création Compte</title>
</head>

<body>
	<div class="container p-3 my-3 border shadow rounded" align="center">


	<div class="container bg-success p-2 my-2 rounded" >
		<a href="/index.php">
		<button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
		</a>
		<h2 class="text-center" style="color: white;">Demandes Création Compte</h2>
	</div>

		<?php
			$Covoitureur = new Covoitureur();
			$table = $Covoitureur -> get_covoitureur(0);

			if(sizeof($table) == 0)
			{
				echo '</br></br><h4 align="center">Pas de nouvelle demande de compte.</h4>';
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
				</thead>';
				
				foreach($table as $value)
				{
					$voiture = $Covoitureur -> get_voiture($value["idCovoitureur"]);

					echo 
					'<!-- TABLE Body -->
					<tbody align="center" style="height: 100px; overflow: auto;">
						<tr> 
							<td>' . $value["Nom"] . '</td>

							<td>' . $value["Prenom"] . '</td>

							<td>' . $value["Num_Telephone"] . '</td>

							<td>' . $value["Email"] . '</td>

							<td> <img src="' . $value["Utilisateur_Image"] . '"class="img-fluid rounded" width="50"></img></td>

							<td>' . $voiture["Marque"] . '</td>

							<td>' . $voiture["Modele"] . '</td>

							<td>' . $voiture["Annee"] . '</td>

							<td>' . $voiture["Couleur"] . '</td>

							<td> <img src="' . $voiture["Voiture_Image"] . '"class="img-fluid rounded" width="50"></img></td>

							<td>
								<button class="btn material-icons" style="color: green; font-size: 200%;" data-toggle="modal" data-target="#popup">&#xe92d;</button>
								<button class="btn material-icons" style="color: red; font-size: 200%;" data-toggle="modal" data-target="#popup">&#xe888;</button>
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