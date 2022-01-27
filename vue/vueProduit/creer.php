

      
    <?php
        $vehicule = UserDb::getMesVehicule($_SESSION['id']);
        $vehiculeR = UserDb::verifMesVehicule($_SESSION['id']);
        
        if($vehiculeR != NULL)
            {
              foreach($vehicule as $ligne)
              {
                    echo"
                    <div class='col-10 containerCreer'>
                    <form class='creerTrajet' action='./index.php?ctl=trajet&action=cree' method='POST' onsubmit='return verifierChamps()'>
                      <div class='form-row'>
                        <div class='col'>
                        <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCy50HWLvCjQGRnwtAkaDqThILv6tT7y3o&v=3.exp&sensor=false&libraries=places'></script>
                          <input type='text' class='form-control' id='locationTextField' name='lieuDepart' placeholder='Adresse de départ' required>
                          <script>
                          function init() {
                          var input = document.getElementById('locationTextField');
                          var autocomplete = new google.maps.places.Autocomplete(input);
                          }
                          google.maps.event.addDomListener(window, 'load', init);
                          </script>
                        </div>
                        <div class='col'>
                        <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCy50HWLvCjQGRnwtAkaDqThILv6tT7y3o&v=3.exp&sensor=false&libraries=places'></script>
                          <input type='text' class='form-control' id='locationTextField2' name='lieuArrive' placeholder='Adresse d arrivée' required>
                          <script>
                          function init() {
                          var input = document.getElementById('locationTextField2');
                          var autocomplete = new google.maps.places.Autocomplete(input);
                          }
                          google.maps.event.addDomListener(window, 'load', init);
                          </script>
                        </div>
                      </div>
                      <br>
                      <div class='form-row'>
                        <div class='col'>
                          <input type='time' class='form-control' id='verif2' name='heure' placeholder='First name' required>
                        </div>
                        <div class='col'>
                          <input type='date' class='form-control' id='verif3' name='date' placeholder='Last name' required>
                        </div>
                        <div class='col'>
                          <input type='number' class='form-control' id='verif4' name='nbplace' placeholder='Nombre de place proposé' required>
                        </div>
                      </div>
                      <br>
                      <div class='row'>
                  <div class='containerVehicule'>
                  <div class='row'>
                  <div class='row col-12'>
                  <div class='cardVehicule' style='width: 15rem;'>
                  <i align='center' class='imgVehicule card-img-top fas fa-5x fa-car'></i>
                  <div class='card-body'>
                      <h5 class='card-title'>".$ligne['modele']."</h5>
                      <p class='card-text'>".$ligne['marque']."</p>
                      <p class='card-text'>".$ligne['immatriculation']."</p>
                      <input required type='radio' id='verif5' name='idVehicule' value='".$ligne['id']."'>
                      <label for='huey'>Séléctionner</label>
                  </div>
              </div>
                  </div>
                  
                  </div>
                  </div>
                  </div>
                  <button onclick='notification()' type='submit' class='btn btn-danger float-right'>valider</button>
                  ";
                  }
          }
        
            else{
              echo"
              <div class='containerCardInfo col-10'>
              <div class='cardInfo col-5'>
                  <div align='center'>
                      <h3 class='mb-4'>Ajoutez un vehicule<h3>  
                      <img class='mb-3 imgVoitureCree' width='300' src='https://acegif.com/wp-content/gifs/car-driving-61.gif'/><br>
                      <a href='./index.php?statut=4' class='btn btn-danger'>Ajouter</a>
          
                  </div>
              </div>
              ";
            }
        
      

    ?>
    </div>
  </form>
</div>


    

</div>
</html>