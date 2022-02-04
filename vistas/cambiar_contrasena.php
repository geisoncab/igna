<?php
    ob_start();
    session_start();
    $user = $_SESSION['usuario'];
    $nombre_miembro = $_SESSION['nombre_miembro'];

    //verificamos que haya iniciado sesion, de lo contrario lo mandamos al login
    if(!isset($user)){
        header("Location: login.php");
        exit();
    }
?>

<?php
    require_once 'header.php';
?>

<?php
    require_once 'sidebar.php';
?>

<?php

if($_SESSION['nivel']=='DEVELOPER' || $_SESSION['nivel']=='ADMIN'){

?>
    <!-- ###################### ESTE PUEDE SER EL CONTENIDO DE CADA PANTALLA ######################## -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper overflow-auto" style="height:100%;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ">
            <div class="col-sm-6">
                <h1 class="m-0">CAMBIAR CONTRASEÑA</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="inicio.php">Incio</a></li>
                <li class="breadcrumb-item active">Cambiar contraseña</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <section class="container-fluid">
                <!-- INICIO DEL CONTENIDO DE LA PAGINA -->
                <!-- PARA MOSTRAR LA TABLA DE REGISTROS  -->
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="text-white p-2">Para <b>cambiar de contraseña</b> siga las sigueintes instrucciones:</div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body shadow-lg">
                        <!-- <form name="formulario" id="formulario" method="POST"> -->
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                Nombre de usuario:
                                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="session_user" value="<?=$user?>" readonly/>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                Contraseña actual:
                                <input type="password" class="form-control" id="contrasena_actual" name="contrasena_actual" placeholder="Contraseña actual" required/>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                Contraseña nueva:
                                <input type="password" class="form-control" id="contrasena_nueva" name="contrasena_nueva" placeholder="Contraseña actual" required/>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                Confirmar contraseña:
                                <input type="password" class="form-control" id="contrasena_confirmada" name="confirmar_contrasena" placeholder="Contraseña actual" required/>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <button type="submit" class="btn btn-primary" id="btnRegistrar" name="btnRegistrar" onclick="iniciarProcesoCambioContrasena();">GUARDAR</button>
                            </div>
                        <!-- </form> -->
                    </div>
                </div>
                <!-- PARA MOSTRAR LA TABLA DE REGISTROS  -->
                
                <!-- FIN DEL CONTENIDO DE LA PAGINA -->
                </section>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- ###################### ESTE PUEDE SER EL CONTENIDO DE CADA PANTALLA ######################## -->

    
<?php
    require_once 'footer.php'
?>

<script type="text/javascript" src="js/cambiar_contrasena.js"></script>

<?php
}
ob_end_flush();
?>

