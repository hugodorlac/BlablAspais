
<div class="col-10">
    <div class="col-12">
    <div class="row">
    
<?php        
$lp=UserDb::getMessTrajets($_SESSION['id']);

foreach($lp as $ligne){
    echo "
    <div class='mt-3 containerCardG'>
    <div class='card trajet'>
        <div class='row'>
            <div class='col-2 imgCard'>
                <i align='center' class='col-12 icoCard fas fa-5x fa-map-marked-alt'></i>
            </div>

        <div class='col-10'>
            <div class='card-body'>
                <div class='blocHautTrajet col-12'>
                    <div class='row'>
                        <div class='col-2'>
                            <p class='card-text'>".$ligne['DateDépart']."</p>
                            <p class='card-text'><b>".$ligne['HeureDépart']."</b></p>
                        </div>
                        <div class='col-2'>
                            <p class='card-text'>".$ligne['LieuDépart']."</p>
                        </div>
                        <div class='col-2 trait'>
                            <img class='imgTrait' src='./vue/img/trait4.png'>
                        </div>
                        <div class='col-2'>
                            <p class='card-text'>".$ligne['LieuArrivé']."</p>
                        </div>
                        <div class='col-2'>
                            <p class='card-text'>Places : ".$ligne['nbplaceaccept']."</p>
                        </div>
                    </div>
                </div>
                <div class='col-12 blocBasTrajet'>
                    <div class='row'>
                        <div class='col-10'>
                            <p class='card-text'>
                                 
                            </p>
                        </div>
                        <div class='col-2'>
                            <button class='btn btn-danger' onclick='supprimerTrajets()'>Annuler</button>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<script>
    function supprimerTrajets () {
        swal({
            title: 'Etes-vous sûr ?',
            text: 'Voulez-vous annuler ce trajet ?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal('Trajet annulé !', {
                icon: 'success',
                });
            document.location.href='./index.php?ctl=trajet&action=annuler&idTrajet=".$ligne['id']."';
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

/* <p class='card-text txtCard'><b>Date : </b>".$ligne['DateDépart']." </p>
            <p class='card-text txtCard'><b>Heure de départ : </b>".$ligne['HeureDépart']." </p>
            <p class='card-text txtCard'><b>Nombre de place disponible : </b>".$ligne['nbplaceaccept']." </p><br>
            <a href='#' class='btn btn-primary'>Reserver</a> */
            
            
/* .$nameConducteur = UserDb::getNameUser($ligne['iduser']);

    foreach($nameConducteur as $ligne2)
    {
        echo $ligne2['prenom'];
    } */

?>

</div>
</div>
</div>

