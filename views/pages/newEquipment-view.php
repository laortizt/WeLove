<?php
	require_once"./controller/controllerPayment.php";
	$insPayment = new controllerPayment();
?>

<div class="row">
    <div class="col-12 col-m-12 col-sm-12">
        <div class="card">
			<div class="card-content">
                <div class="header-class">
                    <h1 class="title">Crear Equipo</h1>
                    <div>
                        

                        <a href="<?php echo SERVERURL; ?>equipment" class="btn-kohaku">
                            <i class="far fa-file"></i> Registros
                        </a>
                    </div>
                </div>

                <!-- se crea la ruta que conecta con el ajax,  -->
                <form action="ajax/newPayAjax.php" method="post" autocomplete="off" class="payment-form formulario-ajax">
                    <div class="payment">
                        <div class="input-container">
                            <label class="label">Fecha</label>
                            <div class="input-field">
                                <input type="date" name="date-newpay" required="" />
                            </div>
                        </div>
                        <div class="input-container">
                            
                            <label class="label">Nombre del Equipo</label>
                            <div class="input-field">
                                <input type="texbox" name="name-newequipment" minlength="1" maxlength="100"/>
                            </div>
                        </div>
                        
                        <div class="input-container">
                            <label class="label">Categoría</label>
                            <?php echo $insPayment->list_procedure_controller() ?> 
                        </div>

                        <div class="input-container">
                            
                            <label class="label">Nombre Capitana</label>
                            <div class="input-field">
                                <input type="texbox" name="observation-newpay" minlength="1" maxlength="100"/>
                            </div>
                        </div>

                        <div class="input-container">                        
                            <label class="label">Telefono</label>
                            <div class="input-field">
                                <i class="fas fa-phone-alt"></i>
                                <input type="text"  name="phone-profile" required="" pattern="[0-9]{7,20}"/>
                            </div>
                        </div> 

                    </div>

                    <input type="submit" class="btn-kohaku" value="Guardar" />

                    <div class="RespuestaAjax"></div>
                </form>          
            </div>
        </div>
    </div>
</div>
