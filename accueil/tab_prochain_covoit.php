<div class="container rounded border ">

<table class="table table-hover">
    <thead>
        <th>Date et Heure d'arrivée prévu</th>
        <th>Sens</th>
        <th>Coût en Alvéole </th>
    </thead>
    <tbody>
<?php
$idCovoitureur = $_SESSION['idCovoitureur'];

$sql ="SELECT * FROM Participation, Covoiturage WHERE Participation.idCovoiturage = Covoiturage.idCovoiturage AND Participation.idCovoitureur = $idCovoitureur 
AND Participation.Date>=NOW() AND Covoiturage.Heure>=NOW() ORDER BY Date, Heure";
$res = $GLOBALS['mysqli']->query($sql);
while ($row = $res->fetch_assoc())
{
    $heure = $row['Heure'];
    $date = str_split($row['Date'], 10)[0];
    $alveole = $row['Kilometrage'];
    if ((bool)$row['is_Depart_Lycee'])
    {
        $sens = "Retour";
    } else {
        $sens = "Aller";
    }

    echo 

    "<tr onclick='info(".$row['idParticipation'].")' data-toggle='modal' data-target='#Detail_Etape'>
      <td>".$date. " " . $heure ."</td>
      <td>" . $sens . "</td>
      <td>" . $alveole . "</td>
      
    </tr>";
}

?>
    </tbody>
</table>
</div>
<script>
    function info(idParticipation)
    {
        document.getElementById("vue").setAttribute("src","./etapes.php?idParticipation="+idParticipation);
    }

</script>

<!-- Popup Détail d'une étape -->
<div id="Detail_Etape" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Détail de l'étape</h4>
      </div>
      <div class="modal-body">
        <iframe src="./etapes.php?" frameborder="0" id="vue"></iframe> <!-- Contenu rediriger vers etapes.php -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>