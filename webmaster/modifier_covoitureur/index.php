<!DOCTYPE html>
<html>

<head>
	<?php 
		require_once '../../config.php'; 
		include $GLOBALS['racine'] . 'bootstrap.php';
		include $GLOBALS['racine'] . 'webmaster/modifier_covoitureur/popupModifCovoitureur.php'; 
		include $GLOBALS['racine'] . 'webmaster/modifier_covoitureur/popupModifVoiture.php'; 
		require_once $GLOBALS['racine'] . 'request/Covoitureur.php'; 
	?>
	<script src="./popup.js"></script>
	<title>Modifier Covoitureur</title>
</head>

<body>
	<div class="container p-3 my-3 border shadow rounded" align="center">

	<div class="container bg-success p-2 my-2 rounded" >
		<a href="../../accueil">
		<button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
		</a>
		<h2 class="text-center" style="color: white;">Modifier Covoitureur</h2>
	</div>

	<!-- TABLE -->
	<div class="container overflow-auto" style="font-size: 16px; height: 400px;">
		<table class="table">
		
			<!-- TABLE Header -->
			<thead align="center">
				<tr>
					<th>Covoitureur</th>
					<th>Profil</th>
					<th>Voiture</th>
				</tr>
			</thead>

		<?php
			$Covoitureur = new Covoitureur();
			$table = $Covoitureur -> get_covoitureur(1);

			foreach($table as $value)
			{
				$voiture = $Covoitureur -> get_voiture($value["idCovoitureur"]);

				echo 
					'<!-- TABLE Body -->
					<tbody align="center" style="height: 100px; overflow: auto;">
						<tr> 
							<td> <div style="padding-top: 0.5em; padding-bottom: 0.5em;">' . $value["Nom"] . '</br>' . $value["Prenom"] . ' </div></td>
		
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
					</tbody>';
			}
		?>
			</table>
		</div>
	</div>
</body>

</html>
