<div class="col-10 containerMain holder">
	<?php
		$test = UserDb::newUser($_SESSION['id']);
		foreach($test as $ligne)
		{
			if($ligne['newUser'] == 1)
			{
				echo"
				<div class='containerTuto'>	
				<video autoplay='False'  width='690' height='440' controls>
					<source src='./vue/img/tuto.mp4' type='video/mp4'>
					<source src='movie.ogg' type='video/ogg'>
				</video>
				<div class='btnContinuer col-12 d-flex justify-content-center'>
				<a class='btn btn-danger' href='./index.php?ctl=connect&action=first'>Continuée</a>
				</div>
				</div>";
			}
			else
			{
			echo"<div class='col-5 card1'>
		<div class='card' style='width: 18rem;'>
		<img class='card-img-top' src='./vue/img/creerTrajet.jpg' alt='Card image cap'>
		<div class='card-body card0'>
		<center><a href='./index.php?statut=1'><button type='button' class='btn btn-danger'>Créer un trajet</button></a></center>
		</div>
		</div>
	</div>

	<div class='col-5 card2'>
		<div class='card' style='width: 18rem;'>
		<img class='card-img-top' src='./vue/img/trouverTrajet.jpg'  alt='Card image cap'>
		<div class='card-body card0'>
		<center><a href='./index.php?statut=2'><button type='button' class='btn btn-danger'>Trouver un trajet</button></a></center>
		</div>
	</div>
	</div>
</div>
</div>
</div>
</div>";
			}
		}
	?>


	


	