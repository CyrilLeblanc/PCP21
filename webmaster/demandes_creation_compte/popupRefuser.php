
<!-- POPUP -->
<div class="modal fade" id="popupRefuser">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">


            <!-- POPUP Header -->
            <div class="modal-header">
                <h4 class="modal-title">Refuser Covoitureur</h4>
            </div>


            <!-- POPUP body -->
            <div class="modal-body">
                <form method="post">
                    <input type="text" id="idCovoitureur" name="idCovoitureur" value="" hidden>
                    <input type="text" id="idVoiture" name="idVoiture" value="" hidden>
                    <input type="text" id="mailAccepter" name="mailAccepter" value="" hidden>
                    <div class='alert alert-success text-center'>
                        <h5><strong>Vous n'avez pas accepté le nouveau Covoitureur.</strong></h5>
                    </div>
                    <div class="form-group" align="center">
                        <label class="mr-sm-2">Veuillez expliquer pourquoi : </label><br/>
                        <input type="text" class="mb-2 mr-sm-2" id="explication" name="explication" value="" required>
                    </div>
                    <div>
                        <button type="submit" name="Refuser" class="btn btn-success">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>