<?php 
class Covoitureur
{
    function __construct()
    {
        require_once "../config.php";
    }


    function verif_authentif($email, $password)
    // cette fonction permet de vérifier les informations de connection d'un utilisateur
    // en retournant le idCovoitureur correspondant au info 
    // si la valeur de retour est 0 alors il n'y a pas de correspondance avec les infos de connection
    {
        // on demande à récupérer le password et l'idCovoitureur correspondant à l'adresse mail
        $sql = "SELECT Mot_De_Passe, idCovoitureur FROM Covoitureur WHERE Email = '$email' ;";

        $res = $GLOBALS['mysqli']->query($sql);
        
        while ($row = $res->fetch_assoc())
        {
            if (password_verify($password, $row['Mot_De_Passe']))
            // on vérifie que le password fourni correspond au info de la base de donnée
            {
                return $row['idCovoitureur'];
            }
            else 
            {
                return 0;
            }
            
        }
    }



    function add_user($Nom, $Prenom, $Utilisateur_image, 
    $Num_Telephone, $Email, $Mot_De_Passe, $idPoint_RDV)
    {
        $sql = 'INSERT INTO Covoitureur (Nom, Prenom, Utilisateur_image, Num_Telephone, Email, Mot_De_Passe, idPoint_RDV) 
                VALUES ("'. $Nom .'", "'. $Prenom .'", "'. $Utilisateur_image .'", "'. $Num_Telephone .'", "'. $Email .'",
                "'. password_hash($Mot_De_Passe,PASSWORD_DEFAULT) .'", '. $idPoint_RDV .');';

        return  $GLOBALS['mysqli']->query($sql);
    }




    function set_user($name, $value, $idCovoitureur)
    // permet de modifier l'attribut d'un utilisateur dans la base de donnée
    // ATTENTION : Si value est un STRING il faut utiliser l'exemple suivant :
    //              set_userinfo('Nom',"'Bernard'",4);
    //              la valeurs STRING doit être doublement entouré de guillemets
    //      Dans cette exemple un change le Nom du covoitureur 4 en Bernard.
    {

        $sql = "UPDATE Covoitureur SET $name = $value WHERE idCovoitureur = $idCovoitureur;";

        return $GLOBALS['mysqli']->query($sql);
    }




    function get_user($idCovoitureur)
    // Permet de récupérer la totalité des infos utilisateurs en fonction de son idCovoitureur
    {

        $sql = "SELECT * FROM Covoitureur WHERE idCovoitureur = $idCovoitureur ;";

        $res = $GLOBALS['mysqli']->query($sql);
        while ($row = $res->fetch_assoc())
        {
            return $row;
        }
    }

    function get_covoitureur($is_confirme)
    // donne tout les covoitureurs en fonction de leurs confirmation
    // Renvoi un object sql
    {
        $sql = "SELECT * FROM Covoitureur WHERE is_Confirme = $is_confirme;";

        $res = $GLOBALS['mysqli'] ->query($sql);
        $stack = array();
        while ($row = $res->fetch_assoc())
        {
            array_push($stack,$row);
        }
        return $stack;
    }


    function add_voiture($idCovoitureur, $Modele, $Marque, $Annee, $Couleur, $Nbr_Place, $Voiture_Image)
    // permet d'ajouter une voiture à la base de donnée tout en l'associant à un utilisateur
    {

        $sql = "INSERT INTO Voiture (idCovoitureur, Modele, Marque, Annee, Couleur, Nbr_Place, Voiture_Image) 
        VALUES ($idCovoitureur, '$Modele', '$Marque', $Annee, $Couleur, $Nbr_Place, '$Voiture_Image');";
        return $GLOBALS['mysqli']->query($sql);
    }





    function set_voiture($name, $value, $idVoiture)
    // permet de changer les informations relative à une voiture dans la base de donnée 
    // (fonctionne de la même manière que set_user_info)
    {

        $sql = "UPDATE Voiture SET $name = $value WHERE idVoiture = $idVoiture ;";

        return $GLOBALS['mysqli']->query($sql);
    }


    function get_voiture($idCovoitureur)
    {

        $sql = "SELECT * FROM Voiture WHERE idCovoitureur = $idCovoitureur ;";

        $res = $GLOBALS['mysqli']->query($sql);

        return $res->fetch_assoc();
    }

    function del_voiture($idVoiture)
    {

        $sql = "DELETE FROM Voiture WHERE idVoiture = $idVoiture ;";

        return $GLOBALS['mysqli']->query($sql);
    }




    function inscription($idCovoitureur, $Date_depart, $Semaine, $is_unique, $is_Depart_Lycee, $Jour_Semaine, $Heure_Arrivee)
    // Permet d'enregistrer la demande d'inscription dans la base de donnée
    {

        $sql = "INSERT INTO Inscription (idCovoitureur, Date_Depart, Semaine, is_Unique, is_Depart_Lycee, Jour_Semaine, Heure_Arrivee)
        VALUES ($idCovoitureur, '$Date_depart', '$Semaine', $is_unique, $is_Depart_Lycee, '$Jour_Semaine', '$Heure_Arrivee');";

        return $GLOBALS['mysqli']->query($sql);
    }


    function validate_Covoitureur($idCovoitureur)
    // permet de valider l'inscription d'un covoitureur par le webmaster
    {

        $sql = "UPDATE Covoitureur SET is_Confirme = 1 WHERE idCovoitureur = $idCovoitureur";
        return $GLOBALS['mysqli']->query($sql);
    }


    
    function del_covoitureur($idCovoitureur)
    // permet de supprimer un covoitureur
    // à utiliser pour invalider l'inscription d'un utilisateur
    // supprime aussi les voitures du covoitureur
    {

        // obtient les idVoiture appartenant au covoitureur
        $voitures = $this->get_voiture($idCovoitureur);
        foreach ($voitures as $value)
        {
            $this->del_voiture($value['idVoiture']);
        }

        $sql = "DELETE FROM Covoitureur WHERE idCovoitureur = $idCovoitureur ;";
        return $GLOBALS['mysqli']->query($sql);
    }

    function get_date_depart($idInscription)
    {
        $sql = "SELECT * FROM Inscription WHERE idInscription = $idInscription;";
        $res = $GLOBALS['mysqli'] ->query($sql);
        
        while ($row = $res->fetch_assoc())
        {
            return $row;
        }
    }

    function get_participation($idParticipation)
    {
        $sql = "SELECT * FROM Participation WHERE idParticipation = $idParticipation;";

        $res = $GLOBALS['mysqli'] ->query($sql);
        $stack = array();
        while ($row = $res->fetch_assoc())
        {
            array_push($stack,$row);
        }
        return $stack;
    }

    function get_etape($idEtape)
    {
            $sql = "SELECT * FROM Etape WHERE idEtape = $idEtape;";
    
            $res = $GLOBALS['mysqli'] ->query($sql);
            $stack = array();
            while ($row = $res->fetch_assoc())
            {
                array_push($stack,$row);
            }
            return $stack;
    
    }

    function get_info_covoiturage($idCovoiturage)
    {
            $sql = "SELECT * FROM Participation WHERE idCovoiturage = $idCovoiturage;";
    
            $res = $GLOBALS['mysqli'] ->query($sql);
            $stack = array();
            while ($row = $res->fetch_assoc())
            {
                array_push($stack,$row);
            }
            return $stack;
    
    }

    function get_info_prochains_covoiturages($idCovoitureur)
    {
        $sql = "SELECT  Participation.Date, Participation.is_Conducteur, Participation.idCovoiturage, Etape.Kilometrage, Covoitureur.Nom, ".
        "Covoitureur.Prenom, PointA.Nom AS PointA_Nom, PointB.Nom AS PointB_Nom ".
        "FROM Covoitureur, Participation ".
        "INNER JOIN Etape ON Participation.idParticipation = Etape.idParticipation ".
        "INNER JOIN Point_RDV AS PointA ON Etape.idPoint_RDV_A = PointA.idPoint_RDV ".
        "INNER JOIN Point_RDV AS PointB ON Etape.idPoint_RDV_B = PointB.idPoint_RDV ".
        "WHERE Covoitureur.idCovoitureur=Participation.idCovoitureur AND Covoitureur.idCovoitureur=$idCovoitureur AND Participation.is_Valide_Systeme=1 ".
        "ORDER BY Date;";
    
            $res = $GLOBALS['mysqli'] ->query($sql);
            $stack = array();
            while ($row = $res->fetch_assoc())
            {
                array_push($stack,$row);
            }
            return $stack;
    
    }

    function get_is_conduct($idCovoitureur)
    {
        $sql = "SELECT is_Conducteur FROM Participation WHERE idCovoitureur = $idCovoitureur;";
        $res = $GLOBALS['mysqli'] ->query($sql);
        while($row = $res->fetch_assoc())
        {
            if($row['is_Conducteur'] == 0)
            {
                return '-';
            }
            else
            {
                return '+';
            }
        }
     
    }

    function get_NbrLigne($idCovoiturage)
    {
        $sql = "SELECT Ligne.Nbr_Points ".
        "FROM participation ".
        "INNER JOIN Covoiturage ON Participation.idCovoiturage = Covoiturage.idCovoiturage ".
        "INNER JOIN Ligne ON covoiturage.idLigne = Ligne.idLigne ".
        "WHERE Participation.idCovoiturage=$idCovoiturage;";
        $res = $GLOBALS['mysqli'] ->query($sql);
        $stack = array();

            while ($row = $res->fetch_assoc())
            {
                array_push($stack,$row);
            }
            return $stack;
    }

    function get_info_covoiturage_is_conduct($idCovoiturage)
    {
        $sql = "SELECT Participation.Date, Participation.is_Conducteur, Etape.Kilometrage, Covoitureur.Nom, Covoitureur.Prenom, Covoitureur.Utilisateur_Image, Covoiturage.idCovoiturage, ".
        "PointA.Nom AS PointA_Nom, PointB.Nom AS PointB_Nom ".
        "FROM Covoiturage, Covoitureur, Participation ".
        "INNER JOIN Etape ON Participation.idParticipation = Etape.idParticipation ".
        "INNER JOIN Point_RDV AS PointA ON Etape.idPoint_RDV_A = PointA.idPoint_RDV ".
        "INNER JOIN Point_RDV AS PointB ON Etape.idPoint_RDV_B = PointB.idPoint_RDV ".
        "WHERE Covoitureur.idCovoitureur=Participation.idCovoitureur AND Participation.idCovoiturage=$idCovoiturage AND Participation.is_Valide_Systeme=1 ".
        "AND participation.is_Conducteur=1 ".
        "ORDER BY Date;";
    
            $res = $GLOBALS['mysqli'] ->query($sql);
            $stack = array();
            while ($row = $res->fetch_assoc())
            {
                array_push($stack,$row);
            }
            return $stack;
    
    }

    function get_info_covoiturage_is_no_conduct($idCovoiturage)
    {
        $sql = "SELECT Participation.Date, Participation.is_Conducteur, Etape.Kilometrage, Covoitureur.Nom, Covoitureur.Prenom, Covoiturage.idCovoiturage, ".
        "PointA.Nom AS PointA_Nom, PointB.Nom AS PointB_Nom ".
        "FROM Covoiturage, Covoitureur, Participation ".
        "INNER JOIN Etape ON Participation.idParticipation = Etape.idParticipation ".
        "INNER JOIN Point_RDV AS PointA ON Etape.idPoint_RDV_A = PointA.idPoint_RDV ".
        "INNER JOIN Point_RDV AS PointB ON Etape.idPoint_RDV_B = PointB.idPoint_RDV ".
        "WHERE Covoitureur.idCovoitureur=Participation.idCovoitureur AND Participation.idCovoiturage=$idCovoiturage AND Participation.is_Valide_Systeme=1 ".
        "AND participation.is_Conducteur=0 ".
        "ORDER BY Date;";
    
            $res = $GLOBALS['mysqli'] ->query($sql);
            $stack = array();
            while ($row = $res->fetch_assoc())
            {
                array_push($stack,$row);
            }
            return $stack;
    
    }

    function get_info_prochain_covoiturage($idCovoiturage)
    {
        $sql = "SELECT Participation.Date, Participation.is_Conducteur, Etape.Kilometrage, Covoitureur.Nom, Covoitureur.Prenom, Covoiturage.idCovoiturage, ".
        "PointA.Nom AS PointA_Nom, PointB.Nom AS PointB_Nom ".
        "FROM Covoiturage, Covoitureur, Participation ".
        "INNER JOIN Etape ON Participation.idParticipation = Etape.idParticipation ".
        "INNER JOIN Point_RDV AS PointA ON Etape.idPoint_RDV_A = PointA.idPoint_RDV ".
        "INNER JOIN Point_RDV AS PointB ON Etape.idPoint_RDV_B = PointB.idPoint_RDV ".
        "WHERE Covoitureur.idCovoitureur=Participation.idCovoitureur AND Participation.idCovoiturage=$idCovoiturage AND Participation.is_Valide_Systeme=1 ".
        "ORDER BY Date;";
        
    
            $res = $GLOBALS['mysqli'] ->query($sql);
            $stack = array();
            while ($row = $res->fetch_assoc())
            {
                array_push($stack,$row);
            }
            return $stack;
    
    }
}

?>