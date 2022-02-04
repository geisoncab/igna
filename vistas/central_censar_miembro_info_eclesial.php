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
                <h1 class="m-0">INFORMACIÓN ECLESIAL</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="inicio.php">Incio</a></li>
                <li class="breadcrumb-item"><a href="central_censar_miembro.php">Censar miembro</a></li>
                <li class="breadcrumb-item active">Información eclesial</li>
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
                        <!-- Button trigger modal -->
                        <button id="abrirForm" name="abrirForm" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="limpiarCampos();">
                        <i class="fas fa-plus-circle"></i> Nuevo
                        </button>
                    </div>
                    <div class="card-body shadow-lg">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <!-- <div class="input-group input-group-lg"> -->
                                        <ol class="list-group" id="informacion_encabezado">
                                            <!-- se genera desde el JS -->
                                        </ol>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table id="tablaDatos" class="table display responsive nowrap  table-striped table-bordered table-condensed table-hover shadow-lg"style="width:100%">
                    <thead>
                    <th>INFORMACIÓN ECLESIAL</th>
                    <th>ACCIONES</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <!-- PARA MOSTRAR LA TABLA DE REGISTROS  -->

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">

                        
                        <div class="modal-content">
                            <form name="formulario" id="formulario" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Ingreso de datos</h5>
                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                    <!-- <input type="hidden" id="accion" name="accion" value="GUARDAR" readonly> -->
                                    <input type="hidden" id="idinformacioneclesial" name="idinformacioneclesial" readonly>
                                    <input type="hidden" id="idmiembro" name="idmiembro" readonly>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        Es dedicado: *
                                        <div class="p-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="dedicado_SI" name="es_dedicado" value="SI" checked>
                                            <label class="form-check-label" for="dedicado_SI">SI</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="dedicado_NO" name="es_dedicado" value="NO">
                                            <label class="form-check-label" for="dedicado_NO">NO</label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        Asiste regularmente a esta iglesia: *
                                        <div class="p-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="asisteregularmente_SI" name="asiste_regularmente" value="SI" checked>
                                            <label class="form-check-label" for="asisteregularmente_SI">SI</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="asisteregularmente_NO" name="asiste_regularmente" value="NO">
                                            <label class="form-check-label" for="asisteregularmente_NO">NO</label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        Acepto a cristo: *
                                        <div class="p-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="aceptocristo_SI" name="acepto_cristo" value="SI" checked>
                                            <label class="form-check-label" for="aceptocristo_SI">SI</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="aceptocristo_NO" name="acepto_cristo" value="NO">
                                            <label class="form-check-label" for="aceptocristo_NO">NO</label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        Es bautizado: *
                                        <div class="p-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="esbautizado_SI" name="es_bautizado" value="SI" checked>
                                            <label class="form-check-label" for="esbautizado_SI">SI</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="esbautizado_NO" name="es_bautizado" value="NO">
                                            <label class="form-check-label" for="esbautizado_NO">NO</label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        Fecha de bautizo:
                                        <input type="date" class="form-control" id="fecha_bautizo" name="fecha_bautizo"/>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        Iglesia de bautizo:
                                        <input type="text" class="form-control" id="iglesia_bautizo" name="iglesia_bautizo" placeholder="Ingrse la iglesia de bautizo"/>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        Es miembro en plena comunion de esta iglesia: *
                                        <div class="p-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="miembroestaiglesia_SI" name="miembro_esta_iglesia" value="SI" checked>
                                            <label class="form-check-label" for="miembroestaiglesia_SI">SI</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="miembroestaiglesia_NO" name="miembro_esta_iglesia" value="NO">
                                            <label class="form-check-label" for="miembroestaiglesia_NO">NO</label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        Es miembro de otra iglesia: *
                                        <div class="p-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="miembrootraiglesia_SI" name="miembro_otra_iglesia" value="SI" checked>
                                            <label class="form-check-label" for="miembrootraiglesia_SI">SI</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="miembrootraiglesia_NO" name="miembro_otra_iglesia" value="NO">
                                            <label class="form-check-label" for="miembrootraiglesia_NO">NO</label>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnVolver" name="btnVolver">VOLVER</button>
                                    <button type="submit" class="btn btn-primary" id="btnRegistrar" name="btnRegistrar">GUARDAR</button>
                                    <!-- <button type="button" class="btn btn-primary">OK</button> -->
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
                
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

<script type="text/javascript" src="js/central_censar_miembro_info_eclesial.js"></script>

<?php
}
ob_end_flush();
?>

