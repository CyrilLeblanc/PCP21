<div class="container">

  <!-- The Modal -->
  <div class="modal fade" id="Classement">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <div class="container p-3 my-3">
            <div class="container">

              <h2>Mes Prochains Covoiturages</h2>

              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Rang</th>
                    <th>Covoitureur</th>
                    <th>Nombres d'alvéoles</th>
                  </tr>
                </thead>

                <tbody>

                <?php

                  $nbRang=1;
                  $sql = "SELECT Nom, Prenom, Nbr_Alveoles FROM Covoitureur ORDER BY Nbr_Alveoles DESC";
                  $res = $GLOBALS['mysqli']->query($sql);

                  while ($row = $res->fetch_assoc())
                  {
                      echo "<tr>
                      <td>".$nbRang."</td>
                      <td>".$row['Nom']." ".$row['Prenom']."</td>
                      <td>".$row['Nbr_Alveoles']."</td>
                      </tr>";
                      $nbRang++;
                  }
                ?>                    
                </tbody>

              </table>

            </div>
          </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        </div>

      </div>
    </div>
  </div>

</div>

