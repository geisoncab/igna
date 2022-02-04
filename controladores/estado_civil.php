<?php
    ob_start();
    session_start();
    require '../modelos/EstadoCivil.php';

    //si trae algún valor por post

    if($_POST){
        
        //(si trae)instancia instancia
        $instancia = new EstadoCivil();

        $usuario_creo = $_SESSION['usuario'];
        $fecha_creo = date("Y-m-d H:i:s");
        $usuario_modifico = $usuario_creo;
        $fecha_modifico = date("Y-m-d H:i:s");

        switch($_POST["accion"]){

            case "CONSULTAR":

                $respuesta = $instancia->ConsultarTodo();
                $JSON_response = json_encode($respuesta);
                $rspta = json_decode($JSON_response);

                $data = Array();
                foreach($rspta AS $reg){
                    $data[]=array(
                        "0"=>$reg->nombre,
                        "1"=>'<button class="btn btn-light" onClick="ConsultarPorId('. $reg->idestadocivil .');"><i class="fas fa-eye"></i></button>'.
                            '<button class="btn btn-light" onClick="Eliminar('. $reg->idestadocivil .');"><i class="fa fa-trash"></i></button>'
                    );
                }
                $results = array(
                    "sEcho"=>1, //Información para el datatables
                    "iTotalRecords"=>count($data), //enviamos el total registros al datatable
                    "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
                    "aaData"=>$data);
                echo json_encode($results);
            break;

            case 'CONSULTAR_ID':
		
                $idestadocivil=$_POST['idestadocivil'];
                $rspta=$instancia->ConsultarPorId($idestadocivil);
        
                echo json_encode($rspta);
            break;

            case "GUARDAR":
                $idestadocivil=$_POST['idestadocivil'];
                $nombre=$_POST['nombre'];
        
                if(empty($idestadocivil)){
                    //insert
                    $respuesta = $instancia->Guardar($nombre, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_REGISTRO' : 'FAIL_REGISTRO';
                }else{
                    //update
                    $respuesta = $instancia->Modificar($idestadocivil, $nombre, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_EDITAR' : 'FAIL_EEDITAR';
                }
                
            break;

            case "ELIMINAR":
                $idestadocivil=$_POST['idestadocivil'];
                $respuesta = $instancia->Eliminar($idestadocivil);
                echo $respuesta ? 'OK' : 'FAIL';
            break;
        }
    }
    ob_end_flush();
?>