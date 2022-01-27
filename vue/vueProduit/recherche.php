<div class="col-10">
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCy50HWLvCjQGRnwtAkaDqThILv6tT7y3o&v=3.exp&sensor=false&libraries=places'></script>
    
    <div class="row">
    <div id="contenuRecherche" class="col-12">
        <?php
        
        $_POST['date'] = (strftime("%Y/%m/%d"));
        $date = $_POST['date'];
        var_dump($date);

        if(isset($_POST['depart'])){
            $depart = $_POST['depart'];
            if(isset($_POST['arrivee'])){
    
                $arrivee = $_POST['arrivee'];
                $recherche = UserDb::getTrajetsRechercheDepartAndArrivee($depart, $arrivee, $date);
                $verif = UserDb::verifRecherche($depart, $arrivee);
            }
        }
        
        echo"
        <div class='row'>
            <div class='col-2'>
                <a href='./index.php?statut=2' class='mt-2 btn btn-danger'>Retour</a>
            </div>
            <div class='col-8'>
                <h4 class='p-2' align='center'>".$depart." - ".$arrivee."</h4>
            </div>
        </div>"
        ;
        if($verif == false){
            echo"
            <div class='col-10 containerRechercheFalse'>
            <div class='row'>
            <div class='col-5'></div>
                <div class='trajetIntrouvable col-5'>
                        <center>
                        <span style='font-size: 4em;'>
                        <i class='fas fa-times'></i>
                        </span>
                        <div>
                        <h5>Nous n'avons trouvé aucun trajet correspondant à ces informations</h5> 
                        </div>
                    </center>
                </div>
                </div>
                </div>
            ";
        }
        else {
            foreach($recherche as $resultRecherche){
                if($resultRecherche['nbplaceaccept'] != 0){
                    $name = UserDb::getNameUser($resultRecherche['iduser']);
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
                                <p class='card-text'>".$resultRecherche['DateDépart']."</p>
                                <p class='card-text'><b>".$resultRecherche['HeureDépart']."</b></p>
                            </div>
                            <div class='col-2'>
                                <p class='card-text'>".$resultRecherche['LieuDépart']."</p>
                            </div>
                            <div class='col-2 trait'>
                                <img class='imgTrait' src='./vue/img/trait4.png'>
                            </div>
                            <div class='col-2'>
                                <p class='card-text'>".$resultRecherche['LieuArrivé']."</p>
                            </div>
                            <div class='col-2'>
                                <p class='card-text'>Places : ".$resultRecherche['nbplaceaccept']."</p>
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
                                <a class='btn btn-danger' href='./index.php?ctl=reservation&action=demanderReserver&idTrajet=".$resultRecherche['id']."'>Reserver</a>
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
            $name = UserDb::getNameUser($resultRecherche['iduser']);
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
                                <p class='card-text'>".$resultRecherche['DateDépart']."</p>
                                <p class='card-text'><b>".$resultRecherche['HeureDépart']."</b></p>
                            </div>
                            <div class='col-2'>
                                <p class='card-text'>".$resultRecherche['LieuDépart']."</p>
                            </div>
                            <div class='col-2 trait'>
                                <img class='imgTrait' src='./vue/img/trait4.png'>
                            </div>
                            <div class='col-2'>
                                <p class='card-text'>".$resultRecherche['LieuArrivé']."</p>
                            </div>
                            <div class='col-2'>
                                <p class='card-text'>Places : ".$resultRecherche['nbplaceaccept']."</p>
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
        }
       

        ?>

   