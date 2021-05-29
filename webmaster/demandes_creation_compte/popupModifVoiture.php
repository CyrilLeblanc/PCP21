
<!-- POPUP -->
<div class="modal fade" id="popupModifVoiture">
<div class="modal-dialog modal-lg">
    <div class="modal-content">


    <!-- POPUP Header -->
    <div class="modal-header">
        <h4 class="modal-title">Modification Voiture</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>


    <!-- POPUP body -->
    <div class="modal-body">

        <form class="modifPoint" method="post">

            <div class="container border rounded shadow">
                <div class="form-group" align="center">
                    <label for="marque" class="mr-sm-2">Marque : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="marqueVoiture" name="marqueVoiture" value="" required>

                </div>

                <div class="form-group" align="center">
                    <label for="modele" class="mr-sm-2">Modele : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="modeleVoiture" name="modeleVoiture" value="" required>

                </div>

                
                <div class="form-group" align="center">
                    <label for="annee" class="mr-sm-2">Année : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="anneeVoiture" name="anneeVoiture" value="" required>

                </div>

                <div class="form-group" align="center">
                    <label for="couleur" class="mr-sm-2">Couleur : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="couleurVoiture" name="couleurVoiture" value="" required>

                </div>

                <div class="form-group" align="center">
                    <label for="places" class="mr-sm-2">Nombre Places : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="placesVoiture" name="placesVoiture" value="" required>

                </div>

                <div class="form-group" align="center">
                    <label for="imageVoiture" class="mr-sm-2">Photo : </label><br/>
                    <img class="border" src="" id="lienImageVoiture" class="img-fluid rounded" width="200"><br/>
                    <input type="file" class="mb-2 mr-sm-2" id="imageVoiture" name="imageVoiture" value="">

                </div>
            </div>

            <!-- POPUP footer -->
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-success">Enregistrer</button>
            </div>

        </form>

    </div>
    </div>
</div>
</div>