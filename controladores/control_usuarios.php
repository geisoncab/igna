<?php
    ob_start();
    session_start();
    require '../modelos/ControlUsuarios.php';

    //si trae algún valor por post

    if($_POST){
        
        //(si trae)instancia instancia
        $instancia = new ControlUsuarios();

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
                        "0"=>$reg->miembro,
                        "1"=>$reg->nombre_usuario,
                        "2"=>$reg->nivel,
                        "3"=>'<button class="btn btn-light" onClick="ConsultarPorId('. $reg->idusuario .');"><i class="fas fa-eye"></i></button>'.
                            '<button class="btn btn-light" onClick="Eliminar('. $reg->idusuario .');"><i class="fa fa-trash"></i></button>'
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
		
                $idusuario=$_POST['idusuario'];
                $rspta=$instancia->ConsultarPorId($idusuario);
        
                echo json_encode($rspta);
            break;

            case "GUARDAR":
                $idusuario=$_POST['idusuario'];
                $idmiembro=$_POST['idmiembro'];
                $nombre_usuario=$_POST['nombre_usuario'];
                $clave=$_POST['clave'];
                $nivel=$_POST['nivel'];
        
                if(empty($idusuario)){
                    //insert
                    $respuesta = $instancia->Guardar($idmiembro, $nombre_usuario, $clave, $nivel, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_REGISTRO' : 'FAIL_REGISTRO';
                }else{
                    //update
                    $respuesta = $instancia->Modificar($idusuario, $idmiembro, $nombre_usuario, $clave, $nivel, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_EDITAR' : 'FAIL_EDITAR';
                }
                
            break;

            case "ELIMINAR":
                $idusuario=$_POST['idusuario'];
                $respuesta = $instancia->Eliminar($idusuario);
                echo $respuesta ? 'OK' : 'FAIL';
            break;

            case 'autocomplete_miembros':
		
                
                $respuesta=$instancia->autocomplete_miembros();
                // $reg=$respuesta->fetch_all();
                // echo $respuesta;
                echo json_encode($respuesta);
                // echo json_encode($reg);
            break;

            case 'verificarUsuarioExiste':
		
                $nombre_usuario=$_POST['nombre_usuario'];
                $rspta=$instancia->verificarUsuarioExiste($nombre_usuario);
        
                echo json_encode($rspta);
            break;
        }
    }
    ob_end_flush();
?>