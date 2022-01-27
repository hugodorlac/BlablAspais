<div class="col-10">
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCy50HWLvCjQGRnwtAkaDqThILv6tT7y3o&v=3.exp&sensor=false&libraries=places'></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script>
function init() {
var input = document.getElementById('locationTextField');
var input2 = document.getElementById('locationTextField2');
var autocomplete = new google.maps.places.Autocomplete(input);
var autocomplete = new google.maps.places.Autocomplete(input2);
}
google.maps.event.addDomListener(window, 'load', init);
</script>
    <div class="col-12">
    <center>
        <div id="ici" class="containerRecherche">
            <div class="btnRecherche">
                <a href="#" style="color: black" class="p-2" id="afficher">Rechercher</a>
                <a href="#" style="color: black" class="p-2" id="fermer">Fermer</a>
            </div>
            </center>
            <form action="./index.php?statut=7" method="post" id="recherche" class="mt-3 form-group recherche col-12">
                Départ :
                <input name="depart" id="locationTextField" placeholder="Ville de départ" type="text" class="form-control">
                Arrivée :
                <input name="arrivee" id="locationTextField2" placeholder="Ville d'arrivée" type="text" class="form-control">
                Date : <br>
                <input type="date" name="date" class="form control">
                <input value="Rechercher" onclick="hiddenContenu()" id="validerRecherche" type="submit" class="float-right btn btn-danger">
            </form>
        </div>
    <div class="row">
    <div id="contenuRecherche" class="col-12">
       

    </div>
    <div id="contenu" class="col-12">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

        <script>
           var btnFermer = document.getElementById('fermer')
           $(btnFermer).hide();
           var btnAfficher = document.getElementById('afficher')
           var blocRecherche = document.getElementById('recherche')
           $(blocRecherche).hide();


           
       $(btnAfficher).click(function(){
            $(blocRecherche).show();
            $(btnFermer).show();
            $(btnAfficher).hide();
        });

        $(btnFermer).click(function(){
            $(blocRecherche).hide();
            $(btnAfficher).show();
            $(btnFermer).hide();
        });  
            

        </script>
        
<?php        
$lp=UserDb::getTrajets($_SESSION['id']);
foreach($lp as $ligne){
    $name = UserDb::getNameUser($ligne['iduser']);
    if($ligne['nbplaceaccept'] != 0)
    {
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
                        <div class='col-4'>
                            <p class='card-text'> Proposer par : ";
                                foreach($name as $ligne2){
                                    echo $ligne2['prenom'];
                                }
                                echo"
                                
                            </p>
                        </div>
                        <div class='col-6'>
                            <p class='card-text'>
                            
                            </p>
                        </div>
                        
                        <div class='col-2'>
                            <a class='btn btn-danger' href='./index.php?ctl=reservation&action=demanderReserver&idTrajet=".$ligne['id']."'>Reserver</a>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>

</div>
        ";
    }
    else {
        echo "
    <div class='mt-3 containerCardG'>
    <div class='card trajetComplet'>
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
                        <div class='col-4'>
                            <p class='card-text'>Proposé par : ";
                                foreach($name as $ligne2){
                                    echo $ligne2['prenom'];
                                }
                                echo"
                                
                            </p>
                        </div>
                        <div class='col-6'>
                            <p class='card-text'>
                            
                            </p>
                        </div>
                        
                        <div class='float-right col-2'>
                            <a href='' class='btn btn-secondary'>Complet</a>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>

</div>
        ";
    }
    
  
}

?>


</div>
</div>
</div>
</div>
