<?php
  session_start();
  $_SESSION["idCovoitureur"] = 50;

  require_once "./webmaster/request/config.php"; 

  $sql = "SELECT Nom, Prenom, Nbr_Alveoles, is_Webmaster FROM Covoitureur WHERE idCovoitureur = " . $_SESSION["idCovoitureur"];
  $res = $GLOBALS['mysqli']->query($sql)-> fetch_assoc();

  $_SESSION["is_Webmaster"] = $res["is_Webmaster"];
  $_SESSION["Nom"] = $res["Nom"];
  $_SESSION["Prenom"] = $res["Prenom"];
  $_SESSION["Nbr_Alveoles"] = $res["Nbr_Alveoles"];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Accueil</title>
  <?php include __DIR__."/bootstrap.html";?>

  <script>
    $(document).ready(function()
    {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>

</head>

<body>

  <div class="container-fluid">
    <?php include __DIR__."/header.php";?>
  </div>

</body>
</html>

