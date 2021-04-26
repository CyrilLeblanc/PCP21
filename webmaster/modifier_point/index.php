<?php 
	include('../bootstrap.html');
	require_once __DIR__."/request/Point.php"; 
?>
<script src="../popup.js"></script>

<title>Modifier Point RDV</title>

<div class="container p-3 my-3 border shadow rounded" align="center">

  <div class="container bg-success p-2 my-2 rounded" >
    <a href="/index.php">
      <button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
    </a>
    <h2 class="text-center" style="color: white;">Modifier Point RDV</h2>
  </div>

  	<!-- TABLE -->
	<div class="container overflow-auto" style="font-size: 10px; height: 400px;">
	  <table class="table">


		<!-- TABLE Header -->
	    <thead align="center">
	      <tr>
	        <th>Nom</th>
	        <th>Adresse</th>
	        <th>Coordonnées</th>
	        <th>Photo</th>
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
	    					<td>' . $value["Nom"] . '</td>

	    					<td>' . $value["Adresse"] . '<br/>' . $value["Ville"] . '</td>

	    					<td> <a href="https://www.google.com/maps/place/' . $value["Latitude"] . ',' . $value["Longitude"] . '" onclick="window.open(this.href); return false;"" style="font-weight: bold; color: green;">' . $value["Latitude"] . '<br/>' . $value["Longitude"] . '</td>

	    					<td> <a href="' . $value["Point_Image"] . '"onclick="window.open(this.href); return false;"> <img src="' . $value["Point_Image"] . '"class="img-fluid rounded" width="100"></img></a> </td>

	    					<td>' . '<button class="btn btn-success material-icons" onclick="popupModifPoint(`' . $value["Nom"] . '`,`' . $value["Adresse"] . '`,`' . $value["Ville"] . '`,`' . $value["Latitude"] . '`,`' . $value["Longitude"] . '`,`' . $value["Point_Image"] . '`)" data-toggle="modal" data-target="#popupModif">&#xe3c9;</button>' . '</td>
	    				</tr>';
	    		}
	    	?>

	    </tbody>
	  </table>
	</div>



	<!-- POPUP -->
	<div class="modal fade" id="popupModif">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">


	      <!-- POPUP Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Modification Point de RDV - Work In Progress ...</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>


	      <!-- POPUP body -->
	      <div class="modal-body">

	        <form class="modifPoint" method="post">

	        	<div class="container border rounded shadow">
		        	<div class="form-group" align="left">
		  				<label for="nomPoint" class="mr-sm-2">Nom : </label><br/>
		  				<input type="text" class="mb-2 mr-sm-2" id="nomPoint" name="nomPoint" value="" required>

		  				<?php
		  					$Modif_Nom_Point = new Point();
		  					$Modif_Nom_Point -> set_Point("Nom",$_POST["nomPoint"],666);
		  				?>
					</div>

					<div class="form-group" align="left">
		  				<label for="adressePoint" class="mr-sm-2">Adresse : </label><br/>
		  				<input type="text" class="mb-2 mr-sm-2" id="adressePoint" name="adressePoint" value="" required>

		  				<?php
		  					$Modif_Adressse_Point = new Point();
		  					$Modif_Adresse_Point -> set_Point("Adresse",$_POST["adressePoint"],666);
		  				?>
					</div>

					
					<div class="form-group" align="left">
		  				<label for="villePoint" class="mr-sm-2">Ville : </label><br/>
		  				<input type="text" class="mb-2 mr-sm-2" id="villePoint" name="villePoint" value="" required>

		  				<?php
		  					$Modif_Ville_Point = new Point();
		  					$Modif_Ville_Point -> set_Point("Ville",$_POST["villePoint"],666);
		  				?>
					</div>

					<div class="form-group" align="left">
		  				<label for="latitudePoint" class="mr-sm-2">Latitude : </label><br/>
		  				<input type="text" class="mb-2 mr-sm-2" id="latitudePoint" name="latitudePoint" value="" required>

		  				<?php
		  					$Modif_Latitude_Point = new Point();
		  					$Modif_Latitude_Point -> set_Point("Latitude",$_POST["latitudePoint"],666);
		  				?>
					</div>

					<div class="form-group" align="left">
		  				<label for="longitudePoint" class="mr-sm-2">Longitude : </label><br/>
		  				<input type="text" class="mb-2 mr-sm-2" id="longitudePoint" name="longitudePoint" value="" required>

		  				<?php
		  					$Modif_Longitude_Point = new Point();
		  					$Modif_Longitude_Point -> set_Point("Longitude",$_POST["longitudePoint"],666);
		  				?>
					</div>

					<div class="form-group" align="left">
		  				<label for="imagePoint" class="mr-sm-2">Image : </label><br/>
		  				<img src="" id="lienImage" class="img-fluid rounded" width="200"><br/>
		  				<input type="file" class="mb-2 mr-sm-2" id="imagePoint" name="imagePoint" value="" required>

		  				<?php
		  					$Modif_Image_Point = new Point();
		  					$Modif_Image_Point -> set_Point("Point_Image",$_POST["imagePoint"],666);
		  				?>
					</div>
				</div>

	    		<!-- POPUP footer -->
		      	<div class="modal-footer justify-content-center">
		        	<button type="submit" class="btn btn-success">Enregistrer</button>
		      	</div>

	        </form>

	      </div>
	    </div>
	  </div>
	</div>

</div>