
<!-- POPUP -->
<div class="modal fade" id="popupInfosVoiture">
<div class="modal-dialog modal-lg">
    <div class="modal-content">


    <!-- POPUP Header -->
    <div class="modal-header">
        <h4 class="modal-title">Informations Voiture</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>


    <!-- POPUP body -->
    <div class="modal-body">

        <form class="infosVoiture" method="post">

            <div class="container border rounded shadow"><br/>
                <div class="form-group" align="center">
                    <label for="marque" class="mr-sm-2">Marque : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="marqueVoiture" name="marqueVoiture" value="" readonly>

                </div>

                <div class="form-group" align="center">
                    <label for="modele" class="mr-sm-2">Modele : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="modeleVoiture" name="modeleVoiture" value="" readonly>

                </div>

                
                <div class="form-group" align="center">
                    <label for="annee" class="mr-sm-2">Année : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="anneeVoiture" name="anneeVoiture" value="" readonly>

                </div>

                <div class="form-group" align="center">
                    <label for="couleur" class="mr-sm-2">Couleur : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="couleurVoiture" name="couleurVoiture" value="" readonly>

                </div>

                <div class="form-group" align="center">
                    <label for="places" class="mr-sm-2">Nombre Places : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="placesVoiture" name="placesVoiture" value="" readonly>

                </div>

                <div class="form-group" align="center">
                    <label for="imageVoiture" class="mr-sm-2">Photo : </label><br/>
                    <img src="" id="lienImageVoiture" class="img-fluid border rounded" width="200"><br/>

                </div>
            </div>

        </form>

    </div>
    </div>
</div>
</div>