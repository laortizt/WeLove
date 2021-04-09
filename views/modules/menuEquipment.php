<div class="nav-class">
	<?php
		if($_SESSION['role_sk'] == "Administrador"):
	?>
		<a href="<?php echo SERVERURL; ?>equipment" class="btn-welove">
			<i class="fas fa-clipboard-list"></i> Registros
		</a>
		<!-- <a href="<?php echo SERVERURL; ?>newEquipment" class="btn-welove">
			<i class="fas fa-plus-square"></i> Nuevo
		</a> -->
	<?php
		else:
	?>
		
	<?php
		endif;
	?>
</div>