<?php

    require '../config/conexion.php';

    class Ministerios{
        
        public function ConsultarTodo(){
            $conexion = new Conexion();
            $sql="SELECT * FROM tb_ministerios ORDER BY nombre ASC";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function ConsultarPorId($idministerios){
            $conexion = new Conexion();
            $sql="SELECT * FROM tb_ministerios WHERE idministerios=:idministerios";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idministerios", $idministerios, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function Guardar($nombre, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "INSERT INTO tb_ministerios(nombre, estado, usuario_creo, fecha_creo, usuario_modifico, fecha_modifico) 
                    VALUES(UPPER(:nombre), 1, :usuario_creo, :fecha_creo, :usuario_modifico, :fecha_modifico)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_creo", $usuario_creo, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_creo", $fecha_creo, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);

            return $stmt->execute();
        }

        

        public function Modificar($idministerios, $nombre, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "UPDATE tb_ministerios SET
                    nombre = UPPER(:nombre),
                    usuario_modifico = :usuario_modifico,
                    fecha_modifico =:fecha_modifico
                    WHERE
                    idministerios = :idministerios";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":idministerios", $idministerios, PDO::PARAM_INT);
            
            return $stmt->execute();
        }

        public function Eliminar($idministerios){
            $conexion = new Conexion();
            $sql = "DELETE FROM tb_ministerios WHERE idministerios = :idministerios";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idministerios", $idministerios, PDO::PARAM_INT);

            return $stmt->execute();
        }


    }
?>