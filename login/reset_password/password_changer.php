<?php

require_once '../../config.php';

$idCovoitureur = $_POST['idCovoitureur'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
$token = $_GET['token'];

$sql = "UPDATE Covoitureur SET Mot_De_Passe = '$password' WHERE idCovoitureur = $idCovoitureur";
$GLOBALS['mysqli']->query($sql);

$sql = "DELETE FROM Token WHERE Content = '$token'";
$GLOBALS['mysqli']->query($sql);

?>