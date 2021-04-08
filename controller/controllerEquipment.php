<?php
    //CONTROLADOR PARA CREAR ADMINISTRADOR
    if($petitionAjax){
        require_once "../models/modelEquipment.php";
        require_once "controllerProfile.php";
    }else{
        // si la Peticion ajax es false aceder a la configuración DB
        require_once "./models/modelEquipment.php";
        require_once "./controller/controllerProfile.php";
    }

    class controllerEquipment extends modelEquipment{

        public function list_categories_controller(){
            $categories = modelEquipment::list_categories_model();

            $select = '<select id="category-newequipment" class="input-field" name="category-newequipment" required="">';
            
            foreach($categories as $category){
                $select.='<option value="'.$category['idCategories'].'">'
                    .$category['categoriesName'].
                    '</option>';
            }

            $select.='</select>';

            return $select;
        }

        public function get_current_user_team() {
            return modelEquipment::get_equipment_model($_SESSION['code_sk']);
        }

        public function create_equipment_controller(){
            $name= mainModel::clean_string($_POST['name-newequipment']);
            $category= mainModel::clean_string($_POST['category-newequipment']); 
            $phone= mainModel::clean_string($_POST['phone-newequipment']);

            $currentUserEquipment=modelEquipment::get_equipment_model($_SESSION['code_sk']);

            $insProfile = new controllerProfile();
            $profile = $insProfile->get_profile_controller();

            if (is_array($currentUserEquipment) && count($currentUserEquipment) >= 1)
            {
                $alert=[
                    "alert"=>"simple",
                    "title"=>"Ocurrió un error inesperado",
                    "text"=>"Ya tiene un equipo registado",
                    "type"=>"error"
                ];
            } else {
                $captainIdAccount = $profile['idAccount'];

                // Si todas se cumplen, llamar al modelo para que ejecute el cambio, enviando la info en un arreglo
                $dataEquipment = [
                    "Date"=>date('c'),
                    "Name"=>$name,
                    "Category"=>$category,
                    "Phone"=>$phone,
                    "CaptainId"=>$captainIdAccount
                ];

                $saveEquipment = modelEquipment::create_equipment_model($dataEquipment);

                // Verificar si el cambió se aplico e informar al usuario
                if($saveEquipment->rowCount() >= 1){
                    $alert=[
                        "alert"=>"limpiar",
                        "title"=>"Guardar equipo",
                        "text"=>"El equipo se registró exitósamente.",
                        "type"=>"success"
                    ];
                } else {
                    $alert=[
                        "alert"=>"simple",
                        "title"=>"Guardar equipo",
                        "text"=>"No se pudo guardar el equipo, verifique los campos.",
                        "type"=>"error"
                    ];
                }
            }

            return mainModel::sweet_alert($alert);   
        }

        public function pages_equipment_controller($pages, $register, $role, $code){
            //Aqui que va?
            $pages=mainModel::clean_string($pages);
            $register=mainModel::clean_string($register);
            $role=mainModel::clean_string($role);
            $code=mainModel::clean_string($code);

            $table="";

            $page=(isset($page)&& $page>0) ? (int) $page : 1;
            $start=($pages>0)? (($pages*$register)-$register) : 0;
            $conexion= mainModel::connect();

            //Calcula cúantos registros hay en la consutla
            //aqui en la consulta el admin 1 es el principal del sistema y  NO se va a seleccionar
            $datos = $conexion->query("SELECT SQL_CALC_FOUND_ROWS * FROM equipments e
                LEFT JOIN accounts a ON (e.equipmentAccount = a.idAccount)
                 WHERE a.idAccount!='1' ORDER BY equipmentDate DESC LIMIT $start, $register");
            $datos=$datos->fetchAll();
            $total=$conexion->query("SELECT found_rows()");
            $total=(int) $total->fetchColumn();

            //calcular el otal de páginas
            $Npages= ceil($total/$register);
            $table.='<div>
            <table>
                <thead> 
                    <td>Fecha de pago</td>
                    <td>Nombre del Equipo</td>
                    <td>Categoría</td>
                    <td>Nombre Capitana</td>
                    <td>Teléfono</td>
                    <td colspan="1">Acciones</td>
                </thead>
                <tbody>
            ';
            
            if($total>=1 && $pages<=$Npages){
                $count=$start+1;
                foreach($datos as $rows){
                    $table.='
                    <tr>
                        <td>'.$rows['equipmentDate'].'</td>
                        <td>'.$rows['equipmentName'].'</td>
                        <td>'.$rows['equipmentCategory'].'</td>
                        <td>'.$rows['accountFirstName'].' '.$rows['accountLastName'].'</td>
                        <td>'.$rows['equipmentPhone'].'</td>
                        <td>'.'<button class="btn btn__update"><a href=""><i class="fas fa-edit"></i></a></button>&nbsp;'.
                        '<button class="btn btn__delete"><a href="#"><i class="far fa-times-circle"></i></a></button>'.'</td>
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

        public function delete_current_user_team_controller() {
            $equipment = $this->get_current_user_team();

            if (isset($equipment['idEquipment'])) {
                $result = modelEquipment::delete_equipment($equipment['idEquipment']);

                if ($result) {
                    $alert=[
                        "alert"=>"limpiar",
                        "title"=>"Eliminar equipo",
                        "text"=>"El equipo se registró exitósamente.",
                        "type"=>"success"
                    ];
                } else {
                    $alert=[
                        "alert"=>"simple",
                        "title"=>"Eliminar equipo",
                        "text"=>"No se pudo eliminar el equipo.",
                        "type"=>"error"
                    ];
                }
            } else {
                $alert=[
                    "alert"=>"simple",
                    "title"=>"Eliminar equipo",
                    "text"=>"No se pudo eliminar el equipo.",
                    "type"=>"error"
                ];
            }

            return mainModel::sweet_alert($alert);
        }
    }
