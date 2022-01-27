<?php
$action = $_GET['action'];
switch($action) {
    case 'validerVehicule':
        if (isset($_POST['valider'])) {

            $marque=$_POST['marque'];
            $modele=$_POST['modele'];
            $immat=$_POST['immatriculation'];
            $idUtilisateur = $_SESSION['id'];

            $vehicule = UserDb::AjouterVehicule($marque,$modele,$immat,$idUtilisateur);
            header("Location: ./index.php?statut=4");
        }
    break;
    case 'supprimerVehicule':
            $idVehicule = $_GET['id'];

            $vehicule = UserDb::supprimerVehicule($idVehicule);
            header("Location: ./index.php?statut=4");
}
?>