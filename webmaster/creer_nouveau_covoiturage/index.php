<!DOCTYPE html>
<html>
<head>
  <?php 
    include('../../bootstrap.html');
    require_once "../../request/Point.php";
    require_once "../../request/Covoitureur.php"; 
    require_once "../../config.php";

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
  ?>
  <script>
    function copycat()
    {
      clone = document.getElementById("Etape").cloneNode(true);
      document.getElementById("ListEtapes").appendChild (clone);
    }
  </script>
  <script>
    let tabCovoitureur = [
    <?php 
      $sql = "SELECT Nom, Prenom, idCovoitureur FROM Covoitureur WHERE is_Confirme = 1;";
          $res = $GLOBALS['mysqli']->query($sql);
          while ($row = $res->fetch_assoc())
          {
            $name = $row['Nom'] . " " . $row['Prenom'];
            $idCovoitureur = $row['idCovoitureur'];
            echo ", $idCovoitureur : '$name'";
          }
    ?>
    ]

  </script>
  <title>Création Nouveau Covoiturage</title>
</head>

<body>
  <div class="container p-3 my-3 border shadow rounded" align="center">

    <div class="container bg-success p-2 my-2 rounded" >
      <a href="/index.php">
        <button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
      </a>
      <h2 class="text-center" style="color: white;">Créer Nouveau Covoiturage</h2>
    </div>

    <div class="container p-3 my-3" align="center">
    
      <!-- FORM -->
      <form class="needs-validation" method="post" action="">

      <!-- FORM Input Fields -->
      <div class="form-group col-12" align="center">
        <label for="date" class="mr-sm-2">Date : </label></br>
        <input type="date" class="mb-2" style="font-size: 10px; height: 25px; width: 125px;" placeholder="aaaa-mm-jj" name="date" required>
      </div>

      <div class="row">
        <div class="form-group col-6" align="center">
          <label for="pointDepart" class="mr-sm-2" required>Point de Départ : </label></br>
          <?php 
            $sql = "SELECT Nom, idPoint_RDV FROM Point_RDV WHERE is_Confirme = 1;";
            $res = $GLOBALS['mysqli']->query($sql);
          ?>
          <td>
            <select class="mb-2" style="font-size: 10px; height: 25px; width: 125px;">
            <?php while( $row = $res->fetch_assoc() ){?>
              <option value="<?php echo "value"; echo $row['Nom'];?>">
                <?php echo $row['Nom'];?>
              </option>
            <?php 
            }
            ?>
            </select>
          </td>
        </div>

        <div class="form-group col-6" align="center">
          <label for="pointArrivee" class="mr-sm-2" required>Point d'Arrivée : </label></br>
          <?php 
            $sql = "SELECT Nom, idPoint_RDV FROM Point_RDV WHERE is_Confirme = 1;";
            $res = $GLOBALS['mysqli']->query($sql);
          ?>
          <td>
            <select class="mb-2" style="font-size: 10px; height: 25px; width: 125px;">
            <?php while( $row = $res->fetch_assoc() ){?>
              <option value="<?php echo $row['Nom'];?>">
                <?php echo $row['Nom'];?>
              </option>
            <?php 
            }
            ?>
            </select>
          </td>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-6" align="center">
          <label for="heureDepart" class="mr-sm-2">Heure de Départ : </label></br>
          <input type="time" class="mb-2" style="font-size: 10px; height: 25px;" placeholder="hh:mm" name="HeureDepart" required>
        </div>

        <div class="form-group col-6" align="center">
          <label for="heureArrivee" class="mr-sm-2">Heure d'Arrivée : </label></br>
          <input type="time" class="mb-2" style="font-size: 10px; height: 25px;" placeholder="hh:mm" name="HeureArrivee" required>
        </div>
      </div>

      <hr>

      <div id="ListEtapes">
      <div class="copycat row" id="Etape">
        <div class="form-group border col-6" align="center">
          <label for="etape" class="mr-sm-2">Étape : </label></br>
          <?php 
          $sql = "SELECT Nom, idPoint_RDV FROM Point_RDV WHERE is_Confirme = 1;";
          $res = $GLOBALS['mysqli']->query($sql);
          ?>
          <td>
          <select class="mb-2" style="font-size: 10px; height: 25px; width: 125px;">
          <?php while( $row = $res->fetch_assoc() ){?>
              <option value="<?php echo $row['idPoint_RDV'];?>">
              <?php echo $row['Nom'];?>
              </option>
          <?php 
          }
          ?>
          </select>
          </td>
        </div>

        <div class="form-group border col-6" align="center">
          <label for="participants" class="mr-sm-2">Participants : </label></br>
          <?php 
          $sql = "SELECT Nom, Prenom, idCovoitureur FROM Covoitureur WHERE is_Confirme = 1;";
          $res = $GLOBALS['mysqli']->query($sql);
          ?>
          <td>
            <select class="mb-2" style="font-size: 10px; height: 25px; width: 125px;">
            <?php while( $row = $res->fetch_assoc() ){?>
                <option value="<?php echo $row['idCovoitureur'];?>">
                <?php echo $row['Nom'] . " " . $row['Prenom'];?>
                </option>
            <?php 
            }
            ?>
            </select>
          </td>
        </div>
      </div>
      </div>

      <div align="center"> 
        <input class="btn material-icons" style="color: black; font-size: 250%;" onclick="copycat()" id="button" type="button" value="+"></input>
      </div>

    </div>
  </div>
</body>

</html>