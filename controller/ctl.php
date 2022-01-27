<?php
include './model/dbProduitClass.php'
$action = $_GET['action'];

switch($action) {
      case "creer": 
         include "vue/vueProduit/creer.php";
         break;
      case "base":
         include "vue/contenue.php";
         break;
    
 }

?>