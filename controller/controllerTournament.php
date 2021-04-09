<?php
    //CONTROLADOR PARA TORNEOS
    if($petitionAjax){
        require_once "../models/modelTournament.php";
    }else{
        // si la Peticion ajax es false aceder a la configuración DB
        require_once "./models/modelTournament.php";
    }

    class controllerTournament extends modelTournament {
        public function get_equipments_controller() {
            $limit = 8;
            return modelTournament::get_last_equipments_model($limit);
        }

        public function get_equipments_randomized_controller() {
            $limit = 8;
            $equipments = modelTournament::get_last_equipments_model($limit);

            if (is_array($equipments) && count($equipments) > 0) {
                shuffle($equipments);

                return $equipments;
            }
        }
    }