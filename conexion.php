<?php

    class conexion{
        private $server="127.0.0.1";
        private $usuario="root";
        private $contrasenia="D@n!#l!ll01188390";
        private $conexion;

        public function __construct($db){
            try{
                $this->conexion=new PDO("mysql:dbname=$db;host=$this->server", $this->usuario, $this->contrasenia);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $E){
                echo "Conexión Fallida ".$E->getMessage();
            }
        }
        public function ejecutar($sql){ 
            $this->conexion->exec($sql);
            return $this->conexion->lastInsertId();
        }
        //funcion para leer registros (recibe un parámetro con la consulta SQL).
        public function consultar($sql){
            $result=$this->conexion->prepare($sql);
            $result->execute();
            return $result->fetchAll();
        }
        public function cerrar(){
            $this->conexion=null;
        }
    }
   
?>