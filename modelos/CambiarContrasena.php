<?php

    require '../config/conexion.php';

    class CambiarContrasena{

        public function verificarContrasenaActual($nombre_usuario, $clave){ //revisar
            
            $conexion = new Conexion();
            $sql = "SELECT
                    IF( 
                        AES_DECRYPT(usr.clave, 'iGn@') = :clave , 'CORRECTO', 'INCORRECTO'
                    ) AS password_compare
                    FROM tb_usuario usr
                    WHERE UPPER(usr.nombre_usuario) = UPPER(:nombre_usuario)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":nombre_usuario", $nombre_usuario, PDO::PARAM_STR);
            $stmt->bindValue(":clave", $clave, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function guardarNuevaContrasena($nombre_usuario, $clave){
            $conexion = new Conexion();
            $sql = "UPDATE tb_usuario SET
                    clave = AES_ENCRYPT(:clave, 'iGn@')
                    WHERE
                    nombre_usuario = :nombre_usuario";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":clave", $clave, PDO::PARAM_STR);
            $stmt->bindValue(":nombre_usuario", $nombre_usuario, PDO::PARAM_STR);
            // var_dump($conexion->prepare($sql));
            return $stmt->execute();
        }

    }
?>