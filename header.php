<div class="row p-4 bg-success shadow border" style="font-weight: bold; color: white;">

  <div class="col-sm-4 text-left">
    <button class="btn material-icons float-left" style="color: white; font-size: 300%;">&#xf02e;</button>
    <img src="./webmaster/images/Abeille.png" width="80">
    Nom
    Prénom
  </div>

  <div class="col-sm-4 text-center">
    <h1>Accueil</h1>
  </div>

  <div class="col-sm-4 text-right">
    69
    <img src="./webmaster/images/Alvéoles.png" width="60">

    <?php
      if($_SESSION["is_Webmaster"] == 1)
      {
        echo '<button class="btn material-icons float-right" data-toggle="dropdown" style="color: white; font-size: 300%;">&#xea3d;</button>

        <div class="dropdown-menu">

          <a class="dropdown-item" href="./webmaster/periode_indisponibilite/index.php" style="">Période Indisponibilité</a>

          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="./webmaster/modifier_point.php">Modifier Point RDV</a>
            <a class="dropdown-item" href="./gestion_elements/modifier_covoitureur.php">Modifier Covoitureur</a>
            <a class="dropdown-item" href="./gestion_elements/modifier_ligne.php">Modifier Ligne</a>

          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="./gestion_elements/demandes_creation_point.php">Demandes Création Point RDV</a>
            <a class="dropdown-item" href="./gestion_elements/demandes_creation_compte.php">Demandes Création Compte</a>

          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="./gestion_elements/creer_nouveau_point.php">Créer Nouveau Point RDV</a>
            <a class="dropdown-item" href="./gestion_elements/creer_nouveau_covoiturage.php">Créer Nouveau Covoiturage</a>
            <a class="dropdown-item" href="./gestion_elements/creer_nouvelle_ligne.php">Créer Nouvelle Ligne</a>

        </div>';
      }
    ?>

  </div>

</div>
