<?php
    ob_start();

    

    require '../modelos/Login.php';

        //si trae algún valor por post
    if(isset($_GET["op"]))
    {
        $_POST["accion"] = "CERRAR_SESION";
    }

    if($_POST){

        $instancia = new Login();

        switch($_POST["accion"]){

            case "VERIFICAR_USUARIO":
                echo json_encode($instancia->verificarUsuario($_POST['usuario'], $_POST['clave']));
            break;

            case "CREAR_SESION":
                //SI no existe la sesion la creamos
                if (strlen(session_id()) < 1){
                    session_start();  //Validamos si existe o no la sesión
                }
                //creamos la sesion del usuario
                $_SESSION['usuario'] = $_POST['usuario'];
                $_SESSION['nivel'] = $_POST['nivel'];
                $_SESSION['nombre_miembro'] = $_POST['nombre_miembro'];
                echo json_encode("OK"); //confirma el inicio de sesion del usuario
            break;

            case "CERRAR_SESION":

                session_start();
                session_destroy();
                header("Location: ../vistas/login.php");
            break;
        }
    }
    ob_end_flush();
?>