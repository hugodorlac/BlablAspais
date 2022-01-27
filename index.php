
<?php
session_start();
include './model/UserDb.php';
/* error_reporting(0); */

$statut = $_GET['statut'];

if (isset($_SESSION['connect'])) {
   include 'vue/entete.php';
   include 'vue/menu.php';
   
   if ($statut == NULL) {
      include 'vue/contenue.php';
   }
   
   if ($statut == 1) {
      include 'vue/vueProduit/creer.php';
   }
   if ($statut == 2) {
      include 'vue/vueProduit/trouver.php';
   }
   if ($statut == 3) {
      include 'vue/vueProduit/activite.php';
   }
   if ($statut == 4) {
      include 'vue/vueProduit/vehicle.php';
   }
   if ($statut == 5) {
      include 'vue/vueProduit/gestion.php';
   }
   if ($statut == 6) {
      include './test.php';
   }
   if ($statut == 7) {
      include 'vue/vueProduit/recherche.php';
   }
}



if (isset($_GET['ctl'])) {
   switch ($_GET['ctl']) {
      case 'connect':
         include 'controller/ctlConnect.php';
         break;
      case 'page':
         include 'controller/ctlPage.php';
         break;
      case 'reservation':
         include 'controller/ctlReservation.php';
         break;
      case 'recherche':
         include 'controller/ctlRecherche.php';
         break;
      case 'vehicule':
         include 'controller/ctlVehicule.php';
         break;
      case 'trajet':
         include 'controller/ctlTrajet.php';
         break;
      case 'admin':
         include 'controller/ctlAdmin.php';
         break;
   }
}


if (!isset($_SESSION['connect'])) {
   include 'vue/vueProduit/connexion.php';
}
?>



