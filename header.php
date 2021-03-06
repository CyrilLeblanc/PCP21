
<div class="bg-success row" style="font-weight: bold; color: white;">

  <div class="col-3" align="center">
    <a href="../disconnect.php">
      <button class="btn material-icons" style="color: white; font-size: 300%;">&#xe9ba;</button>
    </a>
  </div>

  <div class="col-6" align="center" style="padding-top: 0.5em; padding-bottom: 0.5em;">
    <h1>Accueil</h1>
  </div>

  <div class="col-3" align="center">
    <?php
      if($_SESSION["is_Webmaster"] == 1)
      {
        echo 
          '<div class="dropdown dropleft">
            <button class="btn material-icons" data-toggle="dropdown" style="color: white; font-size: 300%;">&#xea3d;</button>

            <div class="dropdown-menu">

              <a class="dropdown-item" href="../Profil/" style="">Profil</a>
                
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../webmaster/periode_indisponibilite/" style="">Période Indisponibilité</a>

              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../webmaster/modifier_point/">Modifier Point RDV</a>
                <a class="dropdown-item" href="../webmaster/modifier_covoitureur/">Modifier Covoitureur</a>
                <a class="dropdown-item" href="../webmaster/modifier_ligne/">Modifier Ligne</a>

              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../webmaster/demandes_creation_point/">Demandes Création Point RDV</a>
                <a class="dropdown-item" href="../webmaster/demandes_creation_compte/">Demandes Création Compte</a>

              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../webmaster/creer_nouveau_point/">Créer Nouveau Point RDV</a>
                <a class="dropdown-item" href="../webmaster/creer_nouvelle_ligne/">Créer Nouvelle Ligne</a>

            </div>
          </div>';
      }
      else
      {
        echo 
          '<a href="../Profil/">
            <button class="btn material-icons" style="color: white; font-size: 300%;">&#xf02e;</button>
		      </a>';
      }
    ?>
  </div>

</div>

<div class="bg-white shadow row" style="color: black;">
  
  <div class="col-2" align="right">
    <img src="../images/interface/Abeille.png" width="40">
  </div>

  <div class="col-6 text-left" style="font-size: 12px; padding-top: 1em; padding-bottom: 0.5em; padding-left: 0;">
    <?php
      $name = strtoupper($_SESSION["Nom"]) . " " . $_SESSION["Prenom"];

      if(strlen($name) < 20)
      {
        echo $name;
      }
      else
      {
        echo $_SESSION["Nom"] . " ...";
      }
    ?>
  </div>

  <div class="col-2 text-right" style="font-size: 12px; padding-top: 1em; padding-bottom: 0.5em; padding-right: 0;">
  <?php
      if($_SESSION["Nbr_Alveoles"] > 0)
      {
        echo "+";
      }
      echo $_SESSION["Nbr_Alveoles"]; 
    ?>
  </div>

  <div class="col-2" align="left">
    <img src="../images/interface/Alvéoles.png" width="40">
  </div>
</div>
