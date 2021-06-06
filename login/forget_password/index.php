<!DOCTYPE html>
<html>
<head>
    <?php include '../../bootstrap.php';?>
    <title>Mot de passe oublié</title>
</head>
<body>
    <form action="verif_mail.php" method="post">
        <label for="e-mail">Quel est votre adresse e-mail ?</label><br/>
        <input type="mail" id="e-mail" name="mail" required></input>
        <button>Valider</button>
    </form>
</body>
</html>