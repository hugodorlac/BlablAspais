<?php
class VehiculeDb
{
    public static function AjouterVehicule($marque,$modele,$immat,$idUtilisateur)
    {
     $sql = "INSERT INTO `covoit`.`vehicule` (`idV`, `marque`, `modele`, `immatriculation`, `idU`) VALUES (NULL, '$marque', '$modele', '$immat', '$idUtilisateur')";
        $objResultat = dbPdo::getPdo()->query($sql);
        $result = $objResultat->fetchAll();
        
     
    }
}
?>