<!-- POPUP -->
<div class="modal fade" id="popupInfosPoint">
<div class="modal-dialog modal-lg">
    <div class="modal-content">


    <!-- POPUP Header -->
    <div class="modal-header">
        <h4 class="modal-title">Informations Point de RDV</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>


    <!-- POPUP body -->
    <div class="modal-body">

        <form class="modifPoint" method="post">

            <div class="container border rounded shadow">

                <div class="form-group" align="center">
                    <label for="nomPoint" class="mr-sm-2">Nom : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2 w-100" id="nomPoint" name="nomPoint" value="" readonly></input>

                </div>

                <div class="form-group" align="center">
                    <label for="adressePoint" class="mr-sm-2">Adresse : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2 w-100" id="adressePoint" name="adressePoint" value="" readonly></input>

                </div>

                
                <div class="form-group" align="center">
                    <label for="villePoint" class="mr-sm-2">Ville : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2 w-100" id="villePoint" name="villePoint" value="" readonly></input>

                </div>

                <div class="form-group" align="center">
                    <label for="latitudePoint" class="mr-sm-2">Latitude : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2 w-100" id="latitudePoint" name="latitudePoint" value="" readonly></input>

                </div>

                <div class="form-group" align="center">
                    <label for="longitudePoint" class="mr-sm-2">Longitude : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2 w-100" id="longitudePoint" name="longitudePoint" value="" readonly></input>

                </div>

                <div class="form-group" align="center">
                    <label for="imagePoint" class="mr-sm-2">Photo : </label><br/>
                    <img src="" id="lienImage" class="img-fluid rounded" width="200"></image><br/>

                </div>
            </div>

        </form>

    </div>
    </div>
</div>
</div>