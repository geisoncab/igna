<?php

    require '../config/conexion.php';

    class ControlUsuarios{
        
        public function ConsultarTodo(){
            $conexion = new Conexion();
            $sql = "SELECT
                    usr.idusuario,
                    mbr.nombre AS miembro,
                    usr.nombre_usuario,
                    usr.nivel
                    FROM tb_usuario usr
                    INNER JOIN tb_miembro mbr
                    ON mbr.idmiembro = usr.idmiembro
                    ORDER BY mbr.nombre ASC";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function ConsultarPorId($idusuario){ //revisar
            $conexion = new Conexion();
            $sql = "SELECT
                    usr.idusuario,
                    mbr.idmiembro,
                    mbr.nombre AS miembro,
                    usr.nombre_usuario,
                    AES_DECRYPT(usr.clave, 'iGn@') AS clave,
                    usr.nivel
                    FROM tb_usuario usr
                    INNER JOIN tb_miembro mbr
                    ON mbr.idmiembro = usr.idmiembro
                    WHERE usr.idusuario=:idusuario";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idusuario", $idusuario, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        //revisar
        public function Guardar($idmiembro, $nombre_usuario, $clave, $nivel, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "INSERT INTO tb_usuario(idmiembro, nombre_usuario, clave, estado, usuario_creo, fecha_creo, usuario_modifico, fecha_modifico) 
                    VALUES(:idmiembro, :nombre_usuario, AES_ENCRYPT(:clave, 'iGn@'), 1, :usuario_creo, :fecha_creo, :usuario_modifico, :fecha_modifico)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            $stmt->bindValue(":nombre_usuario", $nombre_usuario, PDO::PARAM_STR);
            $stmt->bindValue(":clave", $clave, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_creo", $usuario_creo, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_creo", $fecha_creo, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);

            return $stmt->execute();
        }

        
        //revisar
        public function Modificar($idusuario, $idmiembro, $nombre_usuario, $clave, $nivel, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "UPDATE tb_usuario SET
                    idmiembro = :idmiembro,
                    nombre_usuario = :nombre_usuario,
                    clave = AES_ENCRYPT(:clave, 'iGn@'),
                    usuario_modifico = :usuario_modifico,
                    fecha_modifico =:fecha_modifico
                    WHERE
                    idusuario = :idusuario";
                    
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            $stmt->bindValue(":nombre_usuario", $nombre_usuario, PDO::PARAM_STR);
            $stmt->bindValue(":clave", $clave, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":idusuario", $idusuario, PDO::PARAM_INT);
            // var_dump($conexion->prepare($sql));
            return $stmt->execute();
        }

        //revisar
        public function Eliminar($idusuario){
            $conexion = new Conexion();
            $sql = "DELETE FROM tb_usuario WHERE idusuario = :idusuario";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idusuario", $idusuario, PDO::PARAM_INT);

            return $stmt->execute();
        }

        public function autocomplete_miembros(){
            $conexion = new Conexion();
            $sql = "SELECT idmiembro, nombre FROM tb_miembro";
            // $sql = "SELECT idocupaciones, nombre FROM tb_ocupaciones";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function verificarUsuarioExiste($nombre_usuario){ //revisar
            $conexion = new Conexion();
            $sql = "SELECT
                    COUNT(*) AS usuarios_existentes
                    FROM tb_usuario
                    WHERE UPPER(nombre_usuario) = UPPER(:nombre_usuario)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":nombre_usuario", $nombre_usuario, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
    }
?>