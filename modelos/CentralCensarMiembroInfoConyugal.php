<?php

    require '../config/conexion.php';

    class CentralCensarMiembroInfoConyugal{
        
        public function ConsultarTodo($idmiembro){
            $conexion = new Conexion();
            $sql = "SELECT
                    infc.idinformacionconyugal,
                    CONCAT(mbr.nombre, ', ', mbr_conyuge.nombre) AS informacion_pareja
                    FROM tb_informacion_conyugal infc
                    INNER JOIN tb_miembro mbr
                    ON mbr.idmiembro = infc.idmiembro
                    INNER JOIN (
                        SELECT
                        mbr.idmiembro,
                        mbr.nombre
                        FROM tb_miembro mbr
                    ) mbr_conyuge
                    ON mbr_conyuge.idmiembro = infc.idmiembro_conyuge
                    WHERE
                    mbr.idmiembro = :idmiembro OR mbr_conyuge.idmiembro = :idmiembro";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            $stmt->execute();
            // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // public function ConsultarPorId($idinformacionconyugal){
        //     $conexion = new Conexion();
        //     $sql="SELECT * FROM tb_informacion_conyugal WHERE idinformacionconyugal=:idinformacionconyugal";
        //     $stmt = $conexion->prepare($sql);
        //     $stmt->bindValue(":idinformacionconyugal", $idinformacionconyugal, PDO::PARAM_INT);
        //     $stmt->execute();
        //     return $stmt->fetch(PDO::FETCH_OBJ);
        // }

        public function Guardar($idmiembro, $idmiembro_conyuge, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "INSERT INTO tb_informacion_conyugal(idmiembro, idmiembro_conyuge, estado, usuario_creo, fecha_creo, usuario_modifico, fecha_modifico) 
                    VALUES(:idmiembro, :idmiembro_conyuge, 1, :usuario_creo, :fecha_creo, :usuario_modifico, :fecha_modifico)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            $stmt->bindValue(":idmiembro_conyuge", $idmiembro_conyuge, PDO::PARAM_INT);
            $stmt->bindValue(":usuario_creo", $usuario_creo, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_creo", $fecha_creo, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);
            
            return $stmt->execute();
        }

        

        public function Modificar($idinformacionconyugal, $nombre, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "UPDATE tb_informacion_conyugal SET
                    nombre = UPPER(:nombre),
                    usuario_modifico = :usuario_modifico,
                    fecha_modifico =:fecha_modifico
                    WHERE
                    idinformacionconyugal = :idinformacionconyugal";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":idinformacionconyugal", $idinformacionconyugal, PDO::PARAM_INT);
            
            return $stmt->execute();
        }

        public function Eliminar($idinformacionconyugal){
            $conexion = new Conexion();
            $sql = "DELETE FROM tb_informacion_conyugal WHERE idinformacionconyugal = :idinformacionconyugal";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idinformacionconyugal", $idinformacionconyugal, PDO::PARAM_INT);

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

        public function autocomplete_miembros(){
            $conexion = new Conexion();
            $sql = "SELECT idmiembro, nombre FROM tb_miembro";
            // $sql = "SELECT idocupaciones, nombre FROM tb_ocupaciones";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

    }
?>