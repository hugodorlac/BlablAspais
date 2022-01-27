<?php
	
?>

<header>
	
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;1,400&display=swap" rel="stylesheet">
	<link href="./vue/css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	

<script src="https://kit.fontawesome.com/ec9c877156.js" crossorigin="anonymous"></script>
</head>
<div class="container-fluid">
<div class="row">
	<div class="entete2 col-md-2">
			<center>
			<a href="./index.php?t=1"><img src="vue/img/logo2.png"></a>
		</center>
		</div>
<div class="col-10 entete bouge">
		
	<figure class="text-center">
	  <blockquote class="blockquote">
	  <?php
		$na = UserDb::getNameUser($_SESSION['id']);
		
		foreach($na as $array)
		{
			echo "
			<h3>Bienvenue ".$array['prenom']."</h3>";
		}
		
	  ?>
	  <h4 class="enteteTxt">Où allons nous aujourd'hui ?</h4>
	  <?php

		if($statut == NULL){
			echo"<h4>Accueil</h4>";
		}

		if($statut == 1){
			echo"<h4>Créer un trajet</h4>";
		 }
		 if($statut == 2){
			echo"<h4>Trouver un trajet</h4>";
		 }
		 if($statut == 3){
			echo"<h4>Activité</h4>";
		 }
		 if($statut == 4){
			echo"<h4>Gestion de mes vehicules</h4>";
		 }
		 if($statut == 5){
			echo"<h4>Gestion de mes trajets</h4>";
		 }
		 if($statut == 8){
			echo"<h4>Ajouter un utilisateur</h4>";
		 }
	  ?>
  		</blockquote>
  	</figcaption>
	</figure>
</div>

</div>
<script type="text/javascript">

//scroll du menu

	var positionElementInPage = $('.bouge').offset().top;
	$(window).scroll(
	function() {
	if ($(window).scrollTop() >= positionElementInPage) {
	// fixed
	$('.bouge').addClass("floatable");
	} else {
	// relative
	$('.bouge').removeClass("floatable");
	}
	}
	); 

</script> 
