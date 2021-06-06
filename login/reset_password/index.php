<?php
require_once '../../config.php';
if (!isset($_GET['token']))
{
    echo "pas de token";
} else {
    $token = $_GET['token'];
    $sql = "SELECT * FROM Token WHERE Content = '$token'";
    $res = $GLOBALS['mysqli']->query($sql);
    while ($row = $res->fetch_assoc())
    {
       $idCovoitureur = $row['idCovoitureur']; 
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php include '../../bootstrap.php'; ?>
    <title>Changement de mot de passe</title>
</head>
<body>
    <form action="password_changer.php" method="post">
        <label for="password">Nouveau mot de passe :</label><br/>
        <input type="password" id="password" name="password"><br/>
        <label for="verif_password">Retaper le mot de passe :</label><br/>
        <input type="password" id="verif_password"><br/>
        <input name="idCovoitureur" value="<?php echo $idCovoitureur?>" hidden>
        <input name="token" value="<?php echo $_GET['token']?>" hidden>
        <button type="submit">Valider</button>
    </form>
</body>
</html>