<!DOCTYPE html>
<html>

<head>
	<?php 
		ini_set('display_errors', 1);   #DEBUG
		ini_set('display_startup_errors', 1);   #DEBUG
		require_once '../../config.php'; 
		include $GLOBALS['racine'] . 'bootstrap.php';
        require_once $GLOBALS['racine'] . 'request/Ligne.php';
        require_once $GLOBALS['racine'] . 'request/Point.php'; 
	?>
    <script>
        function popupModifPoint(nom,idPoint)
        {
            document.getElementById("nomPoint").setAttribute("value",nom);
            document.getElementById("idPoint").setAttribute("value",idPoint);
        }
    </script>
	<title>Points de la Ligne</title>
</head>

<body>
    <div class="container p-3 my-3 border shadow rounded" align="center">

        <div class="container bg-success p-2 my-2 rounded" >
            <a href="./index.php">
                <button class="btn material-icons" style="color: white; font-size: 250%;">&#xe317;</button>
            </a>
            <h2 class="text-center" style="color: white;">Points de la Ligne </br> "<?php echo $_GET['Nom']; ?>"</h2>
        </div>

        <!-- TABLE -->
		<div class="container overflow-auto" style="font-size: 10px; height: 400px; max-width: 2000px;">
            <table class="table">

                <!-- TABLE Header -->
                <thead align="center">
                    <tr>
                        <th>Rang Point</th>
                        <th>Nom Point</th>
                        <th>Coordonnées Point</th>
                    </tr>
                </thead>

                <!-- TABLE Body -->
                <tbody align="center" style="height: 100px; overflow: auto;">
                
                    <?php
                        $idLigne = $_GET['idLigne'];
                        $nomLigne = $_GET['Nom'];
                        $sql = "SELECT Composition.idPoint_RDV, Composition.Rang, Point_RDV.Nom, Point_RDV.Latitude, Point_RDV.Longitude FROM Composition 
                            INNER JOIN Point_RDV ON Composition.idPoint_RDV = Point_RDV.idPoint_RDV
                            WHERE Composition.idLigne = $idLigne
                            ORDER BY Composition.Rang;";

                        $res = $GLOBALS['mysqli']->query($sql);
                        while ($row = $res->fetch_assoc())
                        {
                            echo
                            '<tr> 
                                <td>
                                    <div style="padding-top: 1em; padding-bottom: 1em;">
                                        ' . $row['Rang'] . '</div></td>
                                <td>
                                    <div style="padding-top: 1em; padding-bottom: 1em;">
                                        ' . $row['Nom'] . '</div></td>
                                <td>
                                    <div style="padding-top: 1em; padding-bottom: 1em;">
                                        <a href="https://www.google.com/maps/place/' . $row["Latitude"] . ',' . $row["Longitude"] . '" onclick="window.open(this.href); return false;"" 
                                            style="font-weight: bold; color: green;">' . $row["Latitude"] . '<br/>' . $row["Longitude"] . ' </a></div></td>
                            </tr>';
                        }
                        if(isset($_POST['delete']))
                        {
                            $delPoint = new Ligne();
                            $delPoint->delete_compo($idLigne,$idPoint);
                            echo 
                                '<div class="alert alert-success text-center">
                                    <h5><strong>Le Point à bien été ajoué à la Ligne.</strong></h5>
                                </div>';
                            
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <hr>

        <div align="center">
            <div class="container bg-success p-2 my-2 rounded" >
                <h3 class="text-center" style="color: white;">Ajouter un Point à la Ligne </br> "<?php echo $_GET['Nom']; ?>"</h3>
            </div>
            <!-- TABLE -->
            <div class="container overflow-auto" style="font-size: 12px; height: 450px;">
            <table class="table">


                <!-- TABLE Header -->
                <thead align="center">
                <tr>
                    <th>Nom</th>
                    <th>Coordonnées</th>
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
                                            ' . $value["Nom"] . ' </div></td>

                                    <td>
                                        <div style="padding-top: 1em; padding-bottom: 1em;">
                                            <a href="https://www.google.com/maps/place/' . $value["Latitude"] . ',' . $value["Longitude"] . '" onclick="window.open(this.href); return false;"" 
                                                style="font-weight: bold; color: green;">' . $value["Latitude"] . '<br/>' . $value["Longitude"] . ' </a></div></td>

                                    <td> 
                                        <div style="padding-top: 0.5em; padding-bottom: 0.5em;">
                                            <button class="btn material-icons bg-success" style="color: white; font-size: 200%;"
                                            onclick="popupModifPoint(`' . $value["Nom"] . '`,`' . $value["idPoint_RDV"] . '`)"
                                            data-toggle="modal" data-target="#popupModifPoint">&#xf1c2;</button></div></td>
                                        
                                        <input value="' . $value["idPoint_RDV"] . '" id="idPoint_RDV" hidden></input>
                                </tr>';
                        }
                    ?>
                    <?php include $GLOBALS['racine'] . 'webmaster/modifier_ligne/popupModifPoint.php';?>

                </tbody>
            </table>
            
        </div>
    </div>
</body>

</html>