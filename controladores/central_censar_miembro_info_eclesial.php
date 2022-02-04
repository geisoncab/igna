<?php
    ob_start();
    session_start();
    require '../modelos/CentralCensarMiembroInfoEclesial.php';

    //si trae algún valor por post

    if($_GET){
        
        //(si trae)instancia instancia
        $instancia = new CentralCensarMiembroInfoEclesial();

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
                        "0"=>'<div class="text-dark"><b>ES DEDICADO: </b>'.$reg->es_dedicado.'</div>'.
                            '<div class="text-dark"><b>ASISTE REGULARMENTE: </b>'.$reg->asiste_regularmente.'</div>'.
                            '<div class="text-dark"><b>ACEPTO A CRISTO: </b>'.$reg->acepto_cristo.'</div>'.
                            '<div class="text-dark"><b>ES BAUTIZADO: </b>'.$reg->es_bautizado.'</div>'.
                            '<div class="text-dark"><b>FECHA_BAUTIZO: </b>'.$reg->fecha_bautizo.'</div>'.
                            '<div class="text-dark"><b>IGLESIA_BAUTIZO: </b>'.$reg->iglesia_bautizo.'</div>'.
                            '<div class="text-dark"><b>ES MIEMBRO EN PLENA COMUNION DE ESTA IGLESIA: </b>'.$reg->miembro_esta_iglesia.'</div>'.
                            '<div class="text-dark"><b>ES MIEMBRO DE OTRA IGLESIA: </b>'.$reg->miembro_otra_iglesia.'</div>',
                        "1"=>'<button class="btn btn-light" onClick="ConsultarPorId('. $reg->idinformacioneclesial .');"><i class="fas fa-eye"></i></button>'.
                            '<button class="btn btn-light" onClick="Eliminar('. $reg->idinformacioneclesial .');"><i class="fa fa-trash"></i></button>'
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
		
                $idinformacioneclesial=$_GET['idinformacioneclesial'];
                $rspta=$instancia->ConsultarPorId($idinformacioneclesial);
        
                echo json_encode($rspta);
            break;

            case "GUARDAR":

                $idinformacioneclesial=$_POST['idinformacioneclesial'];
                $idmiembro=$_POST['idmiembro'];
                $es_dedicado=$_POST['es_dedicado'];
                $asiste_regularmente=$_POST['asiste_regularmente'];
                $acepto_cristo=$_POST['acepto_cristo'];
                $es_bautizado=$_POST['es_bautizado'];
                $fecha_bautizo=$_POST['fecha_bautizo'];
                $iglesia_bautizo=$_POST['iglesia_bautizo'];
                $miembro_esta_iglesia=$_POST['miembro_esta_iglesia'];
                $miembro_otra_iglesia=$_POST['miembro_otra_iglesia'];
                
                if(empty($idinformacioneclesial)){

                    //insert
                    $respuesta = $instancia->Guardar($idmiembro, $es_dedicado, $asiste_regularmente, $acepto_cristo, $es_bautizado, 
                                                    $fecha_bautizo, $iglesia_bautizo, $miembro_esta_iglesia, $miembro_otra_iglesia, 
                                                    $usuario_creo, $fecha_creo, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_REGISTRO' : 'FAIL_REGISTRO';
                    

                }else{
                    //update
                    $respuesta = $instancia->Modificar($idinformacioneclesial, $idmiembro, $es_dedicado, $asiste_regularmente, $acepto_cristo,
                                                        $es_bautizado, $fecha_bautizo, $iglesia_bautizo, $miembro_esta_iglesia, 
                                                        $miembro_otra_iglesia, $usuario_modifico, $fecha_modifico);
                    echo $respuesta ? 'OK_EDITAR' : 'FAIL_EDITAR';
                }
                
            break;

            case "ELIMINAR":
                $idinformacioneclesial=$_POST['idinformacioneclesial'];
                $respuesta = $instancia->Eliminar($idinformacioneclesial);
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