
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
<?php
/*
$mysqli = new mysqli("example.com", "user", "password", "database");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

$res = $mysqli->query("SELECT 'choices to please everybody.' AS _msg FROM DUAL");
$row = $res->fetch_assoc();
echo $row['_msg'];


*/
?>

<?php

?>

<?php
// definir les variables vides
$nomErr = $prenomErr = $emailErr = $genderErr = $telephoneErr = "";
$nom = $prenom = $email = $gender = $comment = $telephone = "";




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nom"])) { //Si la valeur d'entré est vide il renvoie un message d'erreur
    $nomErr = "Nom est nécessaire";
  } else {
    $nom = test_input($_POST["nom"]); //Vérifie le format écrit et ajoute ce que comporte "name" si ...
    // vérifier qu'il comporte que des lettres et des espaces seulement
    if (!preg_match("/^[a-zA-Z- -é-è]*$/",$nom)) { // conditions si ! il comporte autres que des lettres ou d'espaces
      $nomErr = "Seulement les lettres et les espaces sont autorisés";
    }
  }

  if (empty($_POST["prenom"])) {
    $prenomErr = "Prénom est nécessaire";  
  } else {
    $prenom = test_input($_POST["prenom"]);
    // vérifier qu'il comporte que des lettres et des espaces seulement
    if (!preg_match("/^[a-zA-Z- -é-è]*$/",$prenom)) {
      $prenomErr = "Seulement les lettres et les espaces sont autorisés";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email est nécessaire";
  } else {
    $email = test_input($_POST["email"]);

    $domaine = explode('@', $email);

    //conditions format de l'email et vérif du nom de domaine        
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !checkdnsrr($domaine[1])) 
     {
      $emailErr = "email invalide";
    }

  }
    
  if (empty($_POST["telephone"])) {
    $telephoneErr = "telephone is required";
  } else {
    $telephone = test_input($_POST["telephone"]);

  if (!preg_match("/^(0)(6|7)([-. ]?[0-9]{2}){4}$/", $telephone)) //autorisé seulement les espaces ou pas ?
  {
  $telephoneErr = "numéro de téléphone invalide";
  }


   }



  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Genre est nécessaire";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PCP21 Inscription</h2>
<p><span class="error">* champs requis</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nom: <input type="text" name="nom" value="<?php echo $nom;?>">
  <span class="error">* <?php echo $nomErr;?></span>
  <br><br>
  Prenom: <input type="text" name="prenom" value="<?php echo $prenom;?>">
  <span class="error">* <?php echo $prenomErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Telephone: <input type="text" name="telephone" value="<?php echo $telephone;?>">
  <span class="error">* <?php echo $telephoneErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="Suivant" value="Suivant">  
</form>

<?php
echo "<h2>entrée:</h2>";
echo $nom;
echo "<br>";
echo $prenom;
echo "<br>";
echo $email;
echo "<br>";
echo $telephone;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
echo "<br>";
?>


<?php
setlocale(LC_TIME, "fr_FR");
echo strftime("%x")."<br>";
// Prints the day
echo date("l") . "<br>";

// Prints the day, date, month, year, time, AM or PM
echo date("H:i:s");


?>

</body>
</html>