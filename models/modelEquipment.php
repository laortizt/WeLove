<?php
    
    if($petitionAjax){
        require_once "../config/mainModel.php";
    }else{
        // si la eticion ajax es fale aceder a la configuración DB
        require_once "./config/mainmodel.php";
    }

    //MODELO PARA CREAR CLASE
    class modelEquipment extends mainModel{

        //Traer la lista de categorías
        public function list_categories_model() {
            //Obtiene los trámites registrados
            $datos = mainModel::connect()->query("SELECT * FROM categories");
            return $datos->fetchAll();
        }        

         // Listar 
         public function get_equipment_model($code) {
            $sql= mainModel::connect()->prepare("SELECT * FROM equipments e 
                INNER JOIN accounts a ON (e.equipmentAccount = a.idAccount)
                WHERE a.accountCode=:captainCode");
            $sql->bindParam(':captainCode', $code);
            $sql->execute(); 

            return $sql->fetch();
        }
        
         //Actualizar 
         public function update_equipment_model($data) {
            $sql=mainModel::connect()->prepare("UPDATE equipments  
                SET equipmentName=:Name, equipmentCategory=:Category, 
                equipmentAccount=:CaptainId, equipmentPhone=:Phone
                WHERE idEquipment=:IdEquipment");
            $sql->bindParam(":Name",$data['Name']);
            $sql->bindParam(":Category",$data['Category']);
            $sql->bindParam(":Phone",$data['Phone']);
            $sql->bindParam(":idEquipment",$data['idEquipment']);
            $sql->bindParam(":CaptainId",$data['CaptainId']);

            $sql->execute();

            return $sql;
        }

        //Crear 
        public function create_equipment_model($data) {
            $sql=mainModel::connect()->prepare("INSERT INTO equipments
                (equipmentDate, equipmentName, equipmentCategory,
                equipmentPhone, equipmentAccount)
                VALUES (:Date, :Name, :Category, :Phone, :CaptainId)");
            $sql->bindParam(":Date",$data['Date'] );
            $sql->bindParam(":Name",$data['Name']);
            $sql->bindParam(":Category",$data['Category']);
            $sql->bindParam(":Phone",$data['Phone']);
            $sql->bindParam(":CaptainId",$data['CaptainId']);

            $sql->execute();

            return $sql;
        }
         
        //Eliminar Equipos
        protected function delete_equipment($idEquipment){
            $sql=mainModel::connect()->prepare("DELETE FROM equipments WHERE idEquipment=:idEquipment");
            $sql->bindParam(":idEquipment",$idEquipment);
            $sql->execute();

            return $sql;
        }

        public function find_dni($dni) {
            $datos = mainModel::connect()->query("SELECT idAccount, accountDni, accountCode
                FROM accounts WHERE accountDni ='$dni'");
            return $datos->fetchAll();
        }
    }
