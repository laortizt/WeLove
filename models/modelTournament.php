<?php
    
    if($petitionAjax){
        require_once "../config/mainModel.php";
    }else{
        // si la eticion ajax es fale aceder a la configuración DB
        require_once "./config/mainmodel.php";
    }

    //MODELO PARA CREAR CLASE
    class modelTournament extends mainModel {

        // Traer la lista de detalles
        public function get_last_equipments_model($limit) {
            //Obtiene los trámites registrados
            $sql = mainModel::connect()->query("SELECT * FROM equipments
                ORDER BY equipmentDate DESC LIMIT $limit");
            return $sql->fetchAll();
        }
    }
