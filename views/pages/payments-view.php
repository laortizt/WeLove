<?php
require_once "./controller/controllerPayment.php";
$insPayment = new controllerPayment();
?>

<!-- CMABIAR POR EL CONTROLADOR DE ASISTENCIA -->

<div class="row">
	<div class="col-12 col-m-12 col-sm-12">
		<div class="card">
			<div class="card-content">
				<div class="header-class">
					<h1 class="title">Lista de Pagos</h1>
					<?php include "./views/modules/menuPayments.php"; ?> 
				</div>
						
				

				<?php
					$pages = explode("/", $_GET['page']);
					
					echo $insPayment->pages_payment_controller(0, 10, $_SESSION['role_sk'], 'code');
					?>
				
			</div>
		</div>
	</div>
</div>

<script src="<?php echo SERVERURL; ?>assets/script/payments.js"></script>