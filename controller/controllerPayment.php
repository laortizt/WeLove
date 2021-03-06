<?php
    //CONTROLADOR PARA CREAR ADMINISTRADOR
    if($petitionAjax){
        require_once "../models/modelPayment.php";
    }else{
        // si la Peticion ajax es false aceder a la configuración DB
        require_once "./models/modelPayment.php";
    }

    class controllerPayment extends modelPayment{

        public function find_dni($dni) {
            //Obtiene los perfiles que coincidan con el dni enviado
            $datos = mainModel::connect()->query("SELECT idAccount, accountDni, accountCode
                FROM accounts WHERE accountDni ='$dni'");
            return $datos->fetchAll();
        }

        public function list_procedure_controller(){
            $Procedures = modelPayment::list_procedure_model();

            $select = '<select id="procedure-newpay" class="input-field" name="procedure-newpay" required="">';
            
            foreach($Procedures as $procedure){
                $select.='<option value="'.$procedure['idProcedures'].'" data-cost="'.$procedure['procedurePrice'].'">'
                    .$procedure['procedureName'].
                    '</option>';
            }

            $select.='</select>';

            return $select;
        }

        public function create_payment_controller(){
            $date= mainModel::clean_string($_POST['date-newpay']);
            $dni= mainModel::clean_string($_POST['dni-newpay']);
            $procedure= mainModel::clean_string($_POST['procedure-newpay']); 
            $price= mainModel::clean_string($_POST['price-newpay']);
            $observation= mainModel::clean_string($_POST['observation-newpay']);
            
            //reemplaza el $
            $price = str_replace('$', '', $price);

            //AQUI se incluye el campo dni para registrar el pago al usuario.
            $accountsByDni=modelPayment::find_dni($dni);

            if (count($accountsByDni) < 1 || 
                $accountsByDni[0]['accountDni'] != $dni)
            {
                $alert=[
                    "alert"=>"simple",
                    "title"=>"Ocurrio un error inesperado",
                    "text"=>"El número de Identificación no está registrado",
                    "type"=>"error"
                ];
            } else {
                $idAccount = $accountsByDni[0]['idAccount'];
    
                // Si todas se cumplen, llamar al modelo para que ejecute el cambio, enviando la info en un arreglo
                $dataPayment = [
                    "Date"=>$date,
                    "Procedure"=>$procedure,
                    "Price"=>$price,
                    "Observation"=>$observation,
                    "IdAccount"=>$idAccount
                ];

                $savePayment = modelPayment::create_payment_model($dataPayment);

                // Verificar si el cambió se aplico e informar al usuario
                if($savePayment->rowCount() >= 1){
                    $alert=[
                        "alert"=>"limpiar",
                        "title"=>"Guardar Pago",
                        "text"=>"El pago se haguardado exitósamente.",
                        "type"=>"success"
                    ];
                } else {
                    $alert=[
                        "alert"=>"simple",
                        "title"=>"Guardar Pago",
                        "text"=>"No se pudo guardar el pago, verifique si el usuario está registrado.",
                        "type"=>"error"
                    ];
                }
            }

            return mainModel::sweet_alert($alert);   
        }

        public function pages_payment_controller($pages, $register, $role, $code){
            //Aqui que va?
            $pages=mainModel::clean_string($pages);
            $register=mainModel::clean_string($register);
            $role=mainModel::clean_string($role);
            $code=mainModel::clean_string($code);

            $table="";

            $page=(isset($page)&& $page>0) ? (int) $page : 1;
            $start=($pages>0) ? (($pages*$register)-$register) : 0;

            $results = [];

            if ($role=="Administrador") {
                $results = modelPayment::get_payments_model($start, (int) $register);
            } else {
                $results = modelPayment::get_user_payments_model($_SESSION['code_sk'], $start, (int) $register);
            }
            
            $datos = $results["data"];
            $total = $results["count"];

            //calcular el otal de páginas
            $Npages= ceil($total/$register);
            $table.='<div>
            <table>
                <thead> 
                    <td>Fecha de pago</td>
                    <td>Documento</td>
                    <td>Trámite</td>
                    <td>Valor</td>
                    <td>Observaciones</td>
                    <td>Nombre</td>
                </thead>
                <tbody>
            ';
            
            if($total>=1 && $pages<=$Npages){
                $count=$start+1;
                foreach($datos as $rows){
                    $table.='
                    <tr>
                        <td>'.$rows['paymentDate'].'</td>
                        <td>'.$rows['accountDni'].'</td>
                        <td>'.$rows['procedureName'].'</td>
                        <td>'.$rows['paymentPrice'].'</td>
                        <td>'.$rows['paymentObservation'].'</td>
                        <td>'.$rows['accountFirstName'].' '.$rows['accountLastName'].'</td>
                    </tr>
                    ';
                    $count++;
                }
            }else{
                $table.='
                    <tr>
                        <td colspan="15"> No hay registros en el sistema</td>
                    </tr>';
            }
            $table.='</tbody> </table> </div>';

            return $table;
    }
}