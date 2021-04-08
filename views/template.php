<?php
//peticion ajax
$petitionAjax = false;

session_start(['name' => 'SK']);
?>

<!DOCTYPE html>
<html>

<head>
	<title>WeLoveSoccer</title>

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<!-- <link rel="icon" type="image/png" href="<?php echo SERVERURL; ?>/assets/img/favicon/favicon.ico" /> -->
	<title><?php echo COMPANY; ?></title>
	<!-- Import lib -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo SERVERURL; ?>/assets/fontawesome-free/css/all.min.css">

	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

	<!-- LINKS datatable -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">



	<!-- End import lib -->
	<link href="<?php echo SERVERURL; ?>assets/style/dashboard.css" rel="stylesheet">
	<link href="<?php echo SERVERURL; ?>assets/style/tournament.css" rel="stylesheet">
	<link href="<?php echo SERVERURL; ?>assets/style/profile.css" rel="stylesheet">
	<link href="<?php echo SERVERURL; ?>assets/style/payments.css" rel="stylesheet">
	<link href="<?php echo SERVERURL; ?>assets/style/newPay.css" rel="stylesheet">
	<link href="<?php echo SERVERURL; ?>assets/style/kohaku.css" rel="stylesheet">
	

	<link href="<?php echo SERVERURL; ?>assets/sweet-alert/sweetalert2.css" rel="stylesheet">
	<link href="<?php echo SERVERURL; ?>assets/glyphicons/glyphicons.css" rel="stylesheet">

	<?php include "views/modules/script.php"; ?>
</head>

<body class="overlay-scrollbar">

	<?php
	//se incluye el archivo vista controlador
	require_once "./controller/viewsController.php";

	// $noTemplateViews = ["forgot-password", "register"];

	//Se instancia la vista controlado vistas o vt
	$vt = new viewsController();
	//queremos utilizar la funcion  obtener vista controlador
	//se crea una NUEVA variala $vtA para poder hacer el iclud de la variabl en el conenido SN ERROR
	$vtA = $vt->get_views_controller();
	// si vt trae el valor del login se muestra el login

	// if (in_array($vtA, $noTemplateViews)):
	//     require_once "./views/pages/".$vtA.".php";
	// elseif ($vtA=="login"):
	if ($vtA == "login") :
		//si no, me incluye todo el contenida de la página
		require_once "./views/pages/login-view.php";
	else :
		//iniciar sesión
		// session_start(['name'=>'SK']);
		require_once "./controller/controllerLogin.php";
		//  se instancia la  funcion forzar sesión
		$lc = new controllerLogin();

		// si una de estas dos condiciones no viene definida el usuario no ha iniciado sesion bien 
		if (!isset($_SESSION['token_sk']) || !isset($_SESSION['email_sk'])) {
			$lc->force_logout();
		}
	?>
		<!-- navbar VIEJO -->
		<div class="navbar">
			<!-- nav left -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link">
						<i class="fas fa-bars" onclick="collapseSidebar()"></i>
					</a>
				</li>

				<li class="nav-item">
					<img src="<?php echo SERVERURL; ?>assets/img/logoWelove2.png" class="image-logo" alt="">
				</li>
			</ul>
			<!-- end nav left -->


			<!-- nav right -->
			<ul class="navbar-nav nav-right">
				<li class="nav-item mode">
					<span><?php echo $_SESSION['role_sk'] ?></span>
				</li>
				<li class="nav-item avt-wrapper">
					<div class="avt dropdown">
						<img src="./assets/img/logoFem.png" alt="Logo fem" class="dropdown-toggle" data-toggle="user-menu">
						<ul id="user-menu" class="dropdown-menu">
							<li class="dropdown-menu-item">
								<a href="<?php echo SERVERURL; ?>profile" class="dropdown-menu-link">
									<div>
										<i class="fas fa-user-tie"></i>

									</div>

									<span>Perfil</span>
								</a>
							</li>
							<li class="dropdown-menu-item">
								<a href="<?php echo $lc->encryption($_SESSION['token_sk']); ?>" class="dropdown-menu-link btn-logout">
									<div>
										<i class="fas fa-sign-out-alt"></i>
									</div>
									<span>Cerrar sesión</span>
								</a>
							</li>
						</ul>
						
					</div>
				</li>
			</ul>
			<!-- end nav right -->
		</div>
		<!-- end navbar -->

		<!-- sidebar -->
		<div class="sidebar">
			<ul class="sidebar-nav">
				<?php if (isset($_SESSION['role_sk']) && $_SESSION['role_sk'] === "Administrador") : ?>
					<li class="sidebar-nav-item">
						<a href="<?php echo SERVERURL; ?>admin" class="sidebar-nav-link active">
							<div>
								<i class="fas fa-key"></i>
							</div>
							<span>Admin</span>
						</a>
					</li>
				<?php endif; ?>

				<li class="sidebar-nav-item">
					<a href="<?php echo SERVERURL; ?>equipment" class="sidebar-nav-link">
						<div>
							<i class="far fa-calendar-alt"></i>
						</div>
						<span>Equipos</span>

					</a>
				</li>
				
				<li class="sidebar-nav-item">
					<a href="<?php echo SERVERURL; ?>tournament" class="sidebar-nav-link">
						<div>
							<i class="fas fa-money-check-alt"></i>
						</div>
						<span>Campeonatos</span>
					</a>
				</li>
				<li class="sidebar-nav-item">
					<a href="<?php echo SERVERURL; ?>payments" class="sidebar-nav-link">
						<div>
							<i class="fas fa-cash-register"></i>
						</div>
						<span>Pagos</span>
					</a>
				</li>

			</ul>
		</div>
		<!-- end sidebar -->

		<!-- main content -->
		<div class="wrapper">
			<?php require_once $vtA; ?>
		</div>

		<!-- end main content -->
		<!-- import script -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
		<script src="<?php echo SERVERURL; ?>assets/script/index.js"></script>
		<!-- end import script -->
	<?php
		include "./views/modules/logoutScript.php";
	endif;
	?>

	<script>
		if (!(typeof $material === "undefined")) {
			$material.init();
		}
	</script>
</body>
<html>