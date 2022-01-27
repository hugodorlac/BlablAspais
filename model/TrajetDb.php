<?php
include 'connectPdo.php';
class TrajetDb
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
    public static function getTrajets()
    {
        $sql = "SELECT * FROM `trajet`";
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
}