<!DOCTYPE html>
<html>

<head>
  <?php 
    include('../../bootstrap.html');
    require_once "../sql/Point.php";
    require_once "../sql/Ligne.php";

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
  ?>
  <title>Création Nouvelle Ligne</title>
</head>

<body>
  <div class="container p-3 my-3 border shadow rounded" align="center">

    <div class="container bg-success p-2 my-2 rounded" >
      <a href="../../accueil">
        <button class="btn material-icons" style="color: white; font-size: 250%;">&#xe88a;</button>
      </a>
      <h2 class="text-center" style="color: white;">Créer Nouvelle Ligne</h2>
    </div>

  </div>
</body>

</html>