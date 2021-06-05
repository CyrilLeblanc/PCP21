<?php 
    function validerPoint()
    {
        $Point->validate_Point($value['idPoint_RDV']);
    }
    function refuserPoint()
    {
        $Point->del_Point($value['idPoint_RDV']);
    }
?>

<!-- POPUP -->
<div class="modal fade" id="popupValidate">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">


            <!-- POPUP Header -->
            <div class="modal-header">
                <h4 class="modal-title">Validation Point de RDV</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>


            <!-- POPUP body -->
            <div class="modal-body">

                    <div class='alert text-center'>
                        <h5>Voulez-vous accepter ou refuser le nouveau Point de RDV ?</h5>
                            <button class="btn material-icons container bg-success p-2 my-2 w-75 rounded" style="color: white; font-size: 200%;" id="Accepter"
                            data-toggle="modal" data-target="#popupValide" name="Valider">&#xe92d;</button>
                            <button class="btn material-icons container bg-danger p-2 my-2 w-75 rounded" style="color: white; font-size: 200%;" id="Refuser"
                            data-toggle="modal" data-target="#popupRefuse" name="Refuser">&#xe888;</button>
                    </div>
            </div>
        </div>
    </div>
</div>