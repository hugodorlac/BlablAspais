<div class="containerMenu row">
	<div class="col-2 menu bouge">
	<ul class="col-xs-4 navbar-nav mx-auto">
		<li class="nav-item txtMenu"><a href="./index.php?t=1" class="nav-link">Accueil</a></li>
		<div class="containerNotif row">
		<li class="nav-item notif txtMenu"><a href="./index.php?statut=3" class="nav-link">Activité</a></li>
		<?php
			$nbNotif = UserDb::CountDemande($_SESSION['id']);
			
			foreach($nbNotif as $ligne)
			{
				echo"<span class='badge badge-danger'>". $ligne['COUNT(*)']."</span>";
			}
		?>
		</div>
		<li class="nav-item txtMenu"><a href="./index.php?statut=4" class="nav-link">Mes vehicules</a></li>
		<li class="nav-item txtMenu"><a href="./index.php?statut=5" class="nav-link">Gestion</a></li>
		<li class="nav-item txtMenu"><a href="./index.php?ctl=connect&action=tuto" class="nav-link">Tutoriel</a></li>
		<?php
			$admin = UserDb::admin($_SESSION['id']);
			foreach($admin as $ligne)
			{
				if($ligne['droit'] == 1)
				{
					echo "<li class='nav-item txtMenu'><a href='./admin.php' class='nav-link'>Panel admin</a></li>";
				}
			}

		?>
		<?php
			if(isset($_SESSION['connect']))
			{
				echo"<li class='nav-item txtMenu'>"."<a class='nav-link btnDeconnexion' href='./index.php?ctl=connect&action=deconnecter&statut=0'>Deconnexion</a>"."</li>";	
			}
			
		
	  ?>
	</ul>
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