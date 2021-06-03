<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<?php include '../bootstrap.html'; ?>
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

			<?php echo $_SESSION['Nbr_Alveoles']; ?>
			<img src="../images/interface/Alvéoles.png" width="60">
		</div>
	</div>
	</div>


	<div class="container-fluid p-3 my-3 border shadow rounded"> <!-- conteneur principale -->

		<form action="./Modif_Profil.php" id="Profil" method="post">

			<div class="text-center">

				<button type="submit" class="btn btn-success p-3 col-sm-3 center-block"> <!-- bouton submit -->
					Enregistrer les modifications
				</button>

			</div>

			<div class="container bordered"> <!-- conteneur information du compte du covoitureur -->


				<div class="row"> <!-- conteneur info perso + voiture(s) -->

					<div class="container col-sm-6 border "> <!-- conteneur information personnelle du covoitureur (1er sous conteneur du 1er conteneur) -->

						<p class="text-center font-weight-bold">Identité</p>
						<img src="<?php echo $_SESSION['Utilisateur_Image'] ?>" style="width:100px;" class="rounded float-left">

						<div class="row"> 

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
								pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}">
							</div>
						</div>

					</div>

					<div class="container col-sm-6 border"> <!-- conteneur information voiture(s) (2ème sous conteneur du 1er conteneur) -->


						<p class="text-center font-weight-bold">Voiture</p>

						<div class="row"> 

							<img src="../images/interface/Voiture.png" style="width:100px;" class="rounded col-sm-2">

							<div class="col-sm-6"></div>

							<button class="btn material-icons col-sm-2 float-right" style="color: green; font-size: 300%;">&#xe148</button>

							<button class="btn material-icons col-sm-2 float-right" style="color: green; font-size: 300%;">&#xe15d</button>
						</div>


						<div class="row"> 

							<div class="form-group p-3 m-2">
								<label for="usr">Marque</label>
								<input type="text" class="form-control" name="Marque" placeholder="">
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
								<label for="">Couleur</label>
								<input id="cp-component" type="text" name="Couleur" value="" class="form-control" />
								<script type="text/javascript">
									$(function() {
										$('#cp-component').colorpicker();
									});
								</script>
							</div>

						</div>

					</div>



				</div>

				<div class="row"> <!-- conteneur modif mdp + modif point favori -->

					<div class="container col-sm-6 border"> <!-- conteneur modification mdp (1er sous conteneur du 2ème conteneur) -->

						<p class="text-center font-weight-bold">Mot de Passe</p>



						<div class="form-group p-3 m-2">
							<label for="MotDePasseActuelle">Mot de Passe Actuel</label>
							<input type="password" name="MotDePasseActuelle" class="form-control">
						</div>

						<div class="form-group p-3 m-2">
							<label for="NouvMotDePasse">Nouveau Mot de Passe</label>
							<input type="password" name="NouvMotDePasse" class="form-control">

							<small id="AideMotDePasse" class="text-muted">
								Veuillez entrez au minimum 8 caractères
							</small>
						</div>

						<div class="form-group p-3 m-2">
							<label for="ConfMotDePasse">Confirmer Nouveau Mot de Passe</label>
							<input type="password" name="ConfMotDePasse" class="form-control">
						</div>


					</div>

					<div class="container col-sm-6 border"> <!-- conteneur modification point favori (2ème sous conteneur du 2ème conteneur) -->

						<p class="text-center font-weight-bold">Point Favoris</p>

					</div>

				</div>

			</div>



			<div class="text-center">

				<button type="submit" class="btn btn-success p-3 col-sm-3 center-block"> <!-- bouton submit -->
					Enregistrer les modifications
				</button>

			</div>

		</form>
	</div>

</body>

</html>