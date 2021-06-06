<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="icon" href="favicon.ico" /> TODO -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<?php // ajoute un theme sombre en fonction du cookie "theme"

if (isset($_COOKIE['theme']) && $_COOKIE['theme'] == "dark")
{
      echo '<link rel="stylesheet" href="http://localhost/PCP21/dark.css">';
}
?>