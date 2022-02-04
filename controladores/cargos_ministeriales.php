<?php
    ob_start();
    session_start();
    require '../modelos/CargosMinisteriales.php';

    //si trae algún valor por post

    if($_POST){
        
        //(si trae)instancia instancia
        $instancia = new CargosMinisteriales();

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
                        "1"=>'<button class="btn btn-light" onClick="ConsultarPorId('. $reg->idcargosministeriales .');"><span class="fas fa-eye"></span></button>'.
                            '<button class="btn btn-light" onClick="Eliminar('. $reg->idcargosministeriales .');"><span class="fa fa-trash"></span></button>'
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
		
                $idcargosministeriales=$_POST['idcargosministeriales'];
                $rspta=$instancia->ConsultarPorId($idcargosministeriales);
        
                echo json_encode($rspta);
            break;

            case "GUARDAR":
                $idcargosministeriales=$_POST['idcargosministeriales'];
                $nombre=$_POST['nombre'];
        
                if(empty($idcargosministeriales)){
                    //insert
                    $respuesta = $instancia->Guardar($nombre, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_REGISTRO' : 'FAIL_REGISTRO';
                }else{
                    //update
                    $respuesta = $instancia->Modificar($idcargosministeriales, $nombre, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_EDITAR' : 'FAIL_EEDITAR';
                }
                
            break;

            case "ELIMINAR":
                $idcargosministeriales=$_POST['idcargosministeriales'];
                $respuesta = $instancia->Eliminar($idcargosministeriales);
                echo $respuesta ? 'OK' : 'FAIL';
            break;
        }
    }
    ob_end_flush();
?>