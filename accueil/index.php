<?php
  session_start();
?>


<!DOCTYPE html>
<html>
<head>
  <?php
    include '../bootstrap.html';
  ?>
</head>
<body>

<?php
  include '../header.php';
  include 'DemandeCovoiturage/index.php';
  include 'Classement/Classement.php';
  include 'Historique/Historique.php';
?>

<div class="container-fluid p-3 my-3 border shadow rounded"> <!-- CONTAINER PRINCIPAL -->


  <button type="button" class="btn btn-success p-4 m-1 col-sm-12" data-toggle="modal" data-target="#DemandeCovoiturage">
    Demande de Covoiturages
  </button>


<div class="row">

    <button type="button" class="btn btn-success p-3 col-sm-6" data-toggle="modal" data-target="#historique">

    Historique
    </button>

    <button type="button" class="btn btn-success p-3 col-sm-6" data-toggle="modal" data-target="#Classement">
    Classement
  </button>



</div>

<?php include 'Prochain_Covoiturage/Prochain_covoiturage.php'; 
include '../footer.html';
?><!-- TABLEAU DE PROCHAINS COVOITURAGE AFFICHER -->


</div>

</body>
</html>