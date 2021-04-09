<?php
    
    if($petitionAjax){
        require_once "../config/mainModel.php";
    }else{
        // si la eticion ajax es fale aceder a la configuración DB
        require_once "./config/mainmodel.php";
    }

    //MODELO PARA CREAR CLASE
    class modelPayment extends mainModel{

        // Traer la lista de trámites
        public function list_procedure_model() {
            //Obtiene los trámites registrados
            $datos = mainModel::connect()->query("SELECT * FROM procedures");
            return $datos->fetchAll();
        }

        // Traer la lista de detalles
        public function list_details_model() {
            //Obtiene los trámites registrados
            $datos = mainModel::connect()->query("SELECT * FROM details");
            return $datos->fetchAll();
        }

        // Listar pagos de un usuario
        public function get_user_payments_model($accountCode, $start, $limit) {
            $conexion = mainModel::connect();

            $sql = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM payments p
                LEFT JOIN accounts a ON (p.paymentAccount = a.idAccount)
                LEFT JOIN procedures pr ON (p.paymentProcedure = pr.idProcedures)
                WHERE a.accountCode=:AccountCode
                ORDER BY paymentDate DESC LIMIT $start, $limit");
            $sql->bindParam(':AccountCode', $accountCode);
            $sql->execute();

            $result = [];
            $result["data"] = $sql->fetchAll();
            $result["count"] = (int) $conexion->query("SELECT found_rows()")->fetchColumn();

            return $result;
        }

        // Listar todos los pagos registrados
        public function get_payments_model($start, $limit) {
            $conexion = mainModel::connect();

            $sql = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM payments p
                LEFT JOIN accounts a ON (p.paymentAccount = a.idAccount)
                LEFT JOIN procedures pr ON (p.paymentProcedure = pr.idProcedures)
                ORDER BY paymentDate DESC LIMIT $start, $limit");
            $sql->execute();

            $result = [];
            $result["data"] = $sql->fetchAll();
            $result["count"] = (int) $conexion->query("SELECT found_rows()")->fetchColumn();

            return $result;
        }

         //Actualizar Pagos
         public function update_payment_model($data) {
            $sql=mainModel::connect()->prepare("UPDATE payments  
                SET paymentDate=:Date, paymentAccount=:IdAccount, paymentProcedure=:Procedure, 
                paymentPrice=:Price, paymentObservation=:Observation,
                WHERE idPayments=:IdPayments");
            $sql->bindParam(":Date",$data['Date']);
            $sql->bindParam(":Procedure",$data['Procedure']);
            $sql->bindParam(":Price",$data['Price']);
            $sql->bindParam(":Observation",$data['Observation']);
            $sql->bindParam(":IdAccount",$data['IdAccount']);

            $sql->execute();

            return $sql;
        }

        //Crear Equipo
        public function create_payment_model($datos) {
            $sql=mainModel::connect()->prepare("INSERT INTO payments 
                (paymentDate, paymentProcedure,  paymentPrice,
                paymentObservation, paymentAccount)
                VALUES (:Date, :Procedure, :Price, :Observation, :IdAccount)");
            $sql->bindParam(":Date",$datos['Date']);
            $sql->bindParam(":Procedure",$datos['Procedure']);
            $sql->bindParam(":Price",$datos['Price']);
            $sql->bindParam(":Observation",$datos['Observation']);
            $sql->bindParam(":IdAccount",$datos['IdAccount']);
            
            $sql->execute();

            return $sql;
        }
         
         //Eliminar Pagos
        protected function delete_pay($idPay){
            $sql=mainModel::connect()->prepare("DELETE FROM payments WHERE idPayments=:idPayments");
            $sql->bindParam(":idPayments",$idPayments);
            $sql->execute();

            return $sql;
        }
        public function find_dni($dni) {
            $datos = mainModel::connect()->query("SELECT idAccount, accountDni, accountCode
                FROM accounts WHERE accountDni ='$dni'");
            return $datos->fetchAll();
        }
    }
