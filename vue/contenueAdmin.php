<?php
	if(isset($_POST['stat'])){
		if($_POST['stat'] == 'OK'){
			echo"<h1>OK</h1>";
		}
	}
	else {
		echo"
		<script>
			function viderLesDemandes () {
				swal({
					title: 'Etes-vous sûr ?',
					text: 'Voulez-vous supprimer toutes les demandes ?',
					icon: 'warning',
					buttons: true,
					dangerMode: true,
				  })
				  .then((willDelete) => {
					if (willDelete) {
					  swal('Les demandes ont été supprimer !', {
						icon: 'success',
					  });
					document.location.href='./index.php?ctl=reservation&action=adminViderDemande';
					} else {
					  swal('Action annulée', {
						  icon :'info',
						});
					}
				  });
			}
			function viderLesTrajets () {
				swal({
					title: 'Etes-vous sûr ?',
					text: 'Voulez-vous supprimer tous les trajets ?',
					icon: 'warning',
					buttons: true,
					dangerMode: true,
				  })
				  .then((willDelete) => {
					if (willDelete) {
					  swal('Les trajets ont été supprimer !', {
						icon: 'success',
					  });
					document.location.href='./index.php?ctl=trajet&action=adminViderTrajet';
					} else {
						swal('Action annulée', {
							icon :'info',
						  });
					  }
				  });
			}
		</script>
		
		<div class='col-10 containerMain holder'>
	
		<div class='col-3 card2'>
				<div class='card' style='width: 18rem;'>
				<span align='center' style='font-size: 3em; color: #d9534f;'>
					<i class='fas fa-cogs'></i>
				</span>
				<div class='card-body card0'>
				<center><button onclick='viderLesDemandes()' class='btn btn-danger'>Vider les demandes</button></center>
				</div>
			</div>
			</div>
		
			<div class='col-3 card2'>
				<div class='card' style='width: 18rem;'>
				<span align='center' style='font-size: 3em; color: #d9534f;'>
					<i class='fas fa-map-marked-alt'></i>
				</span>
				<div class='card-body card0'>
				<center><button onclick='viderLesTrajets()' class='btn btn-danger'>Vider les trajets</button></center>

				</div>
			</div>
			</div>
		
			<div class='col-3 card2'>
				<div class='card' style='width: 18rem;'>
				<span align='center' style='font-size: 3em; color: #d9534f;'>
					<i class='fas fa-users-cog'></i>
				</span>
				<div class='card-body card0'>
				<center><a href='admin.php?statut=8'><button type='button' class='btn btn-danger'>Ajouter un utilisateur</button></a></center>
				</div>
			</div>
			</div>
		
			<div class='col-3 card2'>
				<div class='card' style='width: 18rem;'>
				<span align='center' style='font-size: 3em; color: #d9534f;'>
					<i class='fas fa-cogs'></i>
				</span>
				<div class='card-body card0'>
				<center><a href=''><button type='button' class='btn btn-danger'>Lorem ipsum dolor sit</button></a></center>
				</div>
			</div>
			</div>
		
		</div>
		
		
	";		
	}


?>



	