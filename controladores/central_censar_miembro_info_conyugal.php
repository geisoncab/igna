<?php
    ob_start();
    session_start();
    require '../modelos/CentralCensarMiembroInfoConyugal.php';

    //si trae algún valor por post

    if($_GET){
        
        //(si trae)instancia instancia
        $instancia = new CentralCensarMiembroInfoConyugal();

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
                        "0"=>$reg->informacion_pareja,
                        "1"=>'<button class="btn btn-light" onClick="Eliminar('. $reg->idinformacionconyugal .');"><i class="fa fa-trash"></i></button>'
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

                $idinformacionconyugal=$_POST['idinformacionconyugal'];
                $idmiembro=$_POST['idmiembro'];
                $idmiembro_conyuge=$_POST['idmiembro_conyuge'];
                
                if(empty($idinformacionconyugal)){

                    //insert
                    $respuesta = $instancia->Guardar($idmiembro, $idmiembro_conyuge, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_REGISTRO' : 'FAIL_REGISTRO';
                    

                }else{
                    //update
                    $respuesta = $instancia->Modificar($idinformacionconyugal, $idmiembro, $idmiembro_conyuge, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_EDITAR' : 'FAIL_EDITAR';
                }
                
            break;

            case "ELIMINAR":
                $idinformacionconyugal=$_POST['idinformacionconyugal'];
                $respuesta = $instancia->Eliminar($idinformacionconyugal);
                echo $respuesta ? 'OK' : 'FAIL';
            break;

            case 'mostrarInformacionMiembro':

                $idmiembro=$_GET['idmiembro'];
                $respuesta=$instancia->mostrarInformacionMiembro($idmiembro);
          
                echo json_encode($respuesta);
            break;


            case 'autocomplete_miembros':
		
                $respuesta=$instancia->autocomplete_miembros();
                echo json_encode($respuesta);

            break;

        }
    }
    ob_end_flush();
?>