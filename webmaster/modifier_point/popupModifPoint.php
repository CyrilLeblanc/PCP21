<?php			
    function subPoint()
    {
        if(isset($_POST['nomPoint']) && isset($_POST['adressePoint']) && isset($_POST['villePoint']) && isset($_POST['latitudePoint']) && isset($_POST['longitudePoint']) && isset($_POST['idPoint']))
        {
            $Modif_Point = new Point();

            $temp = "'".$_POST['nomPoint'] . "'";
            $Modif_Point->set_Point("Nom",$temp,$_POST['idPoint']);

            $temp = "'".$_POST['adressePoint'] . "'";
            $Modif_Point->set_Point("Adresse",$temp,$_POST['idPoint']);

            $temp = "'".$_POST['villePoint'] . "'";
            $Modif_Point->set_Point("Ville",$temp,$_POST['idPoint']);

            $temp = "'".$_POST['latitudePoint'] . "'";
            $Modif_Point->set_Point("Latitude",$temp,$_POST['idPoint']);

            $temp = "'".$_POST['longitudePoint'] . "'";
            $Modif_Point->set_Point("Longitude",$temp,$_POST['idPoint']);
        }
    }
?>

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

                <div class="form-group" align="center">
                    <label for="nomPoint" class="mr-sm-2">Nom : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2 w-100" id="nomPoint" name="nomPoint" value="" required></input>

                </div>

                <div class="form-group" align="center">
                    <label for="adressePoint" class="mr-sm-2">Adresse : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2 w-100" id="adressePoint" name="adressePoint" value="" required></input>

                </div>

                
                <div class="form-group" align="center">
                    <label for="villePoint" class="mr-sm-2">Ville : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2 w-100" id="villePoint" name="villePoint" value="" required></input>

                </div>

                <div class="form-group" align="center">
                    <label for="latitudePoint" class="mr-sm-2">Latitude : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2 w-100" id="latitudePoint" name="latitudePoint" value="" required></input>

                </div>

                <div class="form-group" align="center">
                    <label for="longitudePoint" class="mr-sm-2">Longitude : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2 w-100" id="longitudePoint" name="longitudePoint" value="" required></input>

                </div>

                <div class="form-group" align="center">
                    <label for="imagePoint" class="mr-sm-2">Photo : </label><br/>
                    <img src="" id="lienImage" class="img-fluid rounded" width="200"></image><br/>
                    <input type="file" class="mb-2 mr-sm-2 w-100" id="imagePoint" name="imagePoint" value=""></input>

                </div>

                <div class="form-group" align="center" hidden>
                    <label for="idPoint" class="mr-sm-2" hidden>idPoint_RDV : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="idPoint" name="idPoint" value="" hidden></input>

                </div>
            </div>

            <!-- POPUP footer -->
            <div class="modal-footer justify-content-center">
                <button type="submit" name="submit" class="btn btn-success">Enregistrer</button>
            </div>

            <?php
                if(isset($_POST['submit']))
                {
                    subPoint();
                }
            ?>

        </form>

    </div>
    </div>
</div>
</div>