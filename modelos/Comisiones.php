<?php

    require '../config/conexion.php';

    class Comisiones{
        
        public function ConsultarTodo($idministerios){
            $conexion = new Conexion();
            $sql = "SELECT
                    co.idcomisiones,
                    co.nombre AS comision,
                    mi.nombre AS ministerio
                    FROM tb_comisiones co
                    INNER JOIN tb_ministerios mi
                    ON mi.idministerios = co.idministerios
                    WHERE co.idministerios = :idministerios
                    ORDER BY co.nombre ASC";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idministerios", $idministerios, PDO::PARAM_INT);
            $stmt->execute();
            // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function ConsultarPorId($idcomisiones){
            $conexion = new Conexion();
            $sql = "SELECT * FROM tb_comisiones WHERE idcomisiones=:idcomisiones";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idcomisiones", $idcomisiones, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function Guardar($idministerios, $nombre, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "INSERT INTO tb_comisiones(idministerios, nombre, estado, usuario_creo, fecha_creo, usuario_modifico, fecha_modifico) 
                    VALUES(:idministerios, UPPER(:nombre), 1, :usuario_creo, :fecha_creo, :usuario_modifico, :fecha_modifico)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idministerios", $idministerios, PDO::PARAM_INT);
            $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_creo", $usuario_creo, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_creo", $fecha_creo, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);

            return $stmt->execute();
        }

        

        public function Modificar($idcomisiones, $idministerios, $nombre, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "UPDATE tb_comisiones SET
                    idministerios = :idministerios,
                    nombre = UPPER(:nombre),
                    usuario_modifico = :usuario_modifico,
                    fecha_modifico =:fecha_modifico
                    WHERE
                    idcomisiones = :idcomisiones";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idministerios", $idministerios, PDO::PARAM_INT);
            $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":idcomisiones", $idcomisiones, PDO::PARAM_INT);
            
            return $stmt->execute();
        }

        public function Eliminar($idcomisiones){
            $conexion = new Conexion();
            $sql = "DELETE FROM tb_comisiones WHERE idcomisiones = :idcomisiones";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idcomisiones", $idcomisiones, PDO::PARAM_INT);

            return $stmt->execute();
        }

        // public function selectMinisterios(){
        //     $conexion = new Conexion();
        //     $sql="SELECT * FROM tb_ministerios WHERE estado = 1";
        //     $stmt = $conexion->prepare($sql);
        //     $stmt->execute();
        //     // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
        //     return $stmt->fetchAll(PDO::FETCH_OBJ);
        // }

        public function mostrarInformacionMinisterio($idministerios){
            $conexion = new Conexion();
            $sql = "SELECT * FROM tb_ministerios WHERE idministerios = :idministerios";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idministerios", $idministerios, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

    }
?>