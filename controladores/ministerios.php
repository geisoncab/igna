<?php
    ob_start();
    session_start();
    require '../modelos/Ministerios.php';

    //si trae algún valor por post

    if($_POST){
        
        //(si trae)instancia instancia
        $instancia = new Ministerios();

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
                        "1"=>'<button class="btn btn-light" onClick="ConsultarPorId('. $reg->idministerios .');"><i class="fas fa-eye"></i></button>'.
                            '<button class="btn btn-light" onClick="Eliminar('. $reg->idministerios .');"><i class="fa fa-trash"></i></button>'
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
		
                $idministerios=$_POST['idministerios'];
                $rspta=$instancia->ConsultarPorId($idministerios);
        
                echo json_encode($rspta);
            break;

            case "GUARDAR":
                $idministerios=$_POST['idministerios'];
                $nombre=$_POST['nombre'];
        
                if(empty($idministerios)){
                    //insert
                    $respuesta = $instancia->Guardar($nombre, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_REGISTRO' : 'FAIL_REGISTRO';
                }else{
                    //update
                    $respuesta = $instancia->Modificar($idministerios, $nombre, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_EDITAR' : 'FAIL_EEDITAR';
                }
                
            break;

            case "ELIMINAR":
                $idministerios=$_POST['idministerios'];
                $respuesta = $instancia->Eliminar($idministerios);
                echo $respuesta ? 'OK' : 'FAIL';
            break;
        }
    }
    ob_end_flush();
?>