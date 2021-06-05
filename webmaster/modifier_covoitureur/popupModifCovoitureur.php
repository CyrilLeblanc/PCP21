
<!-- POPUP -->
<div class="modal fade" id="popupModifCovoitureur">
<div class="modal-dialog modal-lg">
    <div class="modal-content">


    <!-- POPUP Header -->
    <div class="modal-header">
        <h4 class="modal-title">Modification Covoitureur</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>


    <!-- POPUP body -->
    <div class="modal-body">

        <form class="modifCovoitureur" method="post">

            <div class="container border rounded shadow">
                <div class="form-group" align="center">
                    <label for="nom" class="mr-sm-2">Nom : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="nomCovoitureur" name="nomCovoitureur" value="" required>

                </div>

                <div class="form-group" align="center">
                    <label for="prenom" class="mr-sm-2">Prénom : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="prenomCovoitureur" name="prenomCovoitureur" value="" required>

                </div>

                
                <div class="form-group" align="center">
                    <label for="num" class="mr-sm-2">N° Téléphone : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="numCovoitureur" name="numCovoitureur" value="" required>

                </div>

                <div class="form-group" align="center">
                    <label for="mail" class="mr-sm-2">E-Mail : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="mailCovoitureur" name="mailCovoitureur" value="" required>

                </div>

                <div class="form-group" align="center">
                    <label for="imageCovoitureur" class="mr-sm-2">Photo : </label><br/>
                    <img src="" id="lienImageCovoitureur" class="img-fluid rounded" width="200"><br/>
                    <input type="file" class="mb-2 mr-sm-2" id="imageCovoitureur" name="imageCovoitureur" value="">

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