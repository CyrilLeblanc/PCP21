<!DOCTYPE html>
<html>

<head>
	<?php 
		include('../../bootstrap.html');
		include('./popupModifPoint.php');
		require_once "../request/Point.php"; 
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
		<div class="container overflow-auto" style="font-size: 10px; height: 450px;">
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

								<td> <button class="btn btn-success material-icons btn-sm" style="font-size: 150%" onclick="popupModifPoint(`' . $value["Nom"] . '`,`' . $value["Adresse"] . '`,`' . $value["Ville"] . '`,`' . $value["Latitude"] . '`,`' . $value["Longitude"] . '`,`' . $value["Point_Image"] . '`)" data-toggle="modal" data-target="#popupModif">&#xe3c9;</button></td>
							</tr>';
					}
				?>

			</tbody>
		</table>
		</div> 

	</div>
</body>

</html>