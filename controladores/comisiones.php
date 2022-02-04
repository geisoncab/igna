<?php
    ob_start();
    session_start();
    require '../modelos/Comisiones.php';

    //si trae algún valor por post

    if($_POST){
        
        //(si trae)instancia instancia
        $instancia = new Comisiones();

        $usuario_creo = $_SESSION['usuario'];
        $fecha_creo = date("Y-m-d H:i:s");
        $usuario_modifico = $usuario_creo;
        $fecha_modifico = date("Y-m-d H:i:s");

        switch($_POST["accion"]){

            case "CONSULTAR":
                $idministerios=$_POST['idministerios'];
                $respuesta = $instancia->ConsultarTodo($idministerios);
                $JSON_response = json_encode($respuesta);
                $rspta = json_decode($JSON_response);

                $data = Array();
                foreach($rspta AS $reg){
                    $data[]=array(
                        "0"=>$reg->comision,
                        "1"=>$reg->ministerio,
                        "2"=>'<button class="btn btn-light" onClick="ConsultarPorId('. $reg->idcomisiones .');"><i class="fas fa-eye"></i></button>'.
                        '<button class="btn btn-light" onClick="Eliminar('. $reg->idcomisiones .');"><i class="fa fa-trash"></i></button>',
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
		
                $idcomisiones=$_POST['idcomisiones'];
                $rspta=$instancia->ConsultarPorId($idcomisiones);
        
                echo json_encode($rspta);
            break;

            case "GUARDAR":
                $idcomisiones=$_POST['idcomisiones'];
                $idministerios=$_POST['idministerios'];
                $nombre=$_POST['nombre'];
        
                if(empty($idcomisiones)){
                    //insert
                    $respuesta = $instancia->Guardar($idministerios, $nombre, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_REGISTRO' : 'FAIL_REGISTRO';
                }else{
                    //update
                    $respuesta = $instancia->Modificar($idcomisiones, $idministerios, $nombre, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_EDITAR' : 'FAIL_EEDITAR';
                }
                
            break;

            case "ELIMINAR":
                $idcomisiones=$_POST['idcomisiones'];
                $respuesta = $instancia->Eliminar($idcomisiones);
                echo $respuesta ? 'OK' : 'FAIL';
            break;
            

            // case "selectMinisterios":

            //     $respuesta = $instancia->selectMinisterios();
            //     $JSON_response = json_encode($respuesta);
            //     $rspta = json_decode($JSON_response);
            //     foreach($rspta AS $reg){
            //     // while ($reg=$respuesta->fetch_object()){
            //             echo '<option value=' . $reg->idministerios . '>' . $reg->nombre . '</option>';
            //         }
        
            //     //echo json_encode($data);
            // break;

            case 'mostrarInformacionMinisterio':
		
                
                // $data = json_decode(file_get_contents('php://input'), true);
                // $idministerios=$data['idministerios'];
                $idministerios=$_POST['idministerios'];
                $respuesta=$instancia->mostrarInformacionMinisterio($idministerios);
          
                echo json_encode($respuesta);
            break;
        }
    }
    ob_end_flush();
?>