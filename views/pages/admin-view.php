<?php
require_once "./controller/controllerAdmin.php";
$insAdmin = new controllerAdmin();
?>

<div class="container-fluid">
	
	<!-- Privileges section -->
	<div class="row privileges">
		<div class="col-12 col-m-12 col-sm-12">
			<div class="card">
				<div class="card-content">
					<h1 class="title">Lista de usuarios Registrados</h1>
					<!-- DESDE AQUI -->
				
					<?php
					$pages = explode("/", $_GET['page']);
					
					echo $insAdmin->pages_admin_controller(0, 10, $_SESSION['role_sk'], 'code');
					?>
				</div>
				
			</div>
		</div>
	</div>
		
</div>