<?php
$petitionAjax = true;
require_once "../config/ConfigGeneral.php";

//Condicion para comprobar si se reciben los datos del formulario
if (isset($_POST['action'])) {
    require_once "../controller/controllerEquipment.php";
    $insEquipment = new controllerEquipment();

    if ($_POST['action'] == 'guardar') {
        if (
            isset($_POST['name-newequipment']) &&
            isset($_POST['category-newequipment']) &&
            isset($_POST['cap-newequipment']) &&
            isset($_POST['phone-newequipment'])
        ) {
            session_start(['name' => 'SK']);
            
            echo $insEquipment->create_equipment_controller();
            // echo '<script>window.location.href="' . SERVERURL . 'tournament"</script>';
        } else {
            echo '<script>
                swal({
                    title: "Guardar equipo",
                    text: "No están todos los datos necesarios.",
                    type: "Alert",
                    showCancelButton: true,     
                    confirmButtonText: "Aceptar",
                    cancelButtonText: "Cancelar"
                }).then(function(){
                    window.location.href="' . SERVERURL . 'newEquipment"
                });
            </script>';
        }
    } else if ($_POST['action'] == 'eliminar') {
        session_start(['name' => 'SK']);

        echo $insEquipment->delete_current_user_team_controller();
    }
} else {
    //poner seguridad a la página
    session_start();
    session_destroy();

    echo '<script> window.location.href="' . SERVERURL . 'login" </script>';
}
