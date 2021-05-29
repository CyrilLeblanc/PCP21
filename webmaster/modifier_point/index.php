<!DOCTYPE html>
<html>

<head>
	<?php 
		include('../../bootstrap.html');
		include('./popupModifPoint.php');
		include('./popupInfosPoint.php');
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
				?>

			</tbody>
		</table>
		</div> 

	</div>
</body>

</html>

<!--<a href="https://www.google.com/maps/place/' . $value["Latitude"] . ',' . $value["Longitude"] . '" onclick="window.open(this.href); return false;"" style="font-weight: bold; color: green;">' . $value["Latitude"] . '<br/>' . $value["Longitude"] . '
<a href="' . $value["Point_Image"] . '"onclick="window.open(this.href); return false;"> <img src="' . $value["Point_Image"] . '"class="img-fluid rounded" width="100"></img></a>