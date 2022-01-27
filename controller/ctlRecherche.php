<?php

if(!isset($_SESSION['id'])){
    include './model/UserDb.php';
}

$action = $_GET['action'];
switch($action) {
    case 'rechercheTrajet':

            $result = UserDb::getTrajetsRechercheDepart($_SESSION['id'], $_POST['depart']);
            
            foreach($result as $ligne){
                    echo "
                    <div class='containerCardG'>
                    <div class='card'>
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
        

}