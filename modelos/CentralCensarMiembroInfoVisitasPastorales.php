<?php

    require '../config/conexion.php';

    class CentralCensarMiembroInfoVisitasPastorales{
        
        public function ConsultarTodo($idmiembro){
            $conexion = new Conexion();
            $sql = "SELECT * FROM tb_informacion_visitas_pastorales ORDER BY fecha_visita DESC";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            $stmt->execute();
            // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function ConsultarPorId($idvisitaspastorales){
            $conexion = new Conexion();
            $sql="SELECT * FROM  tb_informacion_visitas_pastorales WHERE idvisitaspastorales=:idvisitaspastorales";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idvisitaspastorales", $idvisitaspastorales, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function Guardar($idmiembro, $fecha_visita, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "INSERT INTO  tb_informacion_visitas_pastorales(idmiembro, fecha_visita, estado, usuario_creo, fecha_creo, usuario_modifico, fecha_modifico) 
                    VALUES(:idmiembro, :fecha_visita, 1, :usuario_creo, :fecha_creo, :usuario_modifico, :fecha_modifico)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            $stmt->bindValue(":fecha_visita", $fecha_visita, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_creo", $usuario_creo, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_creo", $fecha_creo, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);
            
            return $stmt->execute();
        }

        

        public function Modificar($idvisitaspastorales, $idmiembro, $fecha_visita, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "UPDATE  tb_informacion_visitas_pastorales SET
                    idmiembro = :idmiembro,
                    fecha_visita = :fecha_visita,
                    usuario_modifico = :usuario_modifico,
                    fecha_modifico =:fecha_modifico
                    WHERE
                    idvisitaspastorales = :idvisitaspastorales";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            $stmt->bindValue(":fecha_visita", $fecha_visita, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":idvisitaspastorales", $idvisitaspastorales, PDO::PARAM_INT);
            
            return $stmt->execute();
        }

        public function Eliminar($idvisitaspastorales){
            $conexion = new Conexion();
            $sql = "DELETE FROM  tb_informacion_visitas_pastorales WHERE idvisitaspastorales = :idvisitaspastorales";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idvisitaspastorales", $idvisitaspastorales, PDO::PARAM_INT);

            return $stmt->execute();
        }

        public function mostrarInformacionMiembro($idmiembro){
            $conexion = new Conexion();
            $sql = "SELECT
                    mbr.nombre,
                    mbr.telefono,
                    esc.nombre AS estado_civil,
                    CONCAT(bcfa.nombre, ', ',mun.nombre, ', ', dep.nombre) AS direccion
                    FROM tb_miembro mbr
                    INNER JOIN tb_estadocivil esc
                    ON esc.idestadocivil = mbr.idestadocivil
                    INNER JOIN tb_barrio_caserio_finca_aldea bcfa
                    ON bcfa.idbcfa = mbr.idbcfa
                    INNER JOIN tb_municipios mun
                    ON mun.idmunicipios = bcfa.idmunicipios
                    INNER JOIN tb_departamentos dep
                    ON dep.iddepartamentos = mun.iddepartamentos
                    WHERE
                    mbr.idmiembro = :idmiembro";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

    }
?>