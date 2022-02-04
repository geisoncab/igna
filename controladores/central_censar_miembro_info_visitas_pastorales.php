<?php
    ob_start();
    session_start();
    require '../modelos/CentralCensarMiembroInfoVisitasPastorales.php';

    //si trae algún valor por post

    if($_GET){
        
        //(si trae)instancia instancia
        $instancia = new CentralCensarMiembroInfoVisitasPastorales();

        $usuario_creo = $_SESSION['usuario'];
        $fecha_creo = date("Y-m-d H:i:s");
        $usuario_modifico = $usuario_creo;
        $fecha_modifico = date("Y-m-d H:i:s");

        switch($_GET["accion"]){

            case "CONSULTAR":

                $idmiembro = $_GET['idmiembro'];
                $respuesta = $instancia->ConsultarTodo($idmiembro);
                $JSON_response = json_encode($respuesta);
                $rspta = json_decode($JSON_response);

                $data = Array();
                foreach($rspta AS $reg){
                    $data[]=array(
                        "0"=>$reg->fecha_visita,
                        "1"=>'<button class="btn btn-light" onClick="ConsultarPorId('. $reg->idvisitaspastorales .');"><i class="fas fa-eye"></i></button>'.
                            '<button class="btn btn-light" onClick="Eliminar('. $reg->idvisitaspastorales .');"><i class="fa fa-trash"></i></button>'
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
		
                $idvisitaspastorales=$_GET['idvisitaspastorales'];
                $rspta=$instancia->ConsultarPorId($idvisitaspastorales);
        
                echo json_encode($rspta);
            break;

            case "GUARDAR":

                $idvisitaspastorales=$_POST['idvisitaspastorales'];
                $idmiembro=$_POST['idmiembro'];
                $fecha_visita=$_POST['fecha_visita'];
                
                if(empty($idvisitaspastorales)){

                    //insert
                    $respuesta = $instancia->Guardar($idmiembro, $fecha_visita, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_REGISTRO' : 'FAIL_REGISTRO';
                    

                }else{
                    //update
                    $respuesta = $instancia->Modificar($idvisitaspastorales, $idmiembro, $fecha_visita, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_EDITAR' : 'FAIL_EDITAR';
                }
                
            break;

            case "ELIMINAR":
                $idvisitaspastorales=$_POST['idvisitaspastorales'];
                $respuesta = $instancia->Eliminar($idvisitaspastorales);
                echo $respuesta ? 'OK' : 'FAIL';
            break;

            case 'mostrarInformacionMiembro':

                $idmiembro=$_GET['idmiembro'];
                $respuesta=$instancia->mostrarInformacionMiembro($idmiembro);
          
                echo json_encode($respuesta);
            break;

        }
    }
    ob_end_flush();
?>