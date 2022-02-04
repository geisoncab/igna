<?php
    ob_start();
    session_start();
    require '../modelos/CentralCensarMiembroInfoFamiliar.php';

    //si trae algún valor por post

    if($_GET){
        
        //(si trae)instancia instancia
        $instancia = new CentralCensarMiembroInfoFamiliar();

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
                        "0"=>$reg->nombre_miembro_papa,
                        "1"=>$reg->nombre_miembro_mama,
                        "2"=>'<button class="btn btn-light" onClick="Eliminar('. $reg->idinformacionfamiliar .');"><i class="fa fa-trash"></i></button>'
                    );
                }
                $results = array(
                    "sEcho"=>1, //Información para el datatables
                    "iTotalRecords"=>count($data), //enviamos el total registros al datatable
                    "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
                    "aaData"=>$data);
                echo json_encode($results);
            break;

            // case 'CONSULTAR_ID':
		
            //     $idmiembro=$_GET['idmiembro'];
            //     $rspta=$instancia->ConsultarPorId($idmiembro);
        
            //     echo json_encode($rspta);
            // break;

            case "GUARDAR":

                $idinformacionfamiliar=$_POST['idinformacionfamiliar'];
                $idmiembro=$_POST['idmiembro'];
                $idmiembro_papa=$_POST['idmiembro_papa'];
                $idmiembro_mama=$_POST['idmiembro_mama'];
                
                if(empty($idinformacionfamiliar)){

                    //insert
                    $respuesta = $instancia->Guardar($idmiembro, $idmiembro_papa, $idmiembro_mama, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_REGISTRO' : 'FAIL_REGISTRO';
                    

                }else{
                    //update
                    $respuesta = $instancia->Modificar($idinformacionfamiliar, $idmiembro, $idmiembro_papa, $idmiembro_mama, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_EDITAR' : 'FAIL_EDITAR';
                }
                
            break;

            case "ELIMINAR":
                $idinformacionfamiliar=$_POST['idinformacionfamiliar'];
                $respuesta = $instancia->Eliminar($idinformacionfamiliar);
                echo $respuesta ? 'OK' : 'FAIL';
            break;

            case 'mostrarInformacionMiembro':

                $idmiembro=$_GET['idmiembro'];
                $respuesta=$instancia->mostrarInformacionMiembro($idmiembro);
          
                echo json_encode($respuesta);
            break;


            case 'autocomplete_papa':
		
                $respuesta=$instancia->autocomplete_papa();
                echo json_encode($respuesta);

            break;

            case 'autocomplete_mama':
		
                $respuesta=$instancia->autocomplete_mama();
                echo json_encode($respuesta);

            break;

            case "get_conyuge":

                $idmiembro = $_GET['idmiembro'];
                $respuesta = $instancia->get_conyuge($idmiembro);
                $JSON_response = json_encode($respuesta);
                $rspta = json_decode($JSON_response);

                $data = Array();
                foreach($rspta AS $reg){
                    $data[]=array(
                        "0"=>$reg->informacion_pareja
                    );
                }
                $results = array(
                    "sEcho"=>1, //Información para el datatables
                    "iTotalRecords"=>count($data), //enviamos el total registros al datatable
                    "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
                    "aaData"=>$data);
                echo json_encode($results);
            break;
            
            case "get_hijos":

                $idmiembro = $_GET['idmiembro'];
                $respuesta = $instancia->get_hijos($idmiembro);
                $JSON_response = json_encode($respuesta);
                $rspta = json_decode($JSON_response);

                $data = Array();
                foreach($rspta AS $reg){
                    $data[]=array(
                        "0"=>$reg->nombre_hijo
                    );
                }
                $results = array(
                    "sEcho"=>1, //Información para el datatables
                    "iTotalRecords"=>count($data), //enviamos el total registros al datatable
                    "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
                    "aaData"=>$data);
                echo json_encode($results);
            break;

        }
    }
    ob_end_flush();
?>