<?php
session_start();
error_reporting(0);
include './model/UserDb.php';  
$statut = $_GET['statut'];

if(isset($_SESSION['connect'])) {
    $admin = UserDb::admin($_SESSION['id']);
			foreach($admin as $ligne)
			{
				if($ligne['droit'] == 1)
				{
					include 'vue/entete.php';
   include 'vue/menu.php';
   
   if($statut == NULL){
      include 'vue/contenueAdmin.php';
   }
   if($statut == 8){
      include 'vue/vueAdmin/ajouterUser.php';
   }
   if($statut == 9){
      include './bloquerTrajetSansVehicule.php';
   }

}

}
   
   
   
}

if(isset($_GET['ctl'])){
   switch($_GET['ctl']){
      case'admin':
         include 'controller/ctlAdmin.php';
      break;


   }
}


if(!isset($_SESSION['connect'])){
   include 'vue/vueProduit/connexion.php';
}
?>



