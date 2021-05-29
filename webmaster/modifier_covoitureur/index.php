<!DOCTYPE html>
<html>

<head>
	<?php 
		include('../../bootstrap.html');
		include('./popupModifCovoitureur.php');
		include('./popupModifVoiture.php');
		require_once "../request/Covoitureur.php"; 
	?>
	<script src="./popup.js"></script>
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

		<?php
			$Covoitureur = new Covoitureur();
			$table = $Covoitureur -> get_covoitureur(0);

			if(sizeof($table) == 0)
			{
				echo '</br></br><h4 align="center">Pas de nouvelle demande de compte.</h4>';
			}

			else
			{
				foreach($table as $value)
				{
					$voiture = $Covoitureur -> get_voiture($value["idCovoitureur"]);

					echo 
						'<!-- TABLE -->
							<div class="container overflow-auto" style="font-size: 12px; height: 400px;">
								<table class="table">
								
						<!-- TABLE Header -->
							<thead align="center">
								<tr>
									<th>Covoitureur</th>
									<th>Profil</th>
									<th>Voiture</th>
								</tr>
							</thead>

						<!-- TABLE Body -->
							<tbody align="center" style="height: 100px; overflow: auto;">
								<tr> 
									<td> <div style="padding-top: 1em; padding-bottom: 1em;">' . $value["Nom"] . '</br>' . $value["Prenom"] . ' </div></td>
				
									<td>
										<button class="btn material-icons container bg-success p-2 my-2 rounded" 
											onclick="popupModifCovoitureur(`' . $value["Nom"] . '`,`' . $value["Prenom"] . '`,`' . $value["Num_Telephone"] . '`,`' . $value["Email"] . '`,`' . $value["Utilisateur_Image"] . '`)"
											style="color: white; font-size: 200%;" data-toggle="modal" data-target="#popupModifCovoitureur">&#xe7ff;</button> 
									</td>
				
									<td>
										<button class="btn material-icons container bg-success p-2 my-2 rounded" 
											onclick="popupModifVoiture(`' . $voiture["Marque"] . '`,`' . $voiture["Modele"] . '`,`' . $voiture["Annee"] . '`,`' . $voiture["Couleur"] . '`,`' . $voiture["Nbr_Place"] . '`,`' . $voiture["Voiture_Image"] . '`)"
											style="color: white; font-size: 200%;" data-toggle="modal" data-target="#popupModifVoiture">&#xe531;</button>
									</td>
								</tr>	
							</tbody>
						</table>
					</div>';
				}
			}
		?>

	</div>
</body>

</html>
