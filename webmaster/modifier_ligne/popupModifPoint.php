<!-- POPUP -->
<div class="modal fade" id="popupModifPoint">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- POPUP Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modifier Point Ligne</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- POPUP body -->
            <div class="modal-body">
                <div class="form-group" align="center">
                    <label for="nomPoint" class="mr-sm-2">Vous avez sélectionné le Point suivant : </label><br/>
                    <input type="text" class="mb-2 mr-sm-2 w-100" id="nomPoint" name="nomPoint" value="" readonly></input>
                </div>
                <hr>
                <div class="row" align="center">
                    <div class="col-6 border-right">
                        <h6 class="container text-danger font-weight-bold rounded p-2 my-2">Supprimer Point</h6>
                        <form class="deletePoint" method="post">   
                            <div class="form-group" align="center" hidden>
                                <label for="idPointSupprimer" class="mr-sm-2" hidden>idPoint_RDV : </label><br/>
                                <input type="text" class="mb-2 mr-sm-2" id="idPointSupprimer" name="idPointSupprimer" value="" hidden></input>
                            </div>                        
                            <div>
                                <button type="submit" name="supprimer" class="btn btn-danger">Supprimer</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-6 border-left">
                        <h6 class="container text-success font-weight-bold rounded p-2 my-2">Ajouter Point</h6>
                        <form class="ajouterPoint" method="post">
                            <div class="form-group" align="center">
                                <label for="rangPoint" class="mr-sm-2">Veuillez sélectionner son Rang: </label><br/>
                                <input type="number" class="mb-2 mr-sm-2 w-100" id="rangPoint" name="rangPoint" placeholder="1" value="" required></input>
                            </div>
                            <div class="form-group" align="center" hidden>
                                <label for="idPointAjouter" class="mr-sm-2" hidden>idPoint_RDV : </label><br/>
                                <input type="text" class="mb-2 mr-sm-2" id="idPointAjouter" name="idPointAjouter" value="" hidden></input>
                            </div>
                            <div class="form-group" align="center" hidden>
                                <label for="idLigne" class="mr-sm-2" hidden>idLigne: </label><br/>
                                <input type="text" class="mb-2 mr-sm-2" id="idLigne" name="idLigne" value="<?php echo $idLigne; ?>" hidden></input>
                            </div>
                            <div>
                                <button type="submit" name="ajouter" class="btn btn-success">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>