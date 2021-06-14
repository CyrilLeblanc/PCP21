<?php
require_once "../../config.php";
require_once $GLOBALS['racine']."test/fake_account/Dummy_c.php";

$nb_dummy = $_POST['nb_compte'];
if ($nb_dummy == "")
{
    $nb_dummy = 10;
}
$is_Confirme = $_POST['confirme'];
if ($is_Confirme == "")
{
    $is_Confirme = 1;
}
$idLigne = $_POST['ligne'];

function clear_dbb()
{
    // on va chercher tout les covoitureur créer à partir de ce script
    // on les identifie grâce à Utilisateur_Image dans la base de donnée qui pointe sur "https://thispersondoesnotexist.com/image"
    $sql = "SELECT Covoitureur.idCovoitureur\n".
    "FROM Covoitureur \n".
    "WHERE Covoitureur.Utilisateur_Image = 'https://thispersondoesnotexist.com/image'\n";

    $res = $GLOBALS['mysqli']->query($sql);
    while ($row = $res->fetch_assoc())
    {
        $idCovoitureur = $row['idCovoitureur'];
    
        // Suppression des Etape & Participation
        $sql = "SELECT Etape.idEtape, Participation.idParticipation FROM Etape \n".
        "INNER JOIN Participation ON Covoitureur.idCovoitureur = Participation.idCovoitureur \n".
        "INNER JOIN Etape ON Etape.idParticipation = Participation.idParticipation\n".
        "WHERE Covoitureur.idCovoitureur = $idCovoitureur";

        $res_del = $GLOBALS['mysqli']->query($sql);
        while (mysqli_num_rows($res_del) > 0 && $row_del = $res_del->fetch_assoc())
        {
            $idEtape = $row_del['idEtape'];
            $idParticipation = $row['idParticipation'];
            $sql = "DELETE FROM Etape WHERE idEtape = $idEtape;
            DELETE FROM Participation WHERE idParticipation = $idParticipation";
            $GLOBALS['mysqli']->multi_query($sql);
        }

    // Suppression des Inscription du Covoitureur
        $sql = "SELECT Inscription.idInscription FROM Inscription \n".
        "INNER JOIN Covoitureur ON Covoitureur.idCovoitureur = Inscription.idCovoitureur \n".
        "WHERE Covoitureur.idCovoitureur = $idCovoitureur";

        $res_del = $GLOBALS['mysqli']->query($sql);
        while (mysqli_num_rows($res_del) > 0 && $row_del = $res_del->fetch_assoc())
        {
            $idInscription = $row_del['idInscription'];
            $sql = "DELETE FROM Inscription WHERE idInscription = $idInscription";
            $GLOBALS['mysqli']->query($sql);
        }

    // Suppression des Inscription & Covoiturage
        $sql = "SELECT Inscription.idInscription, Covoiturage.idCovoiturage FROM Inscription \n".
        "INNER JOIN Covoiturage ON Inscription.idCovoiturage = Covoiturage.idCovoiturage\n".
        "WHERE Inscription.idCovoitureur = $idCovoitureur";

        $res_del = $GLOBALS['mysqli']->query($sql);
        while (mysqli_num_rows($res_del) > 0 && $row_del = $res_del->fetch_assoc())
        {
            $idInscription = $row_del['idInscription'];
            $idCovoiturage = $row['idCovoiturage'];
            $sql = "DELETE FROM Inscription WHERE idInscription = $idInscription;
            DELETE FROM Covoiturage WHERE idCovoiturage = $idCovoiturage";
            $GLOBALS['mysqli']->multi_query($sql);
        }
    // Suppression des Token
        $sql = "SELECT Token.idToken FROM Token WHERE idCovoitureur = $idCovoitureur";
        $res_del = $GLOBALS['mysqli']->query($sql);
        while (mysqli_num_rows($res_del) > 0 && $row_del = $res_del->fetch_assoc())
        {
            $idToken = $row_del['idToken'];
            $sql = "DELETE FROM Token WHERE idToken = $idToken";
            $GLOBALS['mysqli']->multi_query($sql);
        }
    // Suppression des Voiture
        $sql = "SELECT Voiture.idVoiture FROM Voiture WHERE idCovoitureur = $idCovoitureur";
        $res_del = $GLOBALS['mysqli']->query($sql);
        while (mysqli_num_rows($res_del) > 0 && $row_del = $res_del->fetch_assoc())
        {
            $idVoiture = $row_del['idVoiture'];
            $sql = "DELETE FROM Voiture WHERE idVoiture = $idVoiture";
            $GLOBALS['mysqli']->multi_query($sql);
        }

    // Suppression du Covoitureur
        $sql = "DELETE FROM Covoitureur WHERE idCovoitureur = $idCovoitureur";
        $GLOBALS['mysqli']->multi_query($sql);
    }
}

function clear_csv()
{
    $header = "ID,Email,Password";
    file_put_contents('./saved_dummy_password.csv', $header);
}

clear_dbb();
clear_csv();

for($i = 0 ; $i < $nb_dummy ; $i++)
{
    $test = new Dummy($i+1, $is_Confirme, $idLigne);
    $test->presentation();
    $test->save_csv();
    $test->save_bdd();
}
echo "<a href='index.php'>back</a>";
?>
