<?php 

session_start();
require_once '../config.php';


function connect($idCovoitureur)
{
    // on récupère les données de l'utilisateur depuis la BDD
    $sql = "SELECT * FROM Covoitureur WHERE idCovoitureur = " . $idCovoitureur;
    $res = $GLOBALS['mysqli']->query($sql);
    while($row = $res->fetch_assoc())
    {
        $_SESSION = $row;
        break;
    }
    echo "Go Accueil!";
    header("Location: ./accueil/");
}




if(isset($_SESSION['idCovoitureur']))
{
    connect($_SESSION['idCovoitureur']);
}



if(isset($_POST['email']) && isset($_POST['password']))
// connexion via formulaire
{
    require_once '../config.php';
    $erreur_login = False;
    $erreur_confirm = False;
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$remember = $_POST['remember'];



    #############################################
    #   Vérification des informations fourni    #
    #############################################

	$sql = "SELECT * FROM Covoitureur WHERE Email = '$email'";
	$res = $GLOBALS['mysqli']->query($sql)->fetch_assoc();

    // Vérification de l'email
    $erreur_login = !isset($res);

    // Vérification du mot de passe
    $erreur_login = !password_verify($password, $res['Mot_De_Passe']);

    // Vérification de la confirmation du compte
    $erreur_confirm = !(bool)$res['is_Confirme'];
    

    #############################
    #   Gestion des erreurs     #
    #############################
    $time_to_wait = 1;

    if($erreur_login)
    {
        sleep($time_to_wait);
        echo "Erreur de login.\n";
    }

    if($erreur_confirm)
    {
        sleep($time_to_wait);
        echo "Erreur de confirmation de compte.\n";
    }


    if (!$erreur_login && !$erreur_confirm)
    {
        echo "Connexion Réussi\n";
        $_SESSION['idCovoitureur'] = $res['idCovoitureur'];

        ###################################
        #   Création de Token si demandé  #
        ###################################

        if($remember == "True")
        {
            // on créer le token
            $longueur_token = 255;
            $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ&é&é"(-è_çà)=~#{[|@]}^$ù*,;:!¨£%µ?./§';
            $token = '';
            for ($i = 0; $i < $longueur_token-1; $i++)
            {
                $token .= $caracteres[rand(0, strlen($caracteres) - 1)];
            }

            // on enregistre le token dans la base de donnée
            $date_debut = date("y-m-d");
            $date = getdate(strtotime('+30 day'));
            $date_fin = $date['year'] . "-" . $date['mon'] . "-" . $date['mday'];
            $idCovoitureur = $res['idCovoitureur'];

            // ajout du Token dans la BDD
            $sql = "INSERT INTO Token (Content, Date_Creation, Date_Fin, idCovoitureur) ".
            "VALUES ('$token', '$date_debut', '$date_fin', $idCovoitureur)";

            $GLOBALS['mysqli']->query($sql);

            // ajout du token dans les Cookies
            setcookie('token',$token,time()+3600*24*29);        #INTEGRATION
        }   
    }
} 

#####################################
#   Gestion de connexion par Token  #
#####################################

elseif(isset($_COOKIE['token']))
{
    $token = $_COOKIE['token'];     // on récupère le token dans les cookies

    // on le compare avec ceux de la base de donnée pour trouver l'idCovoitureur qui correpond
    $sql = "SELECT idCovoitureur, Date_Fin FROM Token WHERE Content = '$token'";
    $res = $GLOBALS['mysqli']->query($sql);

    while ($row = $res->fetch_assoc())
    // si on trouve un token qui correspond dans la BDD
    {
        echo "test";
        if ($row['Date_Fin'] < date("y-m-d"))   // on prend en compte la date limite du token
        {
            connect($row['idCovoitureur']);
        }
        break;
    }
}
?>