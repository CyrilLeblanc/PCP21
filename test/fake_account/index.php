<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gen. COVOITUREUR</title>
    <script>
        function show_maps(label)
        {
            let map = document.getElementById('maps');
            if (map.getAttribute('hidden') == '')
            {
                map.removeAttribute('hidden')
            } else {
                map.setAttribute('hidden', '')
            }
        }

        function show_form()
        {
            let choice = document.getElementById('choice1');
            let multiple = document.getElementById('multiple');
            let single = document.getElementById('single');
            if (choice.checked)
            {
                multiple.setAttribute('hidden','');
                single.removeAttribute('hidden');
            } else {
                single.setAttribute('hidden','');
                multiple.removeAttribute('hidden');
            }
        }
    </script>
</head>
<body>
    <a href="../"><button>retour</button></a><br/>
    <div onclick='show_form()'>
        <input type="radio" name="choice" id="choice1" checked><label for="choice1">Single Covoitureur</label> <br>
        <input type="radio" name="choice" id="choice2"><label for="choice2">Multiple Covoitureur</label> <br><br>
    </div>

    <form action="create_single_account.php" method="post" style="border: solid 1px black;" id="single">
        <h2>single covoitureur</h2>
        <label for="is_webmaster">is_Webmaster :</label>
        <input required type="number" min="0" max="1" value="0" name="is_webmaster"><br><br>

        <label for="idPoint_RDV">idPoint_RDV : </label>
        <select name="Point_RDV">
        <?php
        require_once '../../config.php';
        require_once $GLOBALS['racine']."request/Point.php";
            $Point = new Point();
            $table_depart = $Point->get_Point(True);

            $nb_point = 0;
            foreach ($table_depart as $value) {
                $nb_point++;
                echo '<option value=' . $value["idPoint_RDV"] . '>[' . $value["idPoint_RDV"]. "]" . $value["Nom"] . '</option>';
            }
        ?>
        </select><br><a href="#" onclick="show_maps(this)">show maps</a><br>
        <iframe src="https://www.google.com/maps/d/embed?mid=1shKjg6wLcdcesb1G7URFzQsB3mW_AFMM" width="640" height="480" id="maps" hidden></iframe>

            <br><label for="prenom">Prénom :</label>
        <input required type="text" name="prenom" id="prenom" value="Jon"><br><br>

        <label for="nom">Nom :</label>
        <input required type="text" name="nom" id="nom" value="Doe"><br><br>

        <label for="tel">Téléphone :</label>
        <input required type="tel" name="tel" id="tel" value="0600000000"><br><br>

        <label for="mail">E-mail :</label>
        <input required type="mail" name="mail" id="mail" value="test@test.fr"><br><br>

        <label for="pass">Password :</label>
        <input required type="text" name="pass" id="pass" value="test"><br><br>

        <label for="confirm">is_Confirme</label>
        <input required type="number" name="confirm" id="confirm" min="0" max="1" value="1"><br><br>

        <label for="alveole">Nbr_Alveole</label>
        <input required type="number" name="alveole" id="alveole" value="0"><br><br>
        
        <hr> <h3>voiture</h3> <br>
        <label for="modele">Modèle :</label>
        <input required type="text" name="modele" id="modele" value="C5"><br><br>

        <label for="marque">Marque :</label>
        <input required type="text" name="marque" id="marque" value="Citroën"><br><br>

        <label for="annee">Année :</label>
        <input required type="number" name="annee" id="annee" value="2020" min="1900" max="2022"><br><br>

        <label for="couleur">Couleur :</label>
        <input required type="text" name="couleur" id="couleur" value="gris"><br><br>

        <label for="nb_place">Nbr_Place :</label>
        <input required type="text" name="nb_place" id="nb_place" value="5"><br><br>


        <button type="submit">submit</button>
    </form>




    <form action="create_multiple_account.php" method="post" id="multiple" hidden>
        <h2>Multiple_covoitureur</h2>
        <label for="nb_compte">Nombre de compte à créer :</label><small>plus le nombre est grand plus le chargement sera long</small><br>
        <input type="number" name="nb_compte" id="nb_compte" max="10" min="0" value="0" required><br><br>

        <label for="confirm">is_Confirme :</label>
        <input type="number" name="confirm" id="confirm" max="1" min="0" value="1" required><br><br>
        
        <label for="ligne">Sur la ligne :</label>
        <select name="ligne" id="ligne">
        <?php 
            require_once '../../config.php';
            $sql = "SELECT * FROM Ligne;";
            $res = $GLOBALS['mysqli']->query($sql);
            while ($row = $res->fetch_assoc())
            {
                echo '<option value=' . $row["idLigne"] . '>[' . $row["idLigne"]. "]" . $row["Nom"] . '</option>';
            }        
        ?>
        </select><br>
        <button type="submit">submit</button>
    </form>
</body>
</html>