<?php
require_once "./controller/controllerEquipment.php";
$insEquipment = new controllerEquipment();
?>

<?php
	if($_SESSION['role_sk'] != "Administrador") {
		echo'<script> window.location.href="'.SERVERURL.'newEquipment" </script>';
	}
?>

<!-- CMABIAR POR EL CONTROLADOR DE ASISTENCIA -->

<div class="row">
	<div class="col-12 col-m-12 col-sm-12">
		<div class="card">
			<div class="card-content">
				<div class="header-class">
					<h1 class="title">Equipos registrados</h1>
					<?php include "./views/modules/menuEquipment.php"; ?> 
				</div>

				<?php
					$pages = explode("/", $_GET['page']);
					
					echo $insEquipment->pages_equipment_controller(0, 10, $_SESSION['role_sk'], 'code');
				?>				
			</div>
		</div>
	</div>
</div>

<script src="<?php echo SERVERURL; ?>assets/script/equipment.js"></script>