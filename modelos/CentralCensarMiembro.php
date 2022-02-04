<?php

    require '../config/conexion.php';

    class CentralCensarMiembro{
        
        public function ConsultarTodo(){
            $conexion = new Conexion();
            $sql = "SELECT
                    mbr.idmiembro,
                    mbr.foto,
                    mbr.cui,
                    mbr.nombre,
                    CONCAT(bcfa.nombre, ', ',mun.nombre, ', ', dep.nombre) AS direccion,
                    mbr.telefono
                    FROM tb_miembro mbr
                    INNER JOIN tb_barrio_caserio_finca_aldea bcfa
                    ON bcfa.idbcfa = mbr.idbcfa
                    INNER JOIN tb_municipios mun
                    ON mun.idmunicipios = bcfa.idmunicipios
                    INNER JOIN tb_departamentos dep
                    ON dep.iddepartamentos = mun.iddepartamentos
                    ORDER BY nombre ASC";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function ConsultarPorId($idmiembro){
            $conexion = new Conexion();
            // $sql = "SELECT * FROM tb_miembro WHERE idmiembro=:idmiembro";
            $sql = "SELECT
                    mbr.idmiembro,
                    mbr.foto,
                    mbr.cui,
                    mbr.nombre,
                    mbr.fecha_nacimiento,
                    mbr.genero,
                    mbr.idestadocivil,
                    bcfa.idbcfa,
                    CONCAT(bcfa.nombre, ', ',mun.nombre, ', ', dep.nombre) AS direccion,
                    mbr.referencia,
                    mbr.telefono,
                    ocp.idocupaciones,
                    ocp.nombre AS ocupacion
                    FROM tb_miembro mbr
                    INNER JOIN tb_barrio_caserio_finca_aldea bcfa
                    ON bcfa.idbcfa = mbr.idbcfa
                    INNER JOIN tb_municipios mun
                    ON mun.idmunicipios = bcfa.idmunicipios
                    INNER JOIN tb_departamentos dep
                    ON dep.iddepartamentos = mun.iddepartamentos
                    INNER JOIN tb_ocupaciones ocp
                    ON ocp.idocupaciones = mbr.idocupaciones
                    WHERE mbr.idmiembro=:idmiembro";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function Guardar($foto, $cui, $nombre, $fecha_nacimiento, $genero, $idestadocivil, $idbcfa, $referencia, $telefono, $idocupaciones,
                                $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "INSERT INTO tb_miembro(foto, cui, nombre, fecha_nacimiento, genero, idestadocivil, idbcfa, referencia, telefono, idocupaciones,
                                            estado, usuario_creo, fecha_creo, usuario_modifico, fecha_modifico) 
                    VALUES(:foto, :cui, UPPER(:nombre), :fecha_nacimiento, UPPER(:genero), :idestadocivil, :idbcfa, UPPER(:referencia), :telefono, :idocupaciones,
                            1, :usuario_creo, :fecha_creo, :usuario_modifico, :fecha_modifico)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":foto", $foto, PDO::PARAM_STR);
            $stmt->bindValue(":cui", $cui, PDO::PARAM_STR);
            $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_nacimiento", $fecha_nacimiento, PDO::PARAM_STR);
            $stmt->bindValue(":genero", $genero, PDO::PARAM_STR);
            $stmt->bindValue(":idestadocivil", $idestadocivil, PDO::PARAM_INT);
            $stmt->bindValue(":idbcfa", $idbcfa, PDO::PARAM_INT);
            $stmt->bindValue(":referencia", $referencia, PDO::PARAM_STR);
            $stmt->bindValue(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindValue(":idocupaciones", $idocupaciones, PDO::PARAM_INT);
            $stmt->bindValue(":usuario_creo", $usuario_creo, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_creo", $fecha_creo, PDO::PARAM_STR);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);
            $stmt->execute();
            // return $stmt->execute();
            return $conexion->lastInsertId();
            
        }

        public function Modificar($idmiembro, $foto, $cui, $nombre, $fecha_nacimiento, $genero, $idestadocivil, $idbcfa, $referencia, $telefono, $idocupaciones,
                                    $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            $sql = "UPDATE tb_miembro SET
                    foto = :foto,
                    cui = :cui,
                    nombre = UPPER(:nombre),
                    fecha_nacimiento = :fecha_nacimiento,
                    genero = UPPER(:genero),
                    idestadocivil = :idestadocivil,
                    idbcfa = :idbcfa,
                    referencia = UPPER(:referencia),
                    telefono = :telefono,
                    idocupaciones = :idocupaciones,
                    usuario_modifico = :usuario_modifico,
                    fecha_modifico =:fecha_modifico
                    WHERE
                    idmiembro = :idmiembro";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":foto", $foto, PDO::PARAM_STR);
            $stmt->bindValue(":cui", $cui, PDO::PARAM_STR);
            $stmt->bindValue(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_nacimiento", $fecha_nacimiento, PDO::PARAM_STR);
            $stmt->bindValue(":genero", $genero, PDO::PARAM_STR);
            $stmt->bindValue(":idestadocivil", $idestadocivil, PDO::PARAM_INT);
            $stmt->bindValue(":idbcfa", $idbcfa, PDO::PARAM_INT);
            $stmt->bindValue(":referencia", $referencia, PDO::PARAM_STR);
            $stmt->bindValue(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindValue(":idocupaciones", $idocupaciones, PDO::PARAM_INT);
            $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            
            return $stmt->execute();
        }

        public function Eliminar($idmiembro){
            $conexion = new Conexion();
            $sql = "DELETE FROM tb_miembro WHERE idmiembro = :idmiembro";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);

            return $stmt->execute();
        }

        public function autocomplete_direcciones(){
            $conexion = new Conexion();
            $sql = "SELECT
                    bcfa.idbcfa,
                    CONCAT(bcfa.nombre, ', ',mun.nombre, ', ', dep.nombre) AS direccion
                    FROM tb_barrio_caserio_finca_aldea bcfa
                    INNER JOIN tb_municipios mun
                    ON mun.idmunicipios = bcfa.idmunicipios
                    INNER JOIN tb_departamentos dep
                    ON dep.iddepartamentos = mun.iddepartamentos
                    ORDER BY bcfa.nombre ASC";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        public function autocomplete_ocupaciones(){
            $conexion = new Conexion();
            $sql = "SELECT * FROM tb_ocupaciones ORDER BY nombre ASC";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function get_idiomas(){
            $conexion = new Conexion();
            $sql = "SELECT
                    *
                    FROM tb_idiomas
                    ORDER BY ididiomas ASC";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function get_estadocivil(){
            $conexion = new Conexion();
            $sql = "SELECT
                    *
                    FROM tb_estadocivil
                    ORDER BY idestadocivil ASC";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function registrar_idiomas($ididiomas, $idmiembro, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico){
            $conexion = new Conexion();
            
            //1. Creamos un contador de posiciones para recorrer el array de pesos
            $posicionarray = 0;

            //2. Contamos cuantos registros vamos a procesar
            $cantidadRegistros_aRecorrer = 0;
            $cantidadRegistros_aRecorrer = count($ididiomas);
            $sw=true;

            //3. Utilizamos un ciclo para recorrer el los registros a procesar
            while($posicionarray < $cantidadRegistros_aRecorrer){
                $sql = "INSERT INTO tb_registro_idiomas(ididiomas, idmiembro, estado, usuario_creo, fecha_creo, usuario_modifico, fecha_modifico) 
                        VALUES(:ididiomas, :idmiembro, 1, :usuario_creo, :fecha_creo, :usuario_modifico, :fecha_modifico)";
                
                $stmt = $conexion->prepare($sql);
                $stmt->bindValue(":ididiomas", $ididiomas[$posicionarray], PDO::PARAM_INT);
                $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
                $stmt->bindValue(":usuario_creo", $usuario_creo, PDO::PARAM_STR);
                $stmt->bindValue(":fecha_creo", $fecha_creo, PDO::PARAM_STR);
                $stmt->bindValue(":usuario_modifico", $usuario_modifico, PDO::PARAM_STR);
                $stmt->bindValue(":fecha_modifico", $fecha_modifico, PDO::PARAM_STR);
                
                $stmt->execute() or $sw = false;
                
                $posicionarray++;
                
            };

            return $sw;            
            
        }

        public function get_idiomasmiembro($idmiembro){
            $conexion = new Conexion();
            $sql = "SELECT
                    mbr.idmiembro,
                    mbr.nombre As miembro,
                    idi.ididiomas,
                    idi.nombre AS idiomas
                    FROM tb_registro_idiomas regi
                    INNER JOIN tb_miembro mbr
                    ON mbr.idmiembro = regi.idmiembro
                    INNER JOIN tb_idiomas idi
                    ON idi.ididiomas = regi.ididiomas
                    WHERE mbr.idmiembro=:idmiembro";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }


        public function borrar_antiguosidiomas($idmiembro){
            $conexion = new Conexion();
            $sql = "DELETE FROM tb_registro_idiomas WHERE idmiembro = :idmiembro";
            $stmt = $conexion->prepare($sql);
            $stmt->bindValue(":idmiembro", $idmiembro, PDO::PARAM_INT);

            return $stmt->execute();
        }
    }
?>