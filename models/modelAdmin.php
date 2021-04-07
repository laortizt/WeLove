<?php
    
    if($petitionAjax){
        require_once "../config/mainModel.php";
    }else{
        // si la eticion ajax es fale aceder a la configuración DB
        require_once "./config/mainmodel.php";
    }

    //MODELO PARA CREAR USUARIO completar info usuario
    class modelAdmin extends mainModel{
        
        public function add_user_account($datos) {
            $datos["Role"] = 3;
            return mainModel::add_account($datos);
        }
        
        public function list_typeDocuments_model() {
            //Obtiene los tipos de documentos registrados
            $datos = mainModel::connect()->query("SELECT * FROM documenttype");
            return $datos->fetchAll();
        }
        public function list_roles_model() {
            //Obtiene los roles registrados
            $datos = mainModel::connect()->query("SELECT * FROM role");
            return $datos->fetchAll();
        }
        public function list_states_model() {
            //Obtiene los estados registrados
            $datos = mainModel::connect()->query("SELECT * FROM status");
            return $datos->fetchAll();
        }
         //HASTA AQUI
    }