<!DOCTYPE html>
<html>
<head>
  <?php
  include '../bootstrap.html';
    ?>
</head>
<body>

    <?php
  include 'DemandeCovoiturage/Demande_Covoiturage.php';
  include 'Classement/Classement.php';
  include 'Historique/Historique.php';
    ?>

<!-- HEADER -->

<div class="row p-4 bg-success" style="font-weight: bold; color: white;">

<div class="col-sm-4">


      <button class="btn material-icons float-left" onclick="window.location.href = '../Profil/index.php';" style="color: white; font-size: 300%;">&#xf02e;</button>



    <img src="Photo.jpg" style="width:80px;">

  
    Jean EUDE
  

</div>

<div class="col-sm-4 text-center"><h1>Accueil</h1></div>

  <div class="col-sm-4 text-right">
    
        69
        <img src="../image/honey.png" width="60">
      </div>
</div>
  
  

</div>

<!-- HEADER -->


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

<?php include 'Prochain_Covoiturage/Prochain_covoiturage.php' ?><!-- TABLEAU DE PROCHAINS COVOITURAGE AFFICHER -->

</div>

</body>
</html>