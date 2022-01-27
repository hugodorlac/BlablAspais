<?php
$action = $_GET['action'];
switch($action) {
    case 'cree':
            $date = date('Y-m-d', strtotime($_POST['date']));
            $heure=$_POST['heure'];
            $lieuDepart=$_POST['lieuDepart'];
            $lieuArrive=$_POST['lieuArrive'];
            $nbplace = $_POST['nbplace'];
            $iduser = $_SESSION['id'];
            $idVehicule = $_POST['idVehicule'];
            
            header("Location: ./index.php?statut=1");
            $vehicule = UserDb::creerTrajet($date, $heure, $lieuDepart, $lieuArrive, $nbplace, $iduser, $idVehicule);
    
    case 'annuler':
        $idTrajet=$_GET['idTrajet'];
         UserDb::annuleTrajet($idTrajet);
         header("Location: ./index.php?statut=5");
    
    case 'removeDemande':
        $idDemande=$_GET['idDemande'];
         $idTrajet = UserDb::getIdTrajet($idDemande);
         foreach($idTrajet as $ligne){
            UserDb::SetNbPlacePlus($ligne['idTrajet']);
         }
        UserDb::removeDemande($idDemande);
    break;
    
    case'adminViderTrajet':
        UserDb::adminViderTrajet();
        header('Location: admin.php?stat=OK');
    break;
}
?>