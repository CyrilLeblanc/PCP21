<!DOCTYPE html>
<html>

<head>
	<?php 
		require_once '../../config.php'; 
		require_once $GLOBALS['racine'] . 'request/Covoitureur.php';
		include $GLOBALS['racine'] . 'bootstrap.php';
		include $GLOBALS['racine'] . 'webmaster/demandes_creation_compte/popupInfosCovoitureur.php';
		include $GLOBALS['racine'] . 'webmaster/demandes_creation_compte/popupInfosVoiture.php';
	?>
	<script src="./popup.js"></script>
	<title>Demandes Création Compte</title>
</head>

<body>
	<?php 
		if(isset($_POST['Refuser']))
		{
			$delCovoitureur = new Covoitureur();
			$delCovoitureur->del_Covoitureur($_POST['idCovoitureur']);
			echo (string)mail($_POST['mailRefuser'], "PCP21 - Compte Refusé" , "Votre demande de création de compte à été refusée par le Webmaster pour la raison suivant :\n" . $_POST['explication'] . "\n Cordialement.");
		}
		if(isset($_POST['Accepter']))
		{
			$addCovoitureur = new Covoitureur();
			$addCovoitureur->validate_Covoitureur($_POST['idCovoitureur']);
			mail($_POST['mailAccepter'], "PCP21 - Compte Accepté" , "Votre demande de création de compte à été accepté par le Webmaster.\nCordialement.");
		}
	?>
	<div class="container p-3 my-3 border shadow rounded" align="center">

	<div class="container bg-success p-2 my-2 rounded" >
		<a href="../../accueil">
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
					</thead>';

				foreach($table as $value)
				{
					$voiture = $Covoitureur -> get_voiture($value["idCovoitureur"]);

					echo 
						'<!-- TABLE Body -->
							<tbody align="center" style="height: 100px; overflow: auto;">
								<tr> 
									<td>
										<div style="padding-top: 1em; padding-bottom: 1em;">
											<button type="submit" class="btn material-icons p-0" style="color: red; font-size: 200%;"
											onclick="popupRefuser(`' . $value["idCovoitureur"] . '`,`' . $voiture["idVoiture"] . '`,`' . $value["Email"] . '`)" data-toggle="modal" data-target="#popupRefuser">&#xe888;</button>
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
										<div style="padding-top: 1em; padding-bottom: 1em;">
											<button type="submit" class="btn material-icons p-0" style="color: green; font-size: 200%;"
											onclick="popupAccepter(`' . $value["idCovoitureur"] . '`,`' . $value["Email"] . '`)" data-toggle="modal" data-target="#popupAccepter">&#xe92d;</button>
										</div>
									</td>
								</tr>	
							</tbody>';
				}
				echo 
					'	</table>
					</div>';
			
				include $GLOBALS['racine'] . 'webmaster/demandes_creation_compte/popupRefuser.php';
				include $GLOBALS['racine'] . 'webmaster/demandes_creation_compte/popupAccepter.php';

			}
		?>

	</div>
</body>

</html>
