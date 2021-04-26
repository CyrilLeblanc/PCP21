<?php 
	include('../bootstrap.html');
	require_once __DIR__."/request/Point.php"; 
?>

<title>Desmandes Création Point RDV</title>

<div class="container p-3 my-3 border shadow rounded" align="center">


  <div class="container bg-success p-2 my-2 rounded" >
    <a href="/index.php">
      <button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
    </a>
    <h2 class="text-center" style="color: white;">Demandes Création Point RDV</h2>
  </div>

	<?php
		$Point = new Point();
		$table = $Point -> get_Point(0);

		if(sizeof($table) == 0)
		{
			echo '</br></br><h4 align="center">Pas de nouvelle demande de point de RDV.</h4>';
		}

		else
		{
    		foreach($table as $value)
    		{
    			echo 
				'<!-- TABLE -->
				<div class="container overflow-auto" style="font-size: 10px; height: 400px;">
				  <table class="table">


				<!-- TABLE Header -->
			    <thead align="center">
			      <tr>
			        <th>Nom du Point</th>
			        <th>Adresse</th>
			        <th>Coordonnées</th>
			        <th>Photo</th>
			        <th>Validation</th>
			      </tr>
			    </thead>


			    <!-- TABLE Body -->
			    <tbody align="center" style="height: 100px; overflow: auto;">
    				<tr> 
    					<td>' . $value["Nom"] . '</td>

    					<td>' . '...' . '</td>

    					<td> <a href="https://www.google.com/maps/place/' . $value["Latitude"] . ',' . $value["Longitude"] . '" onclick="window.open(this.href); return false;"" style="font-weight: bold; color: green;">' . $value["Latitude"] . '<br/>' . $value["Longitude"] . '</td>

    					<td> <a href="' . $value["Point_Image"] . '"onclick="window.open(this.href); return false;"> <img src="' . $value["Point_Image"] . '"class="img-fluid rounded" width="100"></img></a> </td>

    					<td>
    						<button class="btn material-icons" style="color: green; font-size: 200%;" data-toggle="modal" data-target="#popup">&#xe92d;</button>
    						<button class="btn material-icons" style="color: red; font-size: 200%;" data-toggle="modal" data-target="#popup">&#xe888;</button>
    					</td>
    				</tr>
    			</tbody>
    			</table>';
	    	}
		}
	?>

</div>