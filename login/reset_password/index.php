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
    <script src="check.js"></script>
    <?php include '../../bootstrap.php'; ?>
    <title>Changement de mot de passe - PCP21</title>
    <style>
        form{
            margin-top: 2em;
            text-align: center;
        }
        form h1{
            font-weight: normal;
        }
        button{
            margin: 1em;
        }
        input{
            margin-bottom: 1em;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse bg-success text-white">
            <ul class="navbar-nav navbar-left">
                <li class="nav-item">
                    <a href="../">
                        <button class="btn btn-primary">
                            <span class="material-icons">arrow_back_ios_new</span>
                        </button>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item">
                    <h1>PCP21 - Mot de passe oublié</h1>
                </li>
            </ul>
        </nav>
        <?php 
        if (isset($_GET['erreur']) && $_GET['erreur'] == "true")
        {
            echo "<div class='alert alert-danger text-center' id='message'>
                Une erreur est surevenue. Merci de réessayer ultérieurement. Si le problème persiste contacter le webmaster
            </div>";
        }
        ?>

    <form action="password_changer.php" method="post" class="container border shadow" onsubmit="return checkForm();">

        <h1>Modifier votre mot de passe</h1>
        <div class='alert alert-danger text-center' id="message" hidden>
            Les mot de passes doivent être identique
        </div>
        

        <label for="password">Nouveau mot de passe :</label><br/>
        <input type="password" id="password" name="password" pattern=".{8,}" title="8 Caractères au minimum" required><br/>

        <label for="verif_password">Retaper le mot de passe :</label><br/>
        <input type="password" id="verif_password" required ><br/>

        <input name="idCovoitureur" value="<?php echo $idCovoitureur?>" hidden>
        <input name="token" value="<?php echo $_GET['token']?>" hidden>
        
        <button type="submit" class="btn btn-primary" >Valider</button>
    </form>


    <?php include_once '../../footer.html'?>
</body>
</html>