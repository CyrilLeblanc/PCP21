<?php
require_once '../config.php';
require_once $GLOBALS['racine']."request/Covoitureur.php";

$idCovoiturage=3;
?>

<div class="container">
  <!-- The Modal -->
  <div class="modal fade" id="detail">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Détail du Covoiturage</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
          <div class="tab">

          <?php
              
              $get_NbrLigne = new Covoitureur();
              $NbrLigne = $get_NbrLigne -> get_NbrLigne($idCovoiturage);

              $nbEtape=1;
              
          
          foreach($NbrLigne as $Ligne)
          {
            echo '<button class="tablinks" onclick="openC(event, 2)">Etape'.$nbEtape.'</button>';
            $nbEtape++;
            
          }

          echo "</div>";

          ?>
          
        <?php

        

        echo '<div id=2 class="tabcontent">';
          
        
        $get_Point = new Covoitureur();
        $Point = $get_Point -> get_info_prochain_covoiturage($idCovoiturage);

        $get_kilometrage = new Covoitureur();
        $Distance = $get_kilometrage -> get_info_prochain_covoiturage($idCovoiturage);

        $get_conduct = new Covoitureur();
        $is_conduct = $get_conduct -> get_info_covoiturage_is_conduct($idCovoiturage);

        $get_no_conduct = new Covoitureur();
        $is_no_conduct = $get_no_conduct -> get_info_covoiturage_is_no_conduct($idCovoiturage);

        
        ?>

            <div class="row">

              <div class="container col-sm-6 border ">
                <?php
                  foreach($Point as $PointAB)
                  {
                    echo '<p>Point de Départ: '.$PointAB["PointA_Nom"].'</p>';  
                    echo '<p>Point de Arrivée: '.$PointAB["PointB_Nom"].'</p>';     
                  }
                ?>
              </div>

              <div class="container col-sm-6 border ">
                <?php
                  foreach($Distance as $DistanceAB)
                  {
                    echo '<p>Kilométrage: '.$DistanceAB["Kilometrage"].'</p>'; 
                  }
                ?>
              </div>

            </div>

            <div class="row">
            
              <div class="container col-sm-6 border ">
                <?php
                  foreach($is_conduct as $IsConduct)
                  {
                    echo '<p>Nom du Conducteur: '.$IsConduct["Nom"].' '.$IsConduct["Prenom"].'</p>';
                    echo '<img source="'.$IsConduct["Utilisateur_Image"].'">'; 
                  }
                ?>
              </div>

              <div class="container col-sm-6 border ">
                <?php
                  foreach($is_no_conduct as $IsNoConduct)
                  {
                    echo '<p>Passager:</p>';
                    echo '<p>'.$IsNoConduct["Nom"].' '.$IsNoConduct["Prenom"].'</p>';  
                  }
                ?>
              </div>
              </div>

            </div>
          
        </div>

        
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        </div>
      </div>
      </div>
    </div>
  </div>
  
</div>

<script>
function openC(evt, Name) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(Name).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>