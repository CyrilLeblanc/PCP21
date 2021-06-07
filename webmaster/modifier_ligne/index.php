<!DOCTYPE html>
<html>

<head>
	<?php 
		ini_set('display_errors', 1);   #DEBUG
		ini_set('display_startup_errors', 1);   #DEBUG
		require_once '../../config.php'; 
		include $GLOBALS['racine'] . 'bootstrap.php';
		require_once $GLOBALS['racine'] . 'request/Point.php';
	?>
	<title>Modifier Ligne</title>
</head>

<body>
	<div class="container p-3 my-3 border shadow rounded" align="center">


	<div class="container bg-success p-2 my-2 rounded" >
		<a href="../../accueil">
		<button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
		</a>
		<h2 class="text-center" style="color: white;">Modifier Ligne</h2>
	</div>

	<!-- TABLE -->
		<div class="container overflow-auto" style="font-size: 10px ;height: 400px; max-width: 2000px;">
		<table class="table">

			<!-- TABLE Header -->
			<thead align="center">
			<tr>
				<th>Nom</th>
				<th>Nombre Points</th>
				<th>Modifier</th>
			</tr>
			</thead>

			<!-- TABLE Body -->
			<tbody align="center" style="height: 100px; overflow: auto;">

				<?php
					$sql = "SELECT * FROM Ligne";
					$res = $GLOBALS['mysqli']->query($sql);
					while ($row = $res->fetch_assoc())
					{
					  	echo
					  	'<tr> 
						  	<td>
							  <div style="padding-top: 1em; padding-bottom: 1em;">
								  ' . $row['Nom'] . ' </div></td>
							<td>
								<div style="padding-top: 1em; padding-bottom: 1em;">
									<a href="./points_ligne.php?idLigne=' . $row['idLigne'] . '">
									<button class="bg-white border border-white rounded" style="font-weight: bold; color: green;">
									' . $row['Nbr_Points'] . ' </button></a></div></td>
							<td>
								<div style="padding-top: 0.5em; padding-bottom: 0.5em;">
									<button class="btn material-icons bg-success" style="color: white; font-size: 200%;">&#xe3c9;</button></div></td>
						</tr>';
					}
				?>
			</tbody>
		</table>
		</div>
	</div>
</body>

</html>

<!--
	<div style="padding-top: 0.5em; padding-bottom: 0.5em;">
									<button class="btn material-icons bg-success" style="color: white; font-size: 200%;"
									onclick="popupModifPoint(`' . $value["Nom"] . '`,`' . $value["Adresse"] . '`,`' . $value["Ville"] . '`,`' . $value["Latitude"] . '`,`' . $value["Longitude"] . '`,`' . $value["Point_Image"] . '`,`' . $value["idPoint_RDV"] . '`)" 
									data-toggle="modal" data-target="#popupModifPoint">&#xe3c9;</button></div>