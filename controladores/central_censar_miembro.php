<?php
    ob_start();
    session_start();
    require '../modelos/CentralCensarMiembro.php';

    //si trae algún valor por post

    if($_GET){
        
        //(si trae)instancia instancia
        $instancia = new CentralCensarMiembro();

        $usuario_creo = $_SESSION['usuario'];
        $fecha_creo = date("Y-m-d H:i:s");
        $usuario_modifico = $usuario_creo;
        $fecha_modifico = date("Y-m-d H:i:s");

        switch($_GET["accion"]){

            case "CONSULTAR":

                $respuesta = $instancia->ConsultarTodo();
                $JSON_response = json_encode($respuesta);
                $rspta = json_decode($JSON_response);

                $data = Array();
                foreach($rspta AS $reg){
                    $data[]=array(
                        "0"=>$reg->foto,
                        "1"=>'<div class="text-dark"><b>DPI: </b>'.$reg->cui.'</div>'.
                            '<div class="text-dark"><b>NOMBRE: </b>'.$reg->nombre.'</div>'.
                            '<div class="text-dark"><b>DIRECCIÓN: </b>'.$reg->direccion.'</div>'.
                            '<div class="text-dark"><b>TELÉFONO: </b>'.$reg->telefono.'</div>',
                        "2"=>'<button class="btn btn-light" onClick="ConsultarPorId('. $reg->idmiembro .');"><i class="fas fa-eye"></i></button>'.
                            '<button class="btn btn-light" onClick="Eliminar('. $reg->idmiembro .');"><i class="fa fa-trash"></i></button>',
                        "3"=>'<a class="btn btn-light" href="../vistas/central_censar_miembro_info_conyugal.php?idmiembro='.$reg->idmiembro.'"><i class="fas fa-ring"></i></a>'.
                            '<a class="btn btn-light" href="../vistas/central_censar_miembro_info_familiar.php?idmiembro='.$reg->idmiembro.'"><i class="fas fa-users"></i></a>'.
                            '<a class="btn btn-light" href="../vistas/central_censar_miembro_info_eclesial.php?idmiembro='.$reg->idmiembro.'"><i class="fas fa-church"></i></a>'.
                            '<a class="btn btn-light" href="../vistas/central_censar_miembro_info_visitas_pastorales.php?idmiembro='.$reg->idmiembro.'"><i class="fas fa-house-user"></i></a>',
                        "4"=>'NEW',
                        "5"=>'NEW'
                    );
                    // $data[]=array(
                    //     "0"=>$reg->foto,
                    //     "1"=>$reg->cui,
                    //     "2"=>$reg->nombre,
                    //     // "3"=>$reg->direccion,
                    //     "3"=>$reg->telefono,
                    //     "4"=>'<button class="btn btn-light" onClick="ConsultarPorId('. $reg->idmiembro .');"><i class="fas fa-eye"></i></button>'.
                    //         '<button class="btn btn-light" onClick="Eliminar('. $reg->idmiembro .');"><i class="fa fa-trash"></i></button>'
                    // );
                }
                $results = array(
                    "sEcho"=>1, //Información para el datatables
                    "iTotalRecords"=>count($data), //enviamos el total registros al datatable
                    "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
                    "aaData"=>$data);
                echo json_encode($results);
            break;

            case 'CONSULTAR_ID':
		
                $idmiembro=$_GET['idmiembro'];
                $rspta=$instancia->ConsultarPorId($idmiembro);
        
                echo json_encode($rspta);
            break;

            case "GUARDAR":

                $idmiembro=$_POST['idmiembro'];
                $foto = 'DUMMY_FOTO';
                $cui=$_POST['cui'];
                $nombre=$_POST['nombre'];
                $fecha_nacimiento=$_POST['fecha_nacimiento'];
                $genero=$_POST['genero'];
                $idestadocivil=$_POST['idestadocivil'];
                $idbcfa=$_POST['idbcfa'];
                $referencia=$_POST['referencia'];
                $telefono=$_POST['telefono'];
                $idocupaciones=$_POST['idocupaciones'];
                $ididiomas = (!empty($_POST["ididiomas"]))? $_POST["ididiomas"]:false;

                // validamos que esté seleccionado al menos 1 idioma.
                if(!$ididiomas){
                    echo 'IDIOMAS_VACIO';
                    break;
                }

                // echo 'OK_REGISTRO';
                
                if(empty($idmiembro)){

                    //insert
                    $respuesta = $instancia->Guardar($foto, $cui, $nombre, $fecha_nacimiento, $genero, $idestadocivil, $idbcfa, $referencia, $telefono, $idocupaciones,
                                                    $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico);
                    
                    //respuesta: contiene el idmiembro recien insertado para la inserción de nombres
                    $respuesta_idiomas = $instancia->registrar_idiomas($ididiomas, $respuesta, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico);
                    
                    echo ($respuesta>0 && $respuesta_idiomas) ? 'OK_REGISTRO' : 'FAIL_REGISTRO';
                    

                }else{
                    //update
                    $respuesta = $instancia->Modificar($idmiembro, $foto, $cui, $nombre, $fecha_nacimiento, $genero, $idestadocivil, $idbcfa, $referencia, $telefono, $idocupaciones,
                                                        $usuario_modifico, $fecha_modifico);

                    $respuesta_borrarantiguosidiomas = $instancia->borrar_antiguosidiomas($idmiembro);
                    
                    $respuesta_registrarnuevosidiomas = $instancia->registrar_idiomas($ididiomas, $idmiembro, $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico);
                    echo ($respuesta && $respuesta_borrarantiguosidiomas && $respuesta_registrarnuevosidiomas) ? 'OK_EDITAR' : 'FAIL_EDITAR';
                }
                
            break;

            case "ELIMINAR":
                $idmiembro=$_POST['idmiembro'];
                $respuesta = $instancia->Eliminar($idmiembro);
                echo $respuesta ? 'OK' : 'FAIL';
            break;

            case 'autocomplete_direcciones':
                $respuesta=$instancia->autocomplete_direcciones();
                echo json_encode($respuesta);
            break;
            
            case 'autocomplete_ocupaciones':
                $respuesta=$instancia->autocomplete_ocupaciones();
                echo json_encode($respuesta);
            break;
            
            case 'get_idiomas':
                $respuesta=$instancia->get_idiomas();
                echo json_encode($respuesta);
            break;

            case 'get_estadocivil':
                $respuesta=$instancia->get_estadocivil();
                echo json_encode($respuesta);
            break;

            case 'get_idiomasmiembro':
		
                $idmiembro=$_GET['idmiembro'];
                $rspta=$instancia->get_idiomasmiembro($idmiembro);
        
                echo json_encode($rspta);
            break;
        }
    }
    ob_end_flush();
?>