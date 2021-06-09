
<!-- POPUP -->
<div class="modal fade" id="popupInfosCovoitureur">
<div class="modal-dialog modal-lg">
    <div class="modal-content">


    <!-- POPUP Header -->
    <div class="modal-header">
        <h4 class="modal-title">Informations Covoitureur</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>


    <!-- POPUP body -->
    <div class="modal-body">

        <form class="infosCovoitureur" method="post">

            <div class="container border rounded shadow"><br/>
                <div class="form-group" align="center">
                    <label for="nom" class="mr-sm-2">Nom : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="nomCovoitureur" name="nomCovoitureur" value="" readonly>

                </div>

                <div class="form-group" align="center">
                    <label for="prenom" class="mr-sm-2">Prénom : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="prenomCovoitureur" name="prenomCovoitureur" value="" readonly>

                </div>

                
                <div class="form-group" align="center">
                    <label for="num" class="mr-sm-2">N° Téléphone : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="numCovoitureur" name="numCovoitureur" value="" readonly>

                </div>

                <div class="form-group" align="center">
                    <label for="mail" class="mr-sm-2">E-Mail : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2" id="mailCovoitureur" name="mailCovoitureur" value="" readonly>

                </div>

                <div class="form-group" align="center">
                    <label for="imageCovoitureur" class="mr-sm-2">Photo : </label><br/>
                    <img src="" id="lienImageCovoitureur" class="img-fluid border rounded" width="200"><br/>

                </div>
            </div>

        </form>

    </div>
    </div>
</div>
</div>