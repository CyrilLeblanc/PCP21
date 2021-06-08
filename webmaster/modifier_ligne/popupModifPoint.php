<?php			
    function addPoint()
    {
        if(isset($_POST['rangPoint']))
        {
            $addPoint = new Ligne();
            $addPoint->add_compo($_POST['idPoint'],$_POST['rangPoint'],$_GET['idLigne']);
            var_dump($addPoint);
            echo 
                '<div class="alert alert-success text-center">
                    <h5><strong>Le Point à bien été ajouté à la Ligne.</strong></h5>
                </div>';
        }
    }
    function deletePoint()
    {
        if(isset($_POST['delete']))
        {
            $delPoint = new Ligne();
            $delPoint->delete_compo($_GET['idLigne'],$_POST['idPoint']);
            var_dump($delPoint);
            echo 
                '<div class="alert alert-danger text-center">
                    <h5><strong>Le Point à bien été supprimé de la Ligne.</strong></h5>
                </div>';
            
        }
    }
?>

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
                <div class="row">
                    <div class="col-6 border-right">
                        <h6 class="container text-danger font-weight-bold rounded p-2 my-2">Supprimer Point</h6>
                        <form class="deletePoint" method="post">                           
                            <div>
                                <button type="submit" name="delete" class="btn btn-danger">Supprimer</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-6 border-left">
                        <h6 class="container text-success font-weight-bold rounded p-2 my-2">Ajouter Point</h6>
                        <form class="ajouterPoint" method="post">
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
                            <div>
                                <button type="submit" name="add" class="btn btn-success">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                    if(isset($_POST['add']))
                    {
                        addPoint();
                    }
                    if(isset($_POST['delete']))
                    {
                        deletePoint();
                    }
                ?>
            </div>
        </div>
    </div>
</div>