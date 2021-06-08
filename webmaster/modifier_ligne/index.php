<!DOCTYPE html>
<html>

<head>
	<?php
		require_once '../../config.php'; 
		include $GLOBALS['racine'] . 'bootstrap.php';
		require_once $GLOBALS['racine'] . 'request/Point.php';
		require_once $GLOBALS['racine'] . 'request/Ligne.php';
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
									' . $row['Nbr_Points'] . ' </div></td>
							<td>
								<div style="padding-top: 0.5em; padding-bottom: 0.5em;">
									<a href="./points_ligne.php?idLigne=' . $row['idLigne'] . '&Nom=' . $row['Nom'] . '">
									<button class="btn material-icons bg-success" style="color: white; font-size: 200%;">&#xe3c9;</button></a></div></td>
						</tr>';
					}
				?>
			</tbody>
		</table>
		</div>
	</div>
</body>

</html>
