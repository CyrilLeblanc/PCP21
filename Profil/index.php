<!DOCTYPE html>
<html>

<?php
  session_start();
  require_once '../verif_session.php';
  ini_set('display_errors', 1);   #DEBUG
ini_set('display_startup_errors', 1);   #DEBUG
?>

<head>

	<?php
	include '../bootstrap.php';
	require_once '../config.php';
	require_once $GLOBALS['racine']."request/Point.php";
	require_once $GLOBALS['racine']."request/Covoitureur.php";

	$idCovoitureur = $_SESSION['idCovoitureur'];

	?>

	<title></title>
</head>

<body>

	<div class="row p-4 bg-success" style="font-weight: bold; color: white;">

		<div class="col-sm-4">


			<button class="btn material-icons float-left" onclick="window.location.href = '../accueil/index.php';" style="color: white; font-size: 200%;">&#xe5c4;</button>


		</div>

		<div class="col-sm-4 text-center">
			<h1>Profil</h1>
		</div>

		<div class="col-sm-4 text-right">
			69
			<img src="../image/honey.png" width="60">
		</div>
	</div>



	</div>


	<div class="container-fluid p-3 my-3 border shadow rounded">

		<div class="container bordered">

			<div class="row">

				<div class="container col-sm-6 border ">

					<p class="text-center font-weight-bold">Identité</p>
					<img src="../image/Photo.png" style="width:100px;" class="rounded float-left">

					<div class="row">
						
						<form action="./Modif_Profil.php" id="ModifProfil" method="post"> <!-- Formulaire identité -->

							<div class="form-group p-3 m-2">
								<label for="Prenom">Prénom</label>
								<input type="text" class="form-control" name="Prenom" placeholder="Nouveau Prénom">
							</div>

							<div class="form-group p-3 m-2">
								<label for="Nom">Nom</label>
								<input type="text" class="form-control" name="Nom" placeholder="Nouveau Nom">
							</div>

							<div class="form-group p-3 m-2">
								<label for="adresse_email">Adresse Email</label>
								<input type="email" class="form-control" name="Email" placeholder="Nouvelle Adresse Email">
							</div>

							<div class="form-group p-3 m-2">
								<label for="telephone">telephone</label>
								<input type="tel" name="Telephone" class="form-control" placeholder="Nouveau n° de téléphone"
								pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}">
							</div>

							<div class="form-group p-3 m-2">
								<button type="submit" class="btn btn-success p-3 center-block" data-toggle="modal">
								Enregistrer les modifications
								</button>
							</div>				
					</div>

					

						</form>
				</div>

				<div class="container col-sm-6 border">

				<form action="./Modif_Profil.php" id="ModifProfil" method="post"> <!-- Formulaire de(s) voiture(s) -->

					<p class="text-center font-weight-bold">Voiture</p>

					<div class="row">

					<div class="col-sm-10"></div>
					
					<button class="btn material-icons col-sm-2 float-right" data-toggle="modal" data-target="" style="color: green; font-size: 250%;">&#xe148</button>
					
					</div>

					<div class="row"> <!-- php affichage info voiture + bouton annuler -->

						<img src="../image/voiture.jpg" style="width:100px;" class="rounded col-sm-2"> 

						<div class="col-sm-8"><p>test</p><p>test</p></div>

						<button class="btn material-icons col-sm-2 float-right" data-toggle="modal" data-target="#Popup_Annuler_Voiture" style="color: green; font-size: 250%;">&#xe15d</button>

					</div>
					

					<div class="row">

						<div class="form-group p-3 m-2">
							<label for="usr">Marque</label>
							<input type="text" class="form-control" name="Marque" placeholder="Peugeot, Citroen ...">
						</div>

						<div class="form-group p-3 m-2">
							<label for="usr">Modèle</label>
							<input type="text" class="form-control" name="Modele" placeholder="">
						</div>

						<div class="form-group p-3 m-2">
							<label for="usr">Année</label>
							<input type="text" class="form-control" name="Annee" placeholder="">
						</div>

						<div class="form-group p-3 m-2">
							<label for="usr">Type</label>
							<input type="text" class="form-control" name="Type" placeholder="">
						</div>

						<div class="form-group p-3 m-2">
							<label for="usr">Couleur</label>
							<input type="text" class="form-control" name="Couleur" placeholder="">
						</div>

						<div class="form-group p-3 m-2">
							<label for="usr">Places</label>
							<input type="text" class="form-control" name="Places" placeholder="Nombres de Places">
						</div>

					</div>

				</form>

				</div>

			</div>

			<div class="row">
				
				<div class="container col-sm-6 border">

				<form action="./Modif_MDP.php" id="ModifMDP" method="post"> <!-- Formulaire Modif MDP -->	
					
					<p class="text-center font-weight-bold">Mot de Passe</p>

					<div class="form-group p-3 m-2">
					<label for="exampleInputPassword1">Mot de Passe Actuel</label>
						<input type="password" class="form-control" name="MotDePasseActuelle">
					</div>

					<div class="form-group p-3 m-2">
						<label for="Pwd">Nouveau Mot de Passe</label>
						<input type="password" class="form-control" name="NouvMotDePasse">

						<small id="PwdHelp" class="text-muted">
							Veuillez entrez au minimum 8 caractères
						</small>
					</div>

					<div class="form-group p-3 m-2">
						<label for="PwdConfirm">Confirmer Nouveau Mot de Passe</label>
						<input type="password" class="form-control" name="ConfMotDePasse">
					</div>

					<div class="form-group p-3 m-2">
						<button type="submit" class="btn btn-success p-3 center-block" data-toggle="modal">
						Enregistrer les modifications
						</button>
					</div>	
					</form>
				</div>

			

				<div class="container col-sm-6 border">

				<form action="./Modif_PointFav.php" id="ModifPointFav" method="post"> <!-- Formulaire Modif MDP -->

					<p class="text-center font-weight-bold">Point Favoris</p>

					<?php
					$Point = new Point();
					$table_depart = $Point->get_Point(True);

					$Favori = new Point();
					$PointFav = $Favori->get_PointFav($idCovoitureur);

					echo '<p >Votre Point Favori : '.$PointFav["Nom"].'</p>';

					echo '<div class="form-group ">';
					echo '<label for="arrive" class="font-weight-bold">Modifier Point Favori</label>';
					echo '<select class="custom-select my-1 mr-sm-2" name="PointFavori">';
					echo '<option selected value="">Choisir...</option>';

					foreach ($table_depart as $value) {
						echo '<option value=' . $value["idPoint_RDV"] . '>' . $value["Nom"] . '</option>';
					}

					echo '</select>';
					echo '</div>';
					?>

						<div class="form-group p-3 m-2">
							<button type="submit" class="btn btn-success p-3 center-block" data-toggle="modal">
							Enregistrer les modifications
						</button>

					</div>

				</form>

				</div>

			</div>
			
		</div>		

	</div>

	</div>

</body>

</html>
