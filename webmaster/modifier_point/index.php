<!DOCTYPE html>
<html>

<head>
	<?php 
		include('../../bootstrap.html');
		include('./popupModifPoint.php');
		include('./popupInfosPoint.php');
		require_once "../request/Point.php"; 

		if(isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['latitude']) && isset($_POST['longitude']))
		{
		  if(isset($_POST['submit']) && !empty($_FILES['photo']['name']))
		  {
			$filename = $_FILES['photo']['name'];
			$tempname = $_FILES['photo']['tmp_name'];
			$filesize = $_FILES['photo']['size'];
			$error = 1;
			$folder = "../images/".$filename;
	
			$extension = new SplFileInfo($filename);
			$ext = $extension->getExtension();
	
			$newname = "/PCP21/webmaster/images/" . $_POST['nom'] . "_" . $_POST['ville'] . "." . $ext;
			$newfolder = "../images/" . $_POST['nom'] . "_" . $_POST['ville'] . "." . $ext;
	
			$newname = addslashes($newname);
	
			if(move_uploaded_file($tempname,$folder)) 
			{
			  $_FILES['photo'] = $newname;
			}
			else 
			{ 
			  $_FILES['photo'] = null;
	
			  echo "</br></br>
				<div class='alert alert-danger text-center'>
				<h2><strong>Il y a un problème avec l'envoi de votre image.</strong></h2>
				</div>"; 
			}
	
			if($filesize > 5000000)
			{
			  echo "</br></br>
				<div class='alert alert-danger text-center'>
				<h2><strong>Le fichier dépasse la taille maximale de 5Mo.</strong></h2>
				</div>";
			  $error = 0;
			}
	
			if($ext != "jpg" && $ext != "jpeg" && $ext != "png")
			{
			  echo "</br></br>
				<div class='alert alert-danger text-center'>
				<h2><strong>Seulement les fichiers .jpg, .jpeg et .png sont acceptés.</strong></h2>
				</div>";
			  $error = 0;
			}
	
			if ($error == 0) 
			{
			  unlink($folder);
			  $newname = null;
			  
			  echo "</br></br>
				<div class='alert alert-danger text-center'>
				<h2><strong>Votre image n'a pas été ajoutée</strong></h2>
				</div>";
			}
	
			//Modification du Point de RDV avec image
			$Modif_Point_RDV = new Point();
			$Modif_Point_RDV->set_Point(Nom, $_POST['nom'], $_POST['idPoint_RDV']);
			//$Modif_Point_RDV->add_Point($_POST['nom'],$_POST['adresse'],$_POST['ville'],$_POST['latitude'],$_POST['longitude'],$newname,1);
	
			if($error == 1)
			{
			  rename($folder, $newfolder);
			}
		  }
		  elseif(isset($_POST['submit']) && empty($_FILES['photo']['name']))
		  {
			//Modification du Point de RDV sans image
			$Modif_Point_RDV = new Point();
			$Modif_Point_RDV->set_Point(Nom, $_POST['nom'], $_POST['idPoint_RDV']);
			//$Modif_Point_RDV->add_Point($_POST['nom'],$_POST['adresse'],$_POST['ville'],$_POST['latitude'],$_POST['longitude'],null,1);
		  }
	
		}
	  ?>
	<script src="./popup.js"></script>
	<title>Modifier Point RDV</title>
</head>

<body>
	<div class="container p-3 my-3 border shadow rounded" align="center">

		<div class="container bg-success p-2 my-2 rounded" >
			<a href="/index.php">
			<button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
			</a>
			<h2 class="text-center" style="color: white;">Modifier Point RDV</h2>
		</div>

		<!-- TABLE -->
		<div class="container overflow-auto" style="font-size: 12px; height: 450px;">
			<table class="table">


				<!-- TABLE Header -->
				<thead align="center">
				<tr>
					<th>Nom</th>
					<th>Informations</th>
					<th>Modifier</th>
				</tr>
				</thead>


				<!-- TABLE Body -->
				<tbody align="center" style="height: 100px; overflow: auto;">
				
					<?php
						$Point = new Point();
						$table = $Point -> get_Point(True);

						foreach($table as $value)
						{
							echo 
								'<tr> 
									<td>
										<div style="padding-top: 1em; padding-bottom: 1em;">
											' . $value["Nom"] . '</td>
										</div>

									<td> 
										<button class="btn material-icons container bg-success p-2 my-2 rounded" 
										onclick="popupInfosPoint(`' . $value["Nom"] . '`,`' . $value["Adresse"] . '`,`' . $value["Ville"] . '`,`' . $value["Latitude"] . '`,`' . $value["Longitude"] . '`,`' . $value["Point_Image"] . '`)" 
										style="color: white; font-size: 200%;" data-toggle="modal" data-target="#popupInfosPoint">&#xe0c8;</button></td>

									<td> 
										<div style="padding-top: 0.5em; padding-bottom: 0.5em;">
											<button class="btn material-icons" style="color: green; font-size: 200%;"
											onclick="popupModifPoint(`' . $value["Nom"] . '`,`' . $value["Adresse"] . '`,`' . $value["Ville"] . '`,`' . $value["Latitude"] . '`,`' . $value["Longitude"] . '`,`' . $value["Point_Image"] . '`)" 
											data-toggle="modal" data-target="#popupModifPoint">&#xe3c9;</button></td>
										</div>
								</tr>';
						}

						//Vérifie si le point a bien été modifié
						$verif_modif = new Point();
						if(isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['latitude']) && isset($_POST['longitude']))
						{
						  if($verif_modif->verif_Point($_POST['nom'],$_POST['adresse'],$_POST['ville'],$_POST['latitude'],$_POST['longitude']))
						  {
							echo "</br></br>
							  <div class='alert alert-success text-center'>
							  <h5><strong>Le Point de RDV a bien été modifié.</strong></h5>
							  </div>";
						  }
						  else
						  {
							echo "</br></br>
							  <div class='alert alert-danger text-center'>
							  <h2><strong>Erreur de modification de point de RDV.</strong></h2>
							  </div>";
						  }
						}
					?>

				</tbody>
			</table>
		</div> 

	</div>
</body>

</html>

<!--<a href="https://www.google.com/maps/place/' . $value["Latitude"] . ',' . $value["Longitude"] . '" onclick="window.open(this.href); return false;"" style="font-weight: bold; color: green;">' . $value["Latitude"] . '<br/>' . $value["Longitude"] . '
<a href="' . $value["Point_Image"] . '"onclick="window.open(this.href); return false;"> <img src="' . $value["Point_Image"] . '"class="img-fluid rounded" width="100"></img></a>