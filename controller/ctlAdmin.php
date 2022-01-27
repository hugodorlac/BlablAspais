<?php
$action = $_GET['action'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
switch($action) {
    case 'ajouter':
        UserDb::adminAjouter($nom, $prenom, $mail, $mdp);
        header("Location: ./admin.php?statut=8");
    
    case 'removeDemande':
        $idTrajet=$_GET['idTrajet'];
         UserDb::removeDemande($idTrajet);
         header("Location: ./index.php?statut=3");
    break;
    
    case'adminViderTrajet':
        UserDb::adminViderTrajet();
        header('Location: admin.php?stat=OK');
        
    break;
}
?>