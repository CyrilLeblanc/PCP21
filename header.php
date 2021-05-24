<div class="row p-4 bg-success shadow border" style="font-weight: bold; color: white;">

  <div class="col-sm-4 w-25 text-left">
    <button class="btn material-icons float-left" style="color: white; font-size: 400%;">&#xf02e;</button>
    <img src="./webmaster/images/Abeille.png" width="80">
    Nom
    Prénom
  </div>

  <div class="col-sm-4 w-50 text-center align-self-center">
    <h1>Accueil</h1>
  </div>

  <div class="col-sm-4 w-25 text-right">
  
    <?php
      if($_SESSION["is_Webmaster"] == 1)
      {
        echo 
          '<div class="dropdown dropleft float-right">
            <button class="btn material-icons float-right" data-toggle="dropdown" style="color: white; font-size: 400%;">&#xea3d;</button>

            <div class="dropdown-menu">

              <a class="dropdown-item" href="./webmaster/periode_indisponibilite/index.php" style="">Période Indisponibilité</a>

              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./webmaster/modifier_point/index.php">Modifier Point RDV</a>
                <a class="dropdown-item" href="./webmaster/modifier_covoitureur/index.php">Modifier Covoitureur</a>
                <a class="dropdown-item" href="./webmaster/modifier_ligne/index.php">Modifier Ligne</a>

              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./webmaster/demandes_creation_point/index.php">Demandes Création Point RDV</a>
                <a class="dropdown-item" href="./webmaster/demandes_creation_compte/index.php">Demandes Création Compte</a>

              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./webmaster/creer_nouveau_point/index.php">Créer Nouveau Point RDV</a>
                <a class="dropdown-item" href="./webmaster/creer_nouveau_covoiturage/index.php">Créer Nouveau Covoiturage</a>
                <a class="dropdown-item" href="./webmaster/creer_nouvelle_ligne/index.php">Créer Nouvelle Ligne</a>

            </div>
          </div>';
      }
    ?>
   
    +13
    <img src="./webmaster/images/Alvéoles.png" width="80">
    

  </div>

</div>
