<?php
    require '../config/conexion.php';

    class Login{

        public function verificarUsuario($usuario, $clave){
            $conexion = new Conexion();

            $sql = "SELECT
                    usr.nombre_usuario,
                    usr.nivel,
                    m.nombre AS nombre_miembro
                    FROM tb_usuario usr
                    INNER JOIN tb_miembro m
                    ON usr.idmiembro = m.idmiembro 
                    WHERE 
                    usr.nombre_usuario = :usuario 
                    AND 
                    AES_DECRYPT(usr.clave, 'iGn@') = :clave";

            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":usuario", $usuario, PDO::PARAM_STR);
            $stmt->bindValue(":clave", $clave, PDO::PARAM_STR);
            $stmt->execute();
            // var_dump($stmt);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
    }
?>