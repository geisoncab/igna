<?php

    require '../config/conexion.php';

    class CentralCensarMiembroInfoEclesial{
        
        public function ConsultarTodo($idmiembro){
            $conexion = new Conexion();
            $sql = "SELECT * FROM tb_informacion_eclesial ORDER BY 1 DESC";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            $stmt->execute();
            // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function ConsultarPorId($idinformacioneclesial){
            $conexion = new Conexion();
            $sql="SELECT * FROM  tb_informacion_eclesial WHERE idinformacioneclesial=:idinformacioneclesial";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idinformacioneclesial", $idinformacioneclesial, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function Guardar($idmiembro, $es_dedicado, $asiste_regularmente, $acepto_cristo, $es_bautizado, 
                                $fecha_bautizo, $iglesia_bautizo, $miembro_esta_iglesia, $miembro_otra_iglesia, 
                                $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "INSERT INTO  tb_informacion_eclesial(idmiembro, es_dedicado, asiste_regularmente, acepto_cristo, es_bautizado, 
                                                        fecha_bautizo, iglesia_bautizo, miembro_esta_iglesia, miembro_otra_iglesia, 
                                                        estado, usuario_creo, fecha_creo, usuario_modifico, fecha_modifico) 
                    VALUES(:idmiembro, :es_dedicado, :asiste_regularmente, :acepto_cristo, :es_bautizado, 
                            :fecha_bautizo, UPPER(:iglesia_bautizo), :miembro_esta_iglesia, :miembro_otra_iglesia, 
                            1, :usuario_creo, :fecha_creo, :usuario_modifico, :fecha_modifico)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            $stmt->bindValue(":es_dedicado", $es_dedicado, PDO::PARAM_STR);
            $stmt->bindValue(":asiste_regularmente", $asiste_regularmente, PDO::PARAM_STR);
            $stmt->bindValue(":acepto_cristo", $acepto_cristo, PDO::PARAM_STR);
            $stmt->bindValue(":es_bautizado", $es_bautizado, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_bautizo", $fecha_bautizo, PDO::PARAM_STR);
            $stmt->bindValue(":iglesia_bautizo", $iglesia_bautizo, PDO::PARAM_STR);
            $stmt->bindValue(":miembro_esta_iglesia", $miembro_esta_iglesia, PDO::PARAM_STR);
            $stmt->bindValue(":miembro_otra_iglesia", $miembro_otra_iglesia, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_creo", $usuario_creo, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_creo", $fecha_creo, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);
            
            return $stmt->execute();
        }

        

        public function Modificar($idinformacioneclesial, $idmiembro, $es_dedicado, $asiste_regularmente, $acepto_cristo,
                                    $es_bautizado, $fecha_bautizo, $iglesia_bautizo, $miembro_esta_iglesia, 
                                    $miembro_otra_iglesia, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "UPDATE  tb_informacion_eclesial SET
                    idmiembro = :idmiembro,
                    es_dedicado = :es_dedicado,
                    asiste_regularmente= :asiste_regularmente,
                    acepto_cristo = :acepto_cristo,
                    es_bautizado = :es_bautizado, 
                    fecha_bautizo = :fecha_bautizo,
                    iglesia_bautizo= UPPER(:iglesia_bautizo),
                    miembro_esta_iglesia = :miembro_esta_iglesia,
                    miembro_otra_iglesia = :miembro_otra_iglesia,
                    usuario_modifico = :usuario_modifico,
                    fecha_modifico =:fecha_modifico
                    WHERE
                    idinformacioneclesial = :idinformacioneclesial";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            $stmt->bindValue(":es_dedicado", $es_dedicado, PDO::PARAM_STR);
            $stmt->bindValue(":asiste_regularmente", $asiste_regularmente, PDO::PARAM_STR);
            $stmt->bindValue(":acepto_cristo", $acepto_cristo, PDO::PARAM_STR);
            $stmt->bindValue(":es_bautizado", $es_bautizado, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_bautizo", $fecha_bautizo, PDO::PARAM_STR);
            $stmt->bindValue(":iglesia_bautizo", $iglesia_bautizo, PDO::PARAM_STR);
            $stmt->bindValue(":miembro_esta_iglesia", $miembro_esta_iglesia, PDO::PARAM_STR);
            $stmt->bindValue(":miembro_otra_iglesia", $miembro_otra_iglesia, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":idinformacioneclesial", $idinformacioneclesial, PDO::PARAM_INT);
            
            return $stmt->execute();
        }

        public function Eliminar($idinformacioneclesial){
            $conexion = new Conexion();
            $sql = "DELETE FROM  tb_informacion_eclesial WHERE idinformacioneclesial = :idinformacioneclesial";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idinformacioneclesial", $idinformacioneclesial, PDO::PARAM_INT);

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