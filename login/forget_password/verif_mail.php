<?php

sleep(1);
// on va chercher le covoitureur correspondant a l'email demandé
// si on trouve un covoitureur on créer un token et on l'enregistre dans la bdd
// on envoi un lien avec en GET le token par mail

$_POST['mail'] = "hulerique@live.fr";

if (!isset($_POST['mail']))
// on vérifie que le mail est bien donnée
{
    header("Location: forget_password.php?error=true");
    exit;
}


function redirect()
{
    header("Location: index.php?redirect=ok");
    exit;
}

require_once '../../config.php';

$mail = $_POST['mail'];

$sql = "SELECT idCovoitureur FROM Covoitureur WHERE Email = '$mail'";
$res = $GLOBALS['mysqli']->query($sql);
if (mysqli_num_rows($res) == 0)
// si on a aucun résultat on redirige sur la page précédente
{
    redirect();
}


$idCovoitureur = $res->fetch_assoc()['idCovoitureur'];      // on récupère le 'l'idCovoitureur

// on créer un token pour la modification de mot de passe
$longueur_token = 50;
$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$token = '';
for ($i = 0; $i < $longueur_token-1; $i++)
{
    $token .= $caracteres[rand(0, strlen($caracteres) - 1)];
}

$date_debut = date("Y-m-d");
$date = getdate(strtotime('+10 day'));
$date_fin = $date['year'] . "-" . $date['mon'] . "-" . $date['mday'];


$lien = "https://pcp21.charles-poncet.net:8081/login/reset_password?token=".$token;
$message = "Pour changer votre mot de passe utiliser le lien suivant : $lien";

$success = mail($mail, "PCP21 - Modification de mot de passe" , $message);

if ($success)
// on enregistre le token seulement si on a réussi à envoyé le mail
{
    $sql = "INSERT INTO Token (Content, Date_Creation, Date_Fin, idCovoitureur) VALUES ('$token', '$date_debut', '$date_fin', $idCovoitureur);";
    $GLOBALS['mysqli']->query($sql);
} else {
    header("Location: forget_password.php?error=true");
    exit;
}

redirect();


?>