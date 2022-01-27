
<div class="col-10 containerGeVehicule">
    <div class="p-3 col-12">
        <div class="col-12">
	<form action="./index.php?ctl=vehicule&action=validerVehicule" method="post">
    <div class="form-group">
    <label for="exampleInputEmail1">Marque de votre vehicule</label>
    <input type="text" class="form-control"  name="marque" placeholder="Renault">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Model de votre vehicule</label>
    <input type="text" class="form-control" name="modele" placeholder="Clio 4">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Immatriculation</label>
    <input type="text" class="form-control" name="immatriculation" placeholder="AB-123-CD 75">
  </div>
  <input type="submit" class=" btn btn-danger" name="valider" value="Ajouter">
    </form>
    </div>
    </div>
    <div class="btnVehicule col-12"></div>
    <div class="row">
    <?php
        $vehicule = UserDb::getMesVehicule($_SESSION['id']);

        foreach($vehicule as $ligne)
        {
            echo"
            <div class='containerVehicule'>
            <div class='row'>
            <div class='row col-12'>
            <div class='cardVehicule' style='width: 18rem;'>
            <i align='center' class='imgVehicule card-img-top fas fa-5x fa-car'></i>
            <div class='card-body'>
                <h5 class='card-title'>".$ligne['modele']."</h5>
                <p class='card-text'>".$ligne['marque']."</p>
                <p class='card-text'>".$ligne['immatriculation']."</p>
                <button onclick='supprimerVehicule()' class='btn btn-danger'>Supprimer</button>

            </div>
        </div>
            </div>
            </div>
            </div>
            <script>
            function supprimerVehicule () {
              swal({
                title: 'Etes-vous sûr ?',
                text: 'Voulez-vous supprimer ce vehicule ?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                  swal('Vehicule supprimée !', {
                  icon: 'success',
                  });
                document.location.href='./index.php?ctl=vehicule&action=supprimerVehicule&id=".$ligne['id']."';
                } else {
                  swal('Action annulée', {
                    icon :'info',
                  });
                }
                });
            }
            </script>
            ";
        }

    ?>


    
  
</div>
</html>