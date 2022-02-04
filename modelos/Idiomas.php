<?php

    require '../config/conexion.php';

    class Idiomas{
        
        public function ConsultarTodo(){
            $conexion = new Conexion();
            $sql="SELECT * FROM  tb_idiomas ORDER BY nombre ASC";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function ConsultarPorId($ididiomas){
            $conexion = new Conexion();
            $sql="SELECT * FROM tb_idiomas WHERE ididiomas=:ididiomas";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":ididiomas", $ididiomas, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function Guardar($nombre, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "INSERT INTO tb_idiomas(nombre, estado, usuario_creo, fecha_creo, usuario_modifico, fecha_modifico) 
                    VALUES(UPPER(:nombre), 1, :usuario_creo, :fecha_creo, :usuario_modifico, :fecha_modifico)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_creo", $usuario_creo, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_creo", $fecha_creo, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);

            return $stmt->execute();
        }

        

        public function Modificar($ididiomas, $nombre, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "UPDATE tb_idiomas SET
                    nombre = UPPER(:nombre),
                    usuario_modifico = :usuario_modifico,
                    fecha_modifico =:fecha_modifico
                    WHERE
                    ididiomas = :ididiomas";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":ididiomas", $ididiomas, PDO::PARAM_INT);
            
            return $stmt->execute();
        }

        public function Eliminar($ididiomas){
            $conexion = new Conexion();
            $sql = "DELETE FROM tb_idiomas WHERE ididiomas = :ididiomas";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":ididiomas", $ididiomas, PDO::PARAM_INT);

            return $stmt->execute();
        }


    }
?>