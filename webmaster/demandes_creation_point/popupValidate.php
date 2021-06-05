<?php 
    function validerPoint()
    {
        $validerPoint = new Point();
        $validerPoint->validate_Point($_POST['idPoint']);
    }
    function refuserPoint()
    {
        $refuserPoint = new Point();
        $refuserPoint->del_Point($_POST['idPoint']);
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

                <form method="post">

                    <div class='alert text-center'>
                        <h5>Voulez-vous accepter ou refuser le nouveau Point de RDV ?</h5>
                        <?php
                            '<button class="btn material-icons container bg-success p-2 my-2 w-75 rounded" style="color: white; font-size: 200%;" id="Accepter"
                            onclick="idPoint()" id="Valider" name="Valider">&#xe92d;</button>
                            <button class="btn material-icons container bg-danger p-2 my-2 w-75 rounded" style="color: white; font-size: 200%;" id="Refuser"
                            onclick="idPoint()" id="Refuser" name="Refuser">&#xe888;</button>
                            <input id="idPoint" name="idPoint" value="" hidden></input>';
                        ?>
                    </div>

                    <?php
                        if(isset($_POST['Valider']))
                        {
                            validerPoint();
                        }
                        elseif(isset($_POST['Refuser']))
                        {
                            refuserPoint();
                        }
                    ?>

                </form>
                    
            </div>
        </div>
    </div>
</div>