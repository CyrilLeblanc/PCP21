<?php
  session_start();
  $_SESSION["is_Webmaster"] = 1;
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