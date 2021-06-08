<?php
  session_start();
  $_SESSION['idCovoitureur'] = 1;
  require_once '../verif_session.php';
  ini_set('display_errors', 1);   #DEBUG
ini_set('display_startup_errors', 1);   #DEBUG
?>


<!DOCTYPE html>
<html>
<head>
  <?php
    include '../bootstrap.php';
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

<?php include 'Prochain_Covoiturage/Prochain_covoiturage.php'; ?><!-- TABLEAU DE PROCHAINS COVOITURAGE AFFICHER -->


</div>
<?php include '../footer.html';?>
</body>
</html>