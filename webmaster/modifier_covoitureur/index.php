<!DOCTYPE html>
<html>

<head>
	<?php 
		require_once '../../config.php'; 
		require_once $GLOBALS['racine'] . 'webmaster/verif_session_WB.php';
		include $GLOBALS['racine'] . 'bootstrap.php';
		require_once $GLOBALS['racine'] . 'request/Covoitureur.php'; 
	?>
	<script src="./popup.js"></script>
	<title>Modifier Covoitureur</title>
</head>

<body>
	<?php 
		if(isset($_POST['modifCovoitureur']))
		{
			$modif_Covoitureur = new Covoitureur();

			$temp = "'".$_POST['nomCovoitureur'] . "'";
			$modif_Covoitureur->set_user("Nom",$temp,$_POST['idCovoitureur']);

			$temp = "'".$_POST['prenomCovoitureur'] . "'";
			$modif_Covoitureur->set_user("Prenom",$temp,$_POST['idCovoitureur']);

			$temp = "'".$_POST['numCovoitureur'] . "'";
			$modif_Covoitureur->set_user("Num_Telephone",$temp,$_POST['idCovoitureur']);

			$temp = "'".$_POST['mailCovoitureur'] . "'";
			$modif_Covoitureur->set_user("Email",$temp,$_POST['idCovoitureur']);

		}
		if(isset($_POST['modifVoiture']))
		{
			$modif_Voiture = new Covoitureur();

			$temp = "'".$_POST['marqueVoiture'] . "'";
			$modif_Voiture->set_voiture("Marque",$temp,$_POST['idVoiture']);

			$temp = "'".$_POST['modeleVoiture'] . "'";
			$modif_Voiture->set_voiture("Modele",$temp,$_POST['idVoiture']);

			$temp = "'".$_POST['anneeVoiture'] . "'";
			$modif_Voiture->set_voiture("Annee",$temp,$_POST['idVoiture']);

			$temp = "'".$_POST['couleurVoiture'] . "'";
			$modif_Voiture->set_voiture("Couleur",$temp,$_POST['idVoiture']);

			$temp = "'".$_POST['placesVoiture'] . "'";
			$modif_Voiture->set_voiture("Nbr_Place",$temp,$_POST['idVoiture']);
		}
	?>
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
									onclick="popupModifCovoitureur(`' . $value["Nom"] . '`,`' . $value["Prenom"] . '`,`' . $value["Num_Telephone"] . '`,`' . $value["Email"] . '`,`' . $value["Utilisateur_Image"] . '`,`' . $value["idCovoitureur"] . '`)"
									style="color: white; font-size: 200%;" data-toggle="modal" data-target="#popupModifCovoitureur">&#xe7ff;</button> 
							</td>
		
							<td>
								<button class="btn material-icons container bg-success p-2 my-2 rounded" 
									onclick="popupModifVoiture(`' . $voiture["Marque"] . '`,`' . $voiture["Modele"] . '`,`' . $voiture["Annee"] . '`,`' . $voiture["Couleur"] . '`,`' . $voiture["Nbr_Place"] . '`,`' . $voiture["Voiture_Image"] . '`,`' . $voiture["idVoiture"] . '`)"
									style="color: white; font-size: 200%;" data-toggle="modal" data-target="#popupModifVoiture">&#xe531;</button>
							</td>
						</tr>	
					</tbody>';
			}

			include $GLOBALS['racine'] . 'webmaster/modifier_covoitureur/popupModifCovoitureur.php'; 
			include $GLOBALS['racine'] . 'webmaster/modifier_covoitureur/popupModifVoiture.php'; 
		?>
			</table>
		</div>
	</div>
</body>

</html>
