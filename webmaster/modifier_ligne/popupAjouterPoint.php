<?php			
    function submitPoint()
    {
        if(isset($_POST['rangPoint']))
        {
            $Ajouter_Point = new Ligne();
            $Ajouter_Point->add_compo($_POST['idPoint'],$_POST['rangPoint'],$_GET['idLigne']);
            var_dump($Ajouter_Point);
        }
    }
?>

<!-- POPUP -->
<div class="modal fade" id="popupAjouterPoint">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- POPUP Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ajouter Point Ligne</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>


            <!-- POPUP body -->
            <div class="modal-body">
                <form class="ajouterPoint" method="post">
                    <div class="form-group" align="center">
                        <label for="nomPoint" class="mr-sm-2">Vous avez sélectionné le Point suivant : </label><br/>
                        <input type="text" class="mb-2 mr-sm-2 w-100" id="nomPoint" name="nomPoint" value="" readonly></input>
                    </div>
                    <div class="form-group" align="center">
                        <label for="rangPoint" class="mr-sm-2">Veuillez sélectionner son Rang: </label><br/>
                        <input type="number" class="mb-2 mr-sm-2 w-100" id="rangPoint" name="rangPoint" placeholder="1" value=""></input>
                    </div>
                    <div class="form-group" align="center" hidden>
                        <label for="idPoint" class="mr-sm-2" hidden>idPoint_RDV : </label><br/>
                        <input type="text" class="mb-2 mr-sm-2" id="idPoint" name="idPoint" value="" hidden></input>
                    </div>
                    <div class="form-group" align="center" hidden>
                        <label for="idLigne" class="mr-sm-2" hidden>idLigne: </label><br/>
                        <input type="text" class="mb-2 mr-sm-2" id="idLigne" name="idLigne" value="<?php echo $idLigne ?>" hidden></input>
                    </div>

                    <!-- POPUP footer -->
                    <div class="modal-footer justify-content-center">
                        <button type="submit" name="submit" class="btn btn-success">Ajouter</button>
                    </div>

                    <?php
                        if(isset($_POST['submit']))
                        {
                            submitPoint();
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>