<?php
require_once "./controller/controllerProfile.php";
$insProfile = new controllerProfile();
?>

<div class="row">
    <div class="col-12 col-m-12 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="header-class">
                    <h1 class="title">Mi perfil</h1>
                    <?php
                    $profile = $insProfile->get_profile_controller();
                    ?>
                </div>

                <div class="container-form">
                    <div class="row form-left">
                        <div div class="img-form">
                            <img src="<?php echo SERVERURL; ?>assets/img/women2.jpg" class="image-women" alt="">
                        </div>
                    </div>

                    <div class="row form-right">
                        <form action="ajax/profileAjax.php" method="post" autocomplete="off" class="profile-form formulario-ajax">
                            <h2 class="title">Mi Perfil</h2>

                            <div class="profile">

                                <div class="input-container">
                                    <label class="label">Tipo Documento</label>
                                    <?php echo $insProfile->list_typeDocument_controller($profile['accountDocumentType']) ?>
                                </div>

                                <div class="input-container">

                                    <label class="label">Número Documento</label>
                                    <div class="input-field">
                                        <i class="far fa-address-card"></i>
                                        <input type="text" value="<?php echo $profile['accountDni'] ?>" name="dni-profile" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,30}" />
                                    </div>
                                </div>

                                <div class="input-container">
                                    <label class="label">Nombres</label>
                                    <div class="input-field">
                                        <i class="fas fa-user"></i>
                                        <input type="text" value="<?php echo $profile['accountFirstName'] ?>" name="firstname-profile" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" />
                                    </div>
                                </div>

                                <div class="input-container">
                                    <label class="label">Apellidos</label>
                                    <div class="input-field">
                                        <i class="fas fa-user"></i>
                                        <input type="text" value="<?php echo $profile['accountLastName'] ?>" name="lastname-profile" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" />
                                    </div>
                                </div>

                                <div class="input-container">
                                    <label class="label">Dirección</label>
                                    <div class="input-field">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <input type="text" value="<?php echo $profile['accountAddress'] ?>" name="adress-profile" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9#\- ]{1,30}" />
                                    </div>
                                </div>

                                <div class="input-container">
                                    <label class="label">Correo</label>
                                    <div class="input-field">
                                        <i class="fas fa-envelope"></i>
                                        <input type="email" value="<?php echo $profile['accountEmail'] ?>" required="" name="email-profile" readonly="" />
                                    </div>
                                </div>

                                <div class="input-container">
                                    <label class="label">Telefono</label>
                                    <div class="input-field">
                                        <i class="fas fa-phone-alt"></i>
                                        <input type="text" value="<?php echo $profile['accountPhone'] ?>" name="phone-profile" required="" pattern="[0-9]{7,20}" />
                                    </div>
                                </div>

                                <!-- <div class="input-container">
                            <label class="label">Género</label>
                            
                        </div>  -->
                            </div>

                            <input type="submit" class="btn-welove" value="Guardar" />

                            <div class="RespuestaAjax"></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>