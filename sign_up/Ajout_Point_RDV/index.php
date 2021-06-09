<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="index.css" />
  	<link rel="stylesheet" href="Modal.css" />
	<script type="checkbox"></script>
	<title>Inscription - Covoiturage Participatif</title>
	<?php 
		include('../../bootstrap.php');
		require_once('../../config.php');
	?>
	<script>
	
	function hideshow()
	{
		let test = document.getElementById('use_point_choix').checked;
		if (test)
		{
			document.getElementById('create_point').setAttribute('hidden', "");
			document.getElementById('use_point').removeAttribute('hidden');
		} else {
			document.getElementById('use_point').setAttribute('hidden', "");
			document.getElementById('create_point').removeAttribute('hidden');
		}
		console.log(test);
		
	}
	
	</script>
</head>
<body class="bg-success">

<div class="container rounded shadow border bg-white">
	<br/>
  	<h1>Choix d'un Point de RDV</h1>
  	<div class="form-group" onclick="hideshow()">
		<input type="radio"name="Point_RDV" value="use" id="use_point_choix" checked> <label for="use_point_choix">Utiliser un point existant déjà</label><br>
		<input type="radio" name="Point_RDV" value="create" id="create_point_choix"> <label for="create_point_choix">Créer un nouveau point de rendez-vous</label>
	</div>
<div id="use_point">

<table class="table table-striped">
	<thead align='center'>
		<th>Nom</th>
		<th>Coordonées</th>
		<th></th>
	</thead>
	<tbody align='center'>
		<?php 
		require_once '../../config.php';
		$sql = "SELECT * FROM Point_RDV ORDER BY Ville";
		$res = $GLOBALS['mysqli']->query($sql);
		while ($row = $res->fetch_assoc())
		{
			$nom = $row['Nom'];
			$latitude = $row['Latitude'];
			$longitude = $row['Longitude'];
			$coordonnee = 'https://www.google.com/maps/place/' . $row["Latitude"] . ',' . $row["Longitude"];
			$link = '../final.php?idPoint_RDV='.$row['idPoint_RDV'];

			echo 
"<tr>
	<td>$nom</td>
	<td>
		<a href='$coordonnee'>$latitude, $longitude</a>
	</td>
	<td>
		<a href='$link'>
			<button class='btn btn-success'>
				<span class='material-icons'>control_point<span>
			</button>
		</a>
	</td>
</tr>";
		}
		?>
	</tbody>
</table>


</div>
<form method="post" action="../final.php" class="form-group" id="create_point" hidden>
<div class="form-group">
	<label for="nom_point">Nom du point *:</label>
	<input type="name" class="form-control" id="nom_point" placeholder="Lycée Charles Poncet" name="nom" required>
</div>
<div class="form-group">
	<label for="ville">Ville avec code postal *:</label>
	<input type="name" class="form-control" id="ville" placeholder="74300 Cluses" name="ville" required>
</div>
<div class="form-group">
	<label for="adresse">Adresse *:</label>
	<input type="name" class="form-control" id="adresse" placeholder="1 Avenue Charles Poncet" name="adresse" required>
</div>
<div class="form-group">
	<label for="latitude">Coordonées Latitude *:</label>
	<input type="float" class="form-control" id="latitude" placeholder="46.06178" name="latitude" required>
</div>
<div class="form-group">
	<label for="longitude">Coordonées Longitude *:</label>
	<input type="float" class="form-control" id="longitude" placeholder="6.57994" name="longitude" required>
</div>

<button id="myBtn" class="btn btn-primary">Terminer</button>

</body>
</html>