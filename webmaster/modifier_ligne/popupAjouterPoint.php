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

            <div class="container border rounded shadow">

            <!-- TABLE -->
            <div class="container overflow-auto" style="font-size: 12px; height: 450px;">
            <table class="table">


                <!-- TABLE Header -->
                <thead align="center">
                <tr>
                    <th>Nom</th>
                    <th>Coordonnées</th>
                    <th>Ajouter</th>
                </tr>
                </thead>


                <!-- TABLE Body -->
                <tbody align="center" style="height: 100px; overflow: auto;">
                
                    <?php
                        $Point = new Point();
                        $table = $Point -> get_Point(True);

                        foreach($table as $value)
                        {
                            echo 
                                '<tr> 
                                    <td>
                                        <div style="padding-top: 1em; padding-bottom: 1em;">
                                            ' . $value["Nom"] . ' </div></td>

                                    <td>
                                        <div style="padding-top: 1em; padding-bottom: 1em;">
                                            <a href="https://www.google.com/maps/place/' . $value["Latitude"] . ',' . $value["Longitude"] . '" onclick="window.open(this.href); return false;"" 
                                                style="font-weight: bold; color: green;">' . $value["Latitude"] . '<br/>' . $value["Longitude"] . ' </a></div></td>

                                    <td> 
                                        <div style="padding-top: 0.5em; padding-bottom: 0.5em;">
                                            <button class="btn material-icons bg-success" style="color: white; font-size: 200%;">&#xe148;</button></div></td>
                                        
                                        <input value="' . $value["idPoint_RDV"] . '" id="idPoint_RDV" hidden></input>
                                </tr>';
                        }
                    ?>

                </tbody>
            </table>
            </div>

            <!-- POPUP footer -->
            <div class="modal-footer justify-content-center">
                <button type="submit" name="submit" class="btn btn-success">Ajouter</button>
            </div>
        </form>
    </div>
    </div>
</div>
</div>