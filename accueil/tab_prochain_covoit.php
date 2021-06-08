<div class="container rounded border ">

<table class="table">
    <thead>
        <th>Date et Heure d'arrivée prévu</th>
        <th>Sens</th>
        <th>Coût en Alvéole </th>
    </thead>
    <tbody>
<?php
$idCovoitureur = $_SESSION['idCovoitureur'];
$sql ="SELECT * FROM Participation, Covoiturage WHERE Participation.idCovoiturage = Covoiturage.idCovoiturage AND Participation.idCovoitureur = $idCovoitureur ORDER BY Date, Heure";
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

    echo "<tr onclick='info(".$row['idParticipation'].")' data-toggle='modal' data-target='#myModal'>
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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <iframe src="./etapes.php?" frameborder="0" id="vue"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>