<?php
	require_once '../config.php';
	require_once $GLOBALS['racine'].'verif_session.php';
?>
<!DOCTYPE html>
<html>

<?php
	require_once $GLOBALS['racine']."request/Point.php";
	require_once $GLOBALS['racine']."request/Covoitureur.php";
?>

<head>
	<?php include $GLOBALS['racine'].'bootstrap.php' ?>
	<script>
		function verifPassword()
		{
			let pass1 = document.getElementById('pass1').value;
			let pass2 = document.getElementById('pass2').value;
			if (pass1 == pass2)
			{
				return True;
			} else {
				document.getElementById('erreur_password').removeAttribute('hidden');
				return false;
			}
		}
	</script>
	<title>Profil - PCP21</title>
</head>
<body>
	<!-- HEADER -->
	<div class="row p-4 bg-success" style="font-weight: bold; color: white;">
		<div class="col-sm-4">
			<a href="../">
				<button class="btn material-icons float-left" style="color: white; font-size: 200%;">&#xe5c4;</button>
			</a>
		</div>

		<div class="col-sm-4 text-center">
			<h1>
				Profil
			</h1>
		</div>
	</div>

	<!-- BODY -->
	<div class="container-fluid p-3 my-3">
		<div class="container bordered">
			<div class="row">

				<!-- IDENTITÉ -->
				<div class="container col-sm-6 border ">
					<h2 class="text-center font-weight-bold">
						Identité
					</h2>
					<img src="../images/interface/Profil.png" style="width:100px;" class="rounded float-left">
					<div class="row">
						<form action="./Modif_Profil.php" id="ModifProfil" method="post"> <!-- Formulaire identité -->
							<div class="form-group p-3 m-2">
								<label for="Prenom">
									Prénom
								</label>
								<input type="text" class="form-control" name="Prenom" placeholder="Nouveau Prénom" value="<?php echo $_SESSION['Prenom']?>">
							</div>
							<div class="form-group p-3 m-2">
								<label for="Nom">
									Nom
								</label>
								<input type="text" class="form-control" name="Nom" placeholder="Nouveau Nom" value="<?php echo $_SESSION['Nom']?>">
							</div>
							<div class="form-group p-3 m-2">
								<label for="adresse_email">
									Adresse Email
								</label>
								<input type="email" class="form-control" name="Email" placeholder="Nouvelle Adresse Email" value="<?php echo $_SESSION['Email']?>">
							</div>
							<div class="form-group p-3 m-2">
								<label for="telephone">
									N° Téléphone
								</label>
								<input type="tel" name="Telephone" class="form-control" placeholder="Nouveau n° de téléphone"
								pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" value="<?php echo $_SESSION['Num_Telephone']?>">
							</div>			
						</form>
					</div>
				</div>

				<!-- VOITURE -->
				<div class="container col-sm-6 border">
					<form action="./Modif_Profil.php" id="ModifProfil" method="post">
						<h2 class="text-center font-weight-bold">
							Voiture
						</h2>
						<div class="text-center"> <!-- bouton voiture -->
							<button type="button" class="btn btn-success p-3 col-sm-4" data-toggle="modal" data-target="#Voiture">
								Voiture
							</button>
                   		</div>

						<?php
							// récupération de la voiture favorite du covoitureur
							$sql = "SELECT * FROM Voiture WHERE idCovoitureur = ". $_SESSION['idCovoitureur'] . " ORDER BY is_Favoris DESC";
							$res = $GLOBALS['mysqli']->query($sql);
							while ($row = $res->fetch_assoc())
							{
								$value = $row;
								break;
							}
						?>
						<div class="row">
							<div class="form-group p-3 m-2">
								<label for="usr">
									Marque
								</label>
								<input type="text" class="form-control" name="Marque" placeholder="Peugeot, Citroen ..." value="<?php echo $value['Marque']?>">
							</div>
							<div class="form-group p-3 m-2">
								<label for="usr">
									Modèle
								</label>
								<input type="text" class="form-control" name="Modele" placeholder="C5" value="<?php echo $value['Modele']?>">
							</div>
							<div class="form-group p-3 m-2">
								<label for="usr">
									Année
								</label>
								<input type="text" class="form-control" name="Annee" placeholder="2021" value="<?php echo $value['Annee']?>">
							</div>
							<div class="form-group p-3 m-2">
								<label for="usr">
									Couleur
								</label>
								<input type="text" class="form-control" name="Couleur" placeholder="Gris" value="<?php echo $value['Couleur']?>">
							</div>
							<div class="form-group p-3 m-2">
								<label for="usr">
									Places
								</label>
								<input type="text" class="form-control" name="Places" placeholder="(en comptant le conducteur)" value="<?php echo $value['Nbr_Place']?>">
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="row">
			
				<!-- PASSWORD -->
				<div class="container col-sm-6 border">
					<form action="./Modif_MDP.php" id="ModifMDP" method="post" onsubmit="return verifPassword()"> <!-- Formulaire Modif MDP -->	
						<h2 class="text-center font-weight-bold">
							Mot de Passe
						</h2>
						<label id="erreur_password" hidden>	
							Erreur les mot de passe doivent être identique <!-- Erreur affiché lors d'erreur mot de passe-->
						</label>
						<div class="form-group p-3 m-2">
							<label for="exampleInputPassword1">
								Mot de Passe Actuel
							</label>
							<input type="password" class="form-control" name="MotDePasseActuelle" id="pass_actuel">
						</div>

						<div class="form-group p-3 m-2">
							<label for="Pwd">
								Nouveau Mot de Passe
							</label>
							<input type="password" class="form-control" name="NouvMotDePasse" id="pass1" pattern=".{8,}" title="8 Caractères au minimum">

							<small id="PwdHelp" class="text-muted">
								Veuillez entrez au minimum 8 caractères
							</small>
						</div>

						<div class="form-group p-3 m-2">
							<label for="PwdConfirm">
								Confirmer Nouveau Mot de Passe
							</label>
							<input type="password" class="form-control" name="ConfMotDePasse" id="pass2">
						</div>

						<div class="form-group p-3 m-2">
							<button type="submit" class="btn btn-success p-3 center-block" data-toggle="modal">
								Enregistrer les modifications
							</button>
						</div>	
					</form>
				</div>

				<!-- POINT_RDV -->
				<div class="container col-sm-6 border">
					<form action="./Modif_PointFav.php" id="ModifPointFav" method="post"> <!-- Formulaire Modif MDP -->
						<h2 class="text-center font-weight-bold">
							Point Favoris
						</h2>
						<?php
							$Point = new Point();
							$table_depart = $Point->get_Point(True);

							$Favori = new Point();
							$PointFav = $Favori->get_PointFav($_SESSION['idCovoitureur']);
						?>
						<p>
							Votre Point Favori : 
							<b>
								<?php echo $PointFav["Nom"] ?>
							</b>
						</p>
						<div class="form-group ">
							<label for="arrive" class="font-weight-bold">
								Modifier Point Favori
							</label>
							<select class="custom-select my-1 mr-sm-2" name="PointFavori">
								<option selected value="">
									Choisir...
								</option>
								<?php 
									foreach ($table_depart as $value) {
										echo '<option value=' . $value["idPoint_RDV"] . '>' . $value["Nom"] . '</option>';
									}
								?>
							</select>
						</div>
						
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
	<?php 
		include $GLOBALS['racine'] . 'footer.html'; 
		include $GLOBALS['racine'] . 'Profil/Voiture.php'; 
	?>
</body>
</html>
