<?php

    require '../config/conexion.php';

    class CargosComisiones{
        
        public function ConsultarTodo(){
            $conexion = new Conexion();
            $sql="SELECT * FROM tb_cargos_comisiones ORDER BY nombre ASC";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function ConsultarPorId($idcargoscomisiones){
            $conexion = new Conexion();
            $sql="SELECT * FROM tb_cargos_comisiones WHERE idcargoscomisiones=:idcargoscomisiones";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idcargoscomisiones", $idcargoscomisiones, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function Guardar($nombre, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "INSERT INTO tb_cargos_comisiones(nombre, estado, usuario_creo, fecha_creo, usuario_modifico, fecha_modifico) 
                    VALUES(UPPER(:nombre), 1, :usuario_creo, :fecha_creo, :usuario_modifico, :fecha_modifico)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_creo", $usuario_creo, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_creo", $fecha_creo, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);

            return $stmt->execute();
        }

        

        public function Modificar($idcargoscomisiones, $nombre, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "UPDATE tb_cargos_comisiones SET
                    nombre = UPPER(:nombre),
                    usuario_modifico = :usuario_modifico,
                    fecha_modifico =:fecha_modifico
                    WHERE
                    idcargoscomisiones = :idcargoscomisiones";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":idcargoscomisiones", $idcargoscomisiones, PDO::PARAM_INT);
            
            return $stmt->execute();
        }

        public function Eliminar($idcargoscomisiones){
            $conexion = new Conexion();
            $sql = "DELETE FROM tb_cargos_comisiones WHERE idcargoscomisiones = :idcargoscomisiones";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idcargoscomisiones", $idcargoscomisiones, PDO::PARAM_INT);

            return $stmt->execute();
        }


    }
?>