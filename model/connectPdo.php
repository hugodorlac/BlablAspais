<?php

class dbPdo
{
    private static $objPdo;
    private function __construct() {}
    static function getPdo(){
        self::$objPdo = new PDO ('mysql:Host=localhost;dbname=covoit', 'root');
        self::$objPdo->query('SET NAMES utf8');
        self::$objPdo->query('SET CHARACTER SET utf8');
        return self::$objPdo;
    }
    
}
?>

<!-- <php
include "./model/connectPdo.php";	
$sql = "select * from np ";		
$objResultat = $pdoConnect->query($sql);	
$tabResultat = $objResultat->fetchAll();
?> -->