
<!-- POPUP -->
<div class="modal fade" id="popupModifPoint">
<div class="modal-dialog modal-lg">
    <div class="modal-content">


    <!-- POPUP Header -->
    <div class="modal-header">
        <h4 class="modal-title">Modification Point de RDV</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>


    <!-- POPUP body -->
    <div class="modal-body">

        <form class="modifPoint" method="post">

            <div class="container border rounded shadow">
                <div class="form-group" align="left">
                    <label for="nomPoint" class="mr-sm-2">Nom : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="nomPoint" name="nomPoint" value="" required>

                </div>

                <div class="form-group" align="left">
                    <label for="adressePoint" class="mr-sm-2">Adresse : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="adressePoint" name="adressePoint" value="" required>

                </div>

                
                <div class="form-group" align="left">
                    <label for="villePoint" class="mr-sm-2">Ville : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="villePoint" name="villePoint" value="" required>

                </div>

                <div class="form-group" align="left">
                    <label for="latitudePoint" class="mr-sm-2">Latitude : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="latitudePoint" name="latitudePoint" value="" required>

                </div>

                <div class="form-group" align="left">
                    <label for="longitudePoint" class="mr-sm-2">Longitude : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="longitudePoint" name="longitudePoint" value="" required>

                </div>

                <div class="form-group" align="left">
                    <label for="imagePoint" class="mr-sm-2">Photo : </label><br/>
                    <img src="" id="lienImage" class="img-fluid rounded" width="200"><br/>
                    <input type="file" class="mb-2 mr-sm-2" id="imagePoint" name="imagePoint" value="">

                </div>
            </div>

            <!-- POPUP footer -->
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-success">Enregistrer</button>
            </div>

            <?php   
                if(isset($_POST['nomPoint']) && isset($_POST['adressePoint']) && isset($_POST['villePoint']) && isset($_POST['latitudePoint']) && isset($_POST['longitudePoint']))
                {
                    $Modif_Point = new Point();
                    $Modif_Point->set_Point(Nom,$_POST['nomPoint'],$_POST['idPoint_RDV']);
                    $Modif_Point->set_Point(Adresse,$_POST['adressePoint'],$_POST['idPoint_RDV']);
                    $Modif_Point->set_Point(Ville,$_POST['villePoint'],$_POST['idPoint_RDV']);
                    $Modif_Point->set_Point(Latitude,$_POST['latitudePoint'],$_POST['idPoint_RDV']);
                    $Modif_Point->set_Point(Longitude,$_POST['longitudePoint'],$_POST['idPoint_RDV']);
                }

                /*
                //Vérifie si la période a bien été ajoutée
                $verif_ajout = new Indisp();
                if(isset($_POST['date_debut']) && isset($_POST['date_fin']) && isset($_POST['flexRadioDefault']))
                {
                    if($verif_ajout->verif_indisp($_POST['date_debut'],$_POST['date_fin'],$_POST['flexRadioDefault'],1) == True)
                    {
                    echo "</br></br>
                        <div class='alert alert-success text-center'>
                        <h5><strong>La période d'indisponibilité a bien été ajoutée.</strong></h5>
                        </div>";
                    }
                    else
                    {
                    echo "</br></br>
                        <div class='alert alert-danger text-center'>
                        <h2><strong>Erreur d'ajout de période d'indisponibilité.</strong></h2>
                        </div>";
                    }
                }*/
            ?>

        </form>

    </div>
    </div>
</div>
</div>