<!DOCTYPE html>
<html>
<head>
    <?php include '../../bootstrap.php';?>
    <title>Mot de passe oublié</title>
    <style>
        .container{
            text-align: center;
            padding: 1em;
            margin-top: 2em;
        }
        input{
            margin: 1em;
        }
        label{
            font-size: 2em;
        }
        form{
            margin-bottom:1em;
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
    if(isset($_GET['redirect']) && $_GET['redirect'] == "ok")
    {
        echo "<br/>
        <div class='alert alert-success text-center'>
            Si le compte existe un mail à été envoyé à l'adresse fourni. <br/>Le message peut mettre quelque minute à arriver. <br/>Vérifier les SPAM
        </div>";
        echo ``;
    }
    if (isset($_GET['error']) && $_GET['error'])
    {
        echo "<div class='alert alert-danger text-center'>
        Une erreur est survenu. Si le problème persiste merci de contacter le webmaster
    </div>";
    }

    ?>
    <div class="container border shadow rounded">
        <form action="verif_mail.php" method="post" class="">
            <label for="e-mail">Quel est votre adresse e-mail ?</label><br/>
            <input type="mail" id="e-mail" name="mail" required></input><br/>
            <button class="btn btn-primary">Valider</button>
        </form>
        <div class="alert alert-warning">
            Un mail sera envoyé à l'adresse fourni seulement si le compte existe.  
        </div>
    </div>
    
    <?php include_once '../../footer.html'?>
</body>
</html>