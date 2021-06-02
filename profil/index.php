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


      <button class="btn material-icons float-left" onclick="window.location.href = '../accueil/index.php';" style="color: white; font-size: 200%;">&#xe5c4</button>
  

</div>

<div class="col-sm-4 text-center"><h1>Profil</h1></div>

  <div class="col-sm-4 text-right">
    
        <?php echo $_SESSION['Nbr_Alveoles'];?>
        <img src="../images/interface/Alvéoles.png" width="60">
      </div>
</div>
  
  

</div>


<div class="container-fluid p-3 my-3 border shadow rounded">

	<div class="container bordered">

		<div class="text-center">

	 		<button type="button" class="btn btn-success p-3 col-sm-3 center-block" data-toggle="modal" data-target="#DemandeCovoiturage">
				Enregistrer les modifications
	    	</button>

		</div>

	<div class="row">

		<div class="container col-sm-6 border ">
			<p class="text-center font-weight-bold">Identité</p>
			<img src="<?php echo $_SESSION['Utilisateur_Image']?>" style="width:100px;" class="rounded float-left">

		<div class="row">

			<div class="form-group p-3 m-2">
			  <label for="Prenom">Prénom</label>
			  <input type="text" class="form-control" id="usr" placeholder="Nouveau Prénom">
			</div>

  			<div class="form-group p-3 m-2">
			  <label for="Nom">Nom</label>
			  <input type="text" class="form-control" id="usr" placeholder="Nouveau Nom">
			</div>

  			<div class="form-group p-3 m-2">
    <label for="adresse_email">Adresse Email</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nouvelle Adresse Email">
  			</div>

  			<div class="form-group p-3 m-2">
			  <label for="telephone">telephone</label>
			  <input type="tel" id="telephone" name="telephone" class="form-control" placeholder="Nouveau n° de téléphone"
       pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}"
       required>
			</div>

  		</div>

		</div>

		<div class="container col-sm-6 border">


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
			  <input type="text" class="form-control" id="usr" placeholder="">
			</div>

  			<div class="form-group p-3 m-2">
			  <label for="usr">Modèle</label>
			  <input type="text" class="form-control" id="usr" placeholder="">
			</div>

  			<div class="form-group p-3 m-2">
			  <label for="usr">Année</label>
			  <input type="text" class="form-control" id="usr" placeholder="">
			</div>

  			<div class="form-group p-3 m-2">
			  <label for="usr">Type</label>
			  <input type="text" class="form-control" id="usr" placeholder="">
			</div>

			<div class="form-group p-3 m-2">
		  <label for="exampleFormControlInput1">Couleur</label>
		  <input id="cp-component" type="text" value="" class="form-control" />
		  <script type="text/javascript">
		    $(function () {
		      $('#cp-component').colorpicker();
		    });
		  </script>
			</div>

	

  		</div>

		</div>

	</div>

	<div class="row">

		<div class="container col-sm-6 border">

			<p class="text-center font-weight-bold">Mot de Passe</p>

			

			<div class="form-group p-3 m-2">
    <label for="exampleInputPassword1">Mot de Passe Actuel</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  			 </div>

  			<div class="form-group p-3 m-2">
    <label for="exampleInputPassword1">Nouveau Mot de Passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  			 
  			<small id="passwordHelpInline" class="text-muted">
      			Veuillez entrez au minimum 8 caractères
    		</small>
    		</div>

  			 <div class="form-group p-3 m-2">
    <label for="exampleInputPassword1">Confirmer Nouveau Mot de Passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  			 </div>

  		

		</div>

			<div class="container col-sm-6 border">

			<p class="text-center font-weight-bold">Point Favoris</p>

		</div>

	</div>

	<div class="text-center">

	 		<button type="button" class="btn btn-success p-3 col-sm-3 center-block" data-toggle="modal" data-target="#DemandeCovoiturage">
				Enregistrer les modifications
	    	</button>

		</div>

	</div>

</div>

</div>

</body>
</html>