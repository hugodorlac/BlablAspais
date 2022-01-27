<?php
include 'connectPdo.php';
class UserDb
{
    public static function getLoginUser($login, $mdp)
    {
        $login = addslashes($login);
        $mdp = addslashes($mdp);
        $sql = "SELECT * FROM `utilisateur` WHERE email = '$login' and mdp = '$mdp'";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetch();
        return $result;
    }
    public static function getNameUser($idUser)
    {
        $sql = "SELECT prenom FROM `utilisateur` WHERE id = '$idUser'";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function getTrajets($iduser)
    {
        $sql = "SELECT * FROM `trajet` WHERE DateDépart > NOW()";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function getTrajetsRechercheDepartAndArrivee($depart, $arrivee, $date = null)
    {
        if($date == NULL){
            $sql = "SELECT * FROM `trajet` WHERE LieuDépart = '$depart' AND LieuArrivé = '$arrivee' AND DateDépart > NOW();";
            $objResultat = dbPdo::getPdo()->query($sql);
            $result = $objResultat->fetchAll();
            return $result;
        }
        else{
            $sql = "SELECT * FROM `trajet` WHERE LieuDépart = '$depart' AND LieuArrivé = '$arrivee' AND DateDépart = '$date';";
            $objResultat = dbPdo::getPdo()->query($sql);
            $result = $objResultat->fetchAll();
            return $result;
        }
    }
    public static function verifRecherche($depart, $arrivee)
    {
        $sql = "SELECT * FROM `trajet` WHERE LieuDépart = '$depart' AND LieuArrivé = '$arrivee' AND DateDépart > NOW() IS NOT NULL;";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function getUserIdTrajet($id)
    {
        $sql = "SELECT iduser FROM `trajet` WHERE id = '$id'";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function SetNbPlace($id)
    {
        $sql = "UPDATE trajet SET nbplaceaccept = nbplaceaccept - 1 WHERE id = '$id';";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function getIdTrajet($idDemande)
    {
        $sql = "SELECT idTrajet FROM demande WHERE id = '$idDemande';";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function demande($idTrajet, $idUser)
    {
        $sql = "INSERT INTO demande VALUES(NULL, '$idTrajet', '$idUser', 'en attente', 1);";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function AfficherMesDemandes($idUser)
    {
        $sql = "SELECT * FROM trajet INNER JOIN demande ON trajet.id = demande.idTrajet AND demande.idUser='$idUser' AND demande.notif = 1;";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function AfficherMeTrajets($iduser)
    {
        $sql = "SELECT * FROM trajet INNER JOIN demande ON trajet.id = demande.idTrajet AND trajet.iduser='$iduser'AND demande.statut = 'en attente';";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function getDemande($idTrajet)
    {
        $sql = "SELECT * FROM demande WHERE idTrajet = '$idTrajet'";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }

    public static function CountDemande($iduser)
    {
        $sql = "SELECT COUNT(*) FROM trajet INNER JOIN demande ON trajet.id = demande.idTrajet AND trajet.iduser='$iduser' AND demande.statut = 'en attente';";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function accepterDemande($idDemande)
    {
        $sql = "UPDATE `demande` SET `statut` = 'Acceptée' WHERE `id` = '$idDemande';";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function refuserDemande($idDemande)
    {
        $sql = "UPDATE `demande` SET `statut` = 'Refusée' WHERE `id` = '$idDemande';";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function AjouterVehicule($marque,$modele,$immat,$idUtilisateur)
    {
        $sql = "INSERT INTO `covoit`.`vehicule` (`id`, `marque`, `modele`, `immatriculation`, `iduser`) VALUES (NULL, '$marque', '$modele', '$immat', '$idUtilisateur');";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
    }
    public static function getMesVehicule($iduser)
    {
        $sql = "SELECT * FROM `vehicule` WHERE iduser = '$iduser';";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function verifMesVehicule($iduser)
    {
        $sql = "SELECT * FROM `vehicule` WHERE iduser = '$iduser';";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function supprimerVehicule($idVehicule)
    {
        $sql = "DELETE FROM `vehicule` WHERE `vehicule`.`id` = '$idVehicule';";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
    }
    public static function creerTrajet($date, $heure, $lieuDepart, $lieuArrive, $nbplace, $iduser, $idVehicule)
    {
        $sql = "INSERT INTO `trajet` (`id`, `DateDépart`, `HeureDépart`, `LieuDépart`, `LieuArrivé`, `nbplacepropose`, `nbplaceaccept`, `iduser`, `idvehicule`) VALUES (NULL, '$date', '$heure', '$lieuDepart', '$lieuArrive', '$nbplace', '$nbplace', '$iduser', '$idVehicule');";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        header('Location: index.php?statut=1');
    }
    public static function annuleTrajet($id)
    {
        $sql = "DELETE FROM trajet where id = '$id'";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
    }
    public static function getMessTrajets($iduser)
    {
        $sql = "SELECT * FROM trajet demande WHERE iduser = $iduser;";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function removeDemande($idTrajet)
    {
        $sql = "DELETE FROM demande WHERE id = '$idTrajet';";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function getStatutDemande($idDemande)
    {
        $sql = "DELETE FROM demande WHERE id = '$idTrajet';";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function SetNbPlacePlus($idTrajet)
    {
        $sql = "UPDATE trajet SET nbplaceaccept = nbplaceaccept + 1 WHERE id = '$idTrajet';";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function newUser($iduser)
    {
        $sql = "SELECT newUser FROM utilisateur WHERE id = '$iduser';";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function firstConnect($iduser)
    {
        $sql = "UPDATE utilisateur SET newUser = 0 WHERE id = '$iduser';";
        $objResultat = dbPdo::getPdo()->query($sql);
        return $result;
    }
    public static function tuto($iduser)
    {
        $sql = "UPDATE utilisateur SET newUser = 1 WHERE id = '$iduser';";
        $objResultat = dbPdo::getPdo()->query($sql);
        return $result;
    }
    public static function admin($iduser)
    {
        $sql = "SELECT droit FROM utilisateur WHERE id = '$iduser';";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
    public static function adminViderDemande()
    {
        $sql = "DELETE FROM `demande`;";
        $objResultat = dbPdo::getPdo()->query($sql);
    }
    public static function adminViderTrajet()
    {
        $sql = "DELETE FROM `trajet`;";
        $objResultat = dbPdo::getPdo()->query($sql);
    }
    public static function adminAjouter($nom, $prenom, $mail, $mdp)
    {
        $sql = "INSERT INTO `utilisateur` VALUES (NULL, '$nom', '$prenom', '$mail', '$mdp', '11', '0', '1');";
        $objResultat = dbPdo::getPdo()->query($sql);
    }
    

    

    


}


