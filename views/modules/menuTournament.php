<div class="nav-class">
	<?php
		if($_SESSION['role_sk'] == "Administrador"):
	?>
		<a href="<?php echo SERVERURL; ?>tournament" class="btn-welove">
		<i class="fas fa-dice"></i> Sortear
		</a>
		
	<?php
		else:
	?>
		
	<?php
		endif;
	?>
</div>