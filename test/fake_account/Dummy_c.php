<?php
class Dummy {

    public $idCovoitureur;
    public $nom;
    public $prenom;
    public $password_unashed;
    public $password;
    public $mail;
    public $phone;
    public $Point_RDV;
    public $is_Confirme;
    public $idLigne;

    public $voiture;


    function __construct($id, $is_Confirme, $idLigne)
    {
        $this->idLigne = $idLigne;
        $this->is_Confirme = $is_Confirme;
        // On récupère le JSON et on le décode
        $content = json_decode(file_get_contents('https://api.namefake.com/'));

        // on récupère le Nom complet découpé
        $nom_complet = explode(" ", $content->name);
        
        $this->idCovoitureur = $id;
        $this->nom = $nom_complet[0];
        $this->prenom = $nom_complet[1];

        $content->password = str_replace(";",":",$content->password);
        $content->password = str_replace(",",".",$content->password);
        $content->password = str_replace('"',"`",$content->password);
        $this->password_unashed = $content->password;
        $this->password = password_hash($content->password, PASSWORD_DEFAULT);
        $this->mail = $content->email_u . "@" . $content->email_d;
        $this->phone = $this->gen_number();
        $this->Point_RDV = $this->gen_Point();
        $this->gen_voiture();
    }


    function gen_number()
    {
        $number = "+33";
        for($i = 0 ; $i < 4 ; $i++)
        {
            $temp = rand(0, 99);
            if ($temp < 10)
            {
                $temp = "0".$temp;
            }
            $number .= $temp;
        }
        return $number;
    }


    function gen_Point()
    {
        
        $sql = "SELECT Composition.idPoint_RDV, Point_RDV.Nom, Point_RDV.Ville FROM Composition\n". 
        "INNER JOIN Point_RDV ON Point_RDV.idPoint_RDV = Composition.idPoint_RDV \n". 
        "WHERE NOT Point_RDV.idPoint_RDV=1";
        
        
        if ($this->idLigne != "")
        {
            $idLigne = $this->idLigne;
            $sql .= " AND Composition.idLigne = $idLigne";
        }
        
        $res = $GLOBALS['mysqli']->query($sql);

        $i = rand(1, mysqli_num_rows($res));
        while ($row = $res->fetch_assoc())
        {
            $i--;
            if ($i == 0)
            {
                return $row;
            }
        }
    }

    function gen_voiture()
    {
        $voiture = array();
        $voiture['Modele'] = "C5";
        $voiture['Marque'] = "Citroën";
        $voiture['Annee'] = "2020";
        $voiture['Couleur'] = "rouge";
        $voiture['Nbr_Place'] = rand(2,7);

        $this->voiture = $voiture;
    }

    function presentation()
    {
        echo "idCovoitureur : " . $this->idCovoitureur . "\n<br>".
        "Nom : ".$this->nom."\n<br>".
        "Prenom : ".$this->prenom."\n<br>".
        "Mot de passe (clair) : ".$this->password_unashed."\n<br>".
        "E-mail : ".$this->mail."\n<br>".
        "Num : ".$this->phone."\n<br>".
        "Point_RDV : #". $this->Point_RDV['idPoint_RDV'] . "\t". $this->Point_RDV['Nom'] . " @ " . $this->Point_RDV['Ville']. "\n\n".
        "<br><br>";
    }

    function save_csv()
    {
        $data = file_get_contents('saved_dummy_password.csv');
        $data .= "\n" . $this->idCovoitureur . ";".
        $this->mail . ";".
        $this->password_unashed;
        file_put_contents('saved_dummy_password.csv', $data);
    }

    function save_bdd()
    {
        $is_Confirme = $this->is_Confirme;
        $sql = "INSERT INTO Covoitureur (idCovoitureur, Nom, Prenom, Num_Telephone, Email, Mot_De_Passe, idPoint_RDV, is_Confirme, Utilisateur_Image, Nbr_Alveoles) VALUE ".
        "(".$this->idCovoitureur.",'".$this->nom."','".$this->prenom."','".$this->phone."','".$this->mail."','".$this->password."',".$this->Point_RDV['idPoint_RDV'].", $is_Confirme, 'https://thispersondoesnotexist.com/image', ".rand(-20,20).");";
        $GLOBALS['mysqli']->query($sql);

        $voiture = $this->voiture;
        $sql = "INSERT INTO Voiture (Modele, Marque, Annee, Couleur, Nbr_Place, is_Favoris, idCovoitureur) VALUE ('".
        $voiture['Modele'] . "', '".$voiture['Marque']. "', ".$voiture['Annee']. ", '".$voiture["Couleur"]. "', ".$voiture['Nbr_Place']. ", 1,".$this->idCovoitureur.");";
        $GLOBALS['mysqli']->query($sql);
    }
}
?>