<?php

    require '../config/conexion.php';

    class CentralCensarMiembroInfoFamiliar{
        
        public function ConsultarTodo($idmiembro){
            $conexion = new Conexion();
            $sql = "SELECT
                    inff.idinformacionfamiliar,
                    mbr.idmiembro,
                    mbr.nombre AS nombre_miembro,
                    mbr_papa.idmiembro AS idmiembro_papa,
                    mbr_papa.nombre AS nombre_miembro_papa,
                    mbr_mama.idmiembro AS idmiembro_mama,
                    mbr_mama.nombre AS nombre_miembro_mama
                    FROM tb_informacion_familiar inff
                    INNER JOIN tb_miembro mbr
                    ON mbr.idmiembro = inff.idmiembro
                    INNER JOIN (
                        SELECT
                        mbr.idmiembro,
                        mbr.nombre
                        FROM tb_miembro mbr
                    ) mbr_papa
                    ON mbr_papa.idmiembro = inff.idmiembro_papa
                    INNER JOIN (
                        SELECT
                        mbr.idmiembro,
                        mbr.nombre
                        FROM tb_miembro mbr
                    ) mbr_mama
                    ON mbr_mama.idmiembro = inff.idmiembro_mama
                    WHERE
                    mbr.idmiembro = :idmiembro";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            $stmt->execute();
            // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // public function ConsultarPorId($idinformacionfamiliar){
        //     $conexion = new Conexion();
        //     $sql="SELECT * FROM tb_informacion_familiar WHERE idinformacionfamiliar=:idinformacionfamiliar";
        //     $stmt = $conexion->prepare($sql);
        //     $stmt->bindValue(":idinformacionfamiliar", $idinformacionfamiliar, PDO::PARAM_INT);
        //     $stmt->execute();
        //     return $stmt->fetch(PDO::FETCH_OBJ);
        // }

        public function Guardar($idmiembro, $idmiembro_papa, $idmiembro_mama, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "INSERT INTO tb_informacion_familiar(idmiembro, idmiembro_papa, idmiembro_mama, estado, usuario_creo, fecha_creo, usuario_modifico, fecha_modifico) 
                    VALUES(:idmiembro, :idmiembro_papa, :idmiembro_mama, 1, :usuario_creo, :fecha_creo, :usuario_modifico, :fecha_modifico)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            $stmt->bindValue(":idmiembro_papa", $idmiembro_papa, PDO::PARAM_INT);
            $stmt->bindValue(":idmiembro_mama", $idmiembro_mama, PDO::PARAM_INT);
            $stmt->bindValue(":usuario_creo", $usuario_creo, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_creo", $fecha_creo, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);
            
            return $stmt->execute();
        }

        

        // public function Modificar($idinformacionfamiliar, $nombre, $usuario_modifico, $fecha_modifico){
        //     $conexion = new Conexion();
        //     $sql = "UPDATE tb_informacion_familiar SET
        //             nombre = UPPER(:nombre),
        //             usuario_modifico = :usuario_modifico,
        //             fecha_modifico =:fecha_modifico
        //             WHERE
        //             idinformacionfamiliar = :idinformacionfamiliar";
        //     $stmt = $conexion->prepare($sql);
        //     $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
        //     $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
        //     $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);
        //     $stmt->bindValue(":idinformacionfamiliar", $idinformacionfamiliar, PDO::PARAM_INT);
            
        //     return $stmt->execute();
        // }

        public function Eliminar($idinformacionfamiliar){
            $conexion = new Conexion();
            $sql = "DELETE FROM tb_informacion_familiar WHERE idinformacionfamiliar = :idinformacionfamiliar";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idinformacionfamiliar", $idinformacionfamiliar, PDO::PARAM_INT);

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

        public function autocomplete_papa(){
            $conexion = new Conexion();
            $sql = "SELECT idmiembro, nombre FROM tb_miembro WHERE genero='MASCULINO'";
            // $sql = "SELECT idocupaciones, nombre FROM tb_ocupaciones";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        public function autocomplete_mama(){
            $conexion = new Conexion();
            $sql = "SELECT idmiembro, nombre FROM tb_miembro WHERE genero='FEMENINO'";
            // $sql = "SELECT idocupaciones, nombre FROM tb_ocupaciones";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function get_conyuge($idmiembro){
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

        public function get_hijos($idmiembro){
            $conexion = new Conexion();
            $sql = "SELECT
                    inff.idinformacionfamiliar,
                    mbr.idmiembro AS idmiembro_hijo,
                    mbr.nombre AS nombre_hijo,
                    mbr_papa.idmiembro AS idmiembro_papa,
                    mbr_papa.nombre AS nombre_miembro_papa,
                    mbr_mama.idmiembro AS idmiembro_mama,
                    mbr_mama.nombre AS nombre_miembro_mama
                    FROM tb_informacion_familiar inff
                    INNER JOIN tb_miembro mbr
                    ON mbr.idmiembro = inff.idmiembro
                    INNER JOIN (
                        SELECT
                        mbr.idmiembro,
                        mbr.nombre
                        FROM tb_miembro mbr
                    ) mbr_papa
                    ON mbr_papa.idmiembro = inff.idmiembro_papa
                    INNER JOIN (
                        SELECT
                        mbr.idmiembro,
                        mbr.nombre
                        FROM tb_miembro mbr
                    ) mbr_mama
                    ON mbr_mama.idmiembro = inff.idmiembro_mama
                    WHERE
                    mbr_papa.idmiembro = :idmiembro OR mbr_mama.idmiembro=:idmiembro";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            $stmt->execute();
            // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

    }
?>