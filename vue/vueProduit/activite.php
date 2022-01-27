<div class="col-10">
<div class="row">
<div class="mesDemandes col-6">
<div class="col-12 p-3">
    <h3 class="titre" align="center">Les demandes sur mes trajets</h3>
    <?php
        $mesTrajets=UserDb::AfficherMeTrajets($_SESSION['id']);
        


foreach($mesTrajets as $tab){
    $getDemande=UserDb::getDemande($tab['idTrajet']);
    echo "
    <div class='containerCardG'>
    <div class='card trajet'>
        <div class='col-12'>
            <div class='card-body'>
                <div class='blocHautTrajet col-12'>
                    <div class='row'>
                        <div class='col-3'>
                            <p class='card-text'>".$tab['DateDépart']."</p>
                            <p class='card-text'><b>".$tab['HeureDépart']."</b></p>
                        </div>
                        <div class='col-3'>
                            <p class='card-text'>".$tab['LieuDépart']."</p>
                        </div>
                        <div class='col-3 trait'>
                            <img class='imgTrait' src='./vue/img/trait4.png'>
                        </div>
                        <div class='col-3'>
                            <p class='card-text'>".$tab['LieuArrivé']."</p>
                        </div>
                    </div>
                </div>
                <div class='col-12 blocBasTrajet'>
                   <div class='row'>
                        <div class='col-7'>
                            <p class='card-text'>Demander par : ";
                                foreach($getDemande as $ligne){
                                    $name = UserDb::getNameUser($ligne['idUser']);
                                    foreach($name as $ligne2){
                                       echo $ligne2['prenom'];
                                    }
                                }
                            echo"
                            </p>
                        </div>
                        <div class='col-5'>
                        <a class='btn btn-danger' href='./index.php?ctl=reservation&action=accepter&idDemande=".$tab['id']."&idTrajet=".$tab['LieuArrivé']."' role='button'>Accepter</a>
                        <a class='btn btn-danger' href='./index.php?ctl=reservation&action=refuser&idDemande=".$tab['id']."' role='button'>Refuser</a>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
</div>

</div>
        ";
  
}
    ?>
</div>

</div>
<div class="demandeAutres col-6">
<div class="col-12 p-3">
    <h3 class="titre" align="center">Mes demandes</h3>
    <?php
        $lp=UserDb::AfficherMesDemandes($_SESSION['id']);


foreach($lp as $ligne){
    echo "
    <div class='containerCardG'>
    <div class='card trajet'>
        <div class='col-12'>
            <div class='card-body'>
                <div class='blocHautTrajet col-12'>
                    <div class='row'>
                        <div class='col-3'>
                            <p class='card-text'>".$ligne['DateDépart'] ."</p>
                            <p class='card-text'><b>".$ligne['HeureDépart']."</b></p>
                        </div>
                        <div class='col-3'>
                            <p class='card-text'>".$ligne['LieuDépart']."</p>
                        </div>
                        <div class='col-3 trait'>
                        <img class='imgTrait' src='./vue/img/trait4.png'>
                        </div>
                        <div class='col-3'>
                            <p class='card-text'>".$ligne['LieuArrivé']."</p>
                        </div>
                    </div>
                </div>
                <div class='col-12 blocBasTrajet'>
                   <div class='row'>
                    
                        <div class='col-9'>

                        ";
                        if($ligne['statut'] == 'Acceptée'){
                            echo"    
                            <button class='btnRemoveDemande btn btn-danger' onclick='removeDemande()'><i class='far fa-trash-alt'></i></button>
                            ";
                        }
                        echo"
                        </div>
                        <div class='col-3'>
                            <h6>Statut : ".$ligne['statut']." </h6>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
</div>

</div>
<script>
    function removeDemande () {
        swal({
            title: 'Etes-vous sûr ?',
            text: 'Voulez-vous annuler votre place pour ce trajet ?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal('Les demandes ont été supprimer !', {
                icon: 'success',
                });
            document.location.href='./index.php?ctl=trajet&action=removeDemande&idDemande=".$ligne['id']."';
            } else {
                swal('Action annulée', {
                    icon :'info',
                });
            }
            });
    }
</script>";
  
}

    ?>
</div>
</div>
</div>
</div>
    
