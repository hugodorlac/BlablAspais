<?php
$action = $_GET['action'];
$idTrajet = $_GET['idTrajet'];
$idDemande = $_GET['idDemande'];
$depart = $_POST['depart'];
switch($action) {
    case 'demanderReserver':
        $userId = UserDb::getUserIdTrajet($idTrajet);
       
foreach($userId as $ligne){
    
    UserDb::demande($idTrajet, $_SESSION['id']); 

}
        header('Location: index.php?statut=3');
        break;

    case'accepter':
        UserDb::accepterDemande($idDemande);
        $id = UserDb::getIdTrajet($idDemande);
        foreach($id as $ligne) {
            $result = $ligne['idTrajet'];
            UserDb::SetNbPlace($result);
        }
        
        header('Location: index.php?statut=3');
    break;

    case'refuser':
        UserDb::refuserDemande($idDemande);
        header('Location: index.php?statut=3');
    break;

    case'adminViderDemande':
        UserDb::adminViderDemande();
        header('Location: admin.php?stat=OK');
    break;
        
}