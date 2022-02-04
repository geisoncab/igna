<?php
    ob_start();
    session_start();
    require '../modelos/Ocupaciones.php';

    //si trae algún valor por post

    if($_POST){
        
        //(si trae)instancia instancia
        $instancia = new Ocupaciones();

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
                        "1"=>'<button class="btn btn-light" onClick="ConsultarPorId('. $reg->idocupaciones .');"><i class="fas fa-eye"></i></button>'.
                            '<button class="btn btn-light" onClick="Eliminar('. $reg->idocupaciones .');"><i class="fa fa-trash"></i></button>'
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
		
                $idocupaciones=$_POST['idocupaciones'];
                $rspta=$instancia->ConsultarPorId($idocupaciones);
        
                echo json_encode($rspta);
            break;

            case "GUARDAR":
                $idocupaciones=$_POST['idocupaciones'];
                $nombre=$_POST['nombre'];
        
                if(empty($idocupaciones)){
                    //insert
                    $respuesta = $instancia->Guardar($nombre, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_REGISTRO' : 'FAIL_REGISTRO';
                }else{
                    //update
                    $respuesta = $instancia->Modificar($idocupaciones, $nombre, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_EDITAR' : 'FAIL_EEDITAR';
                }
                
            break;

            case "ELIMINAR":
                $idocupaciones=$_POST['idocupaciones'];
                $respuesta = $instancia->Eliminar($idocupaciones);
                echo $respuesta ? 'OK' : 'FAIL';
            break;
        }
    }
    ob_end_flush();
?>