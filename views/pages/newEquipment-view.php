<?php
require_once "./controller/controllerEquipment.php";
require_once "./controller/controllerProfile.php";
$insEquipment = new controllerEquipment();
$insProfile = new controllerProfile();
?>

<?php
$profile = $insProfile->get_profile_controller();
$equipment = $insEquipment->get_current_user_team();

if (!is_array($equipment)) {
    $equipment = null;
}
?>

<div class="row">
    <div class="col-12 col-m-12 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="header-class">
                    <h1 class="title">Registrar equipo</h1>
                    <?php include "./views/modules/menuEquipment.php"; ?>
                </div>

                <!--DESDE AQUI -->
                <!--1. agrego clase container.form -->
                <div class="container-form">
                    <div class="row form-left">
                        <div div class="img-form">
                        <img src="<?php echo SERVERURL; ?>assets/img/women1.png" class="image-women" alt="">
                        </div>
                    </div>

                    <div class="row form-right">
                        <form action="ajax/equipmentAjax.php" method="post" autocomplete="off" class="equipment-form formulario-ajax">
                            <div class="payment">
                                <div class="input-container">
                                    <label class="label">Fecha</label>
                                    <div class="input-field">
                                        <input type="text" value="<?php echo date('d/m/Y') ?>" name="date-newequipment" required="" readonly="readonly" />
                                    </div>
                                </div>

                                <div class="input-container">
                                    <label class="label">Nombre del Equipo</label>
                                    <div class="input-field">
                                        <input type="texbox" name="name-newequipment" value="<?php echo $equipment != null ? $equipment['equipmentName'] : '' ?>" minlength="1" maxlength="100" required="" <?php echo $equipment != null ? ' readonly="readonly"' : '' ?> />
                                    </div>
                                </div>

                                <div class="input-container">
                                    <label class="label">Categoría</label>
                                    <?php echo $insEquipment->list_categories_controller() ?>
                                </div>

                                <div class="input-container">
                                    <label class="label">Nombre Capitana</label>
                                    <div class="input-field">
                                        <i class="fas fa-user"></i>
                                        <input type="text" name="cap-newequipment" value="<?php echo $profile['accountFirstName'] . ' ' . $profile['accountLastName'] ?>" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" readonly="readonly" />
                                    </div>
                                </div>

                                <div class="input-container">
                                    <label class="label">Teléfono</label>
                                    <div class="input-field">
                                        <i class="fas fa-phone-alt"></i>
                                        <input type="text" name="phone-newequipment" value="<?php echo $profile['accountPhone'] ?>" required="" pattern="[0-9]{7,20}" <?php echo $equipment != null ? ' readonly="readonly"' : '' ?> />
                                    </div>
                                </div>
                            </div>

                            <?php if ($equipment == null) : ?>
                                <input type="hidden" name="action" value="guardar">
                                <input type="submit" class="btn-welove" value="Guardar" />
                            <?php else : ?>
                                <input type="hidden" name="action" value="eliminar">
                                <input type="submit" class="btn-welove" value="Eliminar" />
                            <?php endif ?>

                            <div class="RespuestaAjax"></div>
                        </form>
                    </div>

                </div>
                <!--DHASTA AQUI -->

                <!-- se crea la ruta que conecta con el ajax,  -->
                <!-- <form action="ajax/equipmentAjax.php" method="post" autocomplete="off" class="payment-form formulario-ajax">
                    <div class="payment">
                        <div class="input-container">
                            <label class="label">Fecha</label>
                            <div class="input-field">
                                <input type="text" value="<?php echo date('d/m/Y') ?>" name="date-newequipment" required="" readonly="readonly"/>
                            </div>
                        </div>

                        <div class="input-container">
                            <label class="label">Nombre del Equipo</label>
                            <div class="input-field">
                                <input type="texbox" name="name-newequipment"
                                    value="<?php echo $equipment != null ? $equipment['equipmentName'] : '' ?>" 
                                    minlength="1" maxlength="100" required=""
                                    <?php echo $equipment != null ? ' readonly="readonly"' : '' ?> />
                            </div>
                        </div>
                        
                        <div class="input-container">
                            <label class="label">Categoría</label>
                            <?php echo $insEquipment->list_categories_controller() ?>
                        </div>

                        <div class="input-container">
                            <label class="label">Nombre Capitana</label>
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input type="text" name="cap-newequipment" value="<?php echo $profile['accountFirstName'] . ' ' . $profile['accountLastName'] ?>" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" readonly="readonly"/>
                            </div>
                        </div>
                        
                        <div class="input-container">                        
                            <label class="label">Teléfono</label>
                            <div class="input-field">
                                <i class="fas fa-phone-alt"></i>
                                <input type="text" name="phone-newequipment"
                                    value="<?php echo $profile['accountPhone'] ?>"
                                    required="" pattern="[0-9]{7,20}"
                                    <?php echo $equipment != null ? ' readonly="readonly"' : '' ?> />
                            </div>
                        </div>
                    </div>

                    <?php if ($equipment == null) : ?>
                        <input type="hidden" name="action" value="guardar">
                        <input type="submit" class="btn-welove" value="Guardar" />
                    <?php else : ?>
                        <input type="hidden" name="action" value="eliminar">
                        <input type="submit" class="btn-welove" value="Eliminar" />
                    <?php endif ?>

                    <div class="RespuestaAjax"></div>
                </form>      -->


            </div>
        </div>
    </div>
</div>