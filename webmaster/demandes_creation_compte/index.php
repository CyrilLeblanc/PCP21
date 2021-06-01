<!DOCTYPE html>
<html>

<head>
	<?php 
	var_dump($_GET);
		include('../../bootstrap.html');
		include('./popupInfosCovoitureur.php');
		include('./popupInfosVoiture.php');
		include('./popupAccepter.php');
		include('./popupRefuser.php');
		require_once "../request/Covoitureur.php"; 
	?>
	<script src="./popup.js"></script>
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
					<div class="container overflow-auto" style="font-size: 12px; height: 400px;">
						<table class="table">
						
					<!-- TABLE Header -->
						<thead align="center">
							<tr>
								<th>Non</th>	
								<th>Covoitureur</th>
								<th>Profil</th>
								<th>Voiture</th>
								<th>Oui</th>
							</tr>
						</thead>

					<!-- TABLE Body -->
						<tbody align="center" style="height: 100px; overflow: auto;">';

				foreach($table as $value)
				{
					$voiture = $Covoitureur -> get_voiture($value["idCovoitureur"]);

					echo 
						'		<tr> 
									<td>
										<div style="padding-top: 1em; padding-bottom: 1em;">
											<button class="btn material-icons p-0" style="color: red; font-size: 200%;" data-toggle="modal" data-target="#popupRefuser">&#xe888;</button>
										</div>

									<td> 
										<div style="padding-top: 1em; padding-bottom: 1em;">' . $value["Nom"] . '</br>' . $value["Prenom"] . ' </div>
									</td>
				
									<td>
										<button class="btn material-icons container bg-success p-2 my-2 rounded" 
											onclick="popupInfosCovoitureur(`' . $value["Nom"] . '`,`' . $value["Prenom"] . '`,`' . $value["Num_Telephone"] . '`,`' . $value["Email"] . '`,`' . $value["Utilisateur_Image"] . '`)"
											style="color: white; font-size: 200%;" data-toggle="modal" data-target="#popupInfosCovoitureur">&#xe7ff;</button> 
									</td>
				
									<td>
										<button class="btn material-icons container bg-success p-2 my-2 rounded" 
											onclick="popupInfosVoiture(`' . $voiture["Marque"] . '`,`' . $voiture["Modele"] . '`,`' . $voiture["Annee"] . '`,`' . $voiture["Couleur"] . '`,`' . $voiture["Nbr_Place"] . '`,`' . $voiture["Voiture_Image"] . '`)"
											style="color: white; font-size: 200%;" data-toggle="modal" data-target="#popupInfosVoiture">&#xe531;</button>
									</td>
				
									<td>
										<form method="post" action="">
											<div style="padding-top: 1em; padding-bottom: 1em;">
												<button class="btn material-icons p-0" style="color: green; font-size: 200%;" type="submit" name="Accepter" value="'. $value["idCovoitureur"] . '" data-toggle="modal" data-target="#popupAccepter" onclick="document.location.reload()" >&#xe92d;</button>
											</div>
										</form>
									</td>
								</tr>';		
				}
					echo 
						'</tbody>
					</table>
				</div>';
				if(isset($_POST["Accepter"]))
				{
					$Covoitureur->validate_Covoitureur($_POST["Accepter"]);
					//echo '<meta http-equiv="refresh" content="2">';

				}
			}
		?>

	</div>
</body>

</html>
