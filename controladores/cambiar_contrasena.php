<?php
    ob_start();
    session_start();
    require '../modelos/CambiarContrasena.php';

    //si trae algún valor por post

    if($_POST){
        
        //(si trae)instancia instancia
        $instancia = new CambiarContrasena();

        $usuario_creo = $_SESSION['usuario'];
        $fecha_creo = date("Y-m-d H:i:s");
        $usuario_modifico = $usuario_creo;
        $fecha_modifico = date("Y-m-d H:i:s");

        switch($_POST["accion"]){
            
            case 'verificarContrasenaActual':
		
                $nombre_usuario=$_POST['nombre_usuario'];
                $clave=$_POST['contrasena_actual'];
                $rspta=$instancia->verificarContrasenaActual($nombre_usuario, $clave);
        
                echo json_encode($rspta);
            break;

            case "guardarNuevaContrasena":
                $nombre_usuario=$_POST['nombre_usuario'];
                $clave=$_POST['contrasena_nueva'];
        
                $respuesta = $instancia->guardarNuevaContrasena($nombre_usuario, $clave);
                echo $respuesta ? 'OK_EDITAR' : 'FAIL_EDITAR';
                
            break;
        }
    }
    ob_end_flush();
?>