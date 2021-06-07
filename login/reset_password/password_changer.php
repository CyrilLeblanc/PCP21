<?php

function erreur()
{
    
}

require_once '../../config.php';

$idCovoitureur = $_POST['idCovoitureur'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
$token = $_GET['token'];

$sql = "UPDATE Covoitureur SET Mot_De_Passe = '$password' WHERE idCovoitureur = $idCovoitureur";
$GLOBALS['mysqli']->query($sql);

$sql = "DELETE FROM Token WHERE Content = '$token'";
$GLOBALS['mysqli']->query($sql);


// vérification de la modification
$sql = "SELECT idCovoitureur FROM Covoitureur WHERE Mot_De_Passe = '$password'";
$res = $GLOBALS['mysqli']->query($sql);
if ($res->mysqli_num_rows() == 0)
{
    header("Location: index.php?erreur=true");
    exit;
} else {
    header("Location: ../../?password_changed=true");
    exit;
}

?>