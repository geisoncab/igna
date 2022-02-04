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
                <h1 class="m-0">INFORMACIÓN FAMILIAR</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="inicio.php">Incio</a></li>
                <li class="breadcrumb-item"><a href="central_censar_miembro.php">Censar miembro</a></li>
                <li class="breadcrumb-item active">Información familiar</li>
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
                    <th>INFORMACIÓN DEL PADRE</th>
                    <th>INFORMACIÓN DE LA MADRE</th>
                    <th>ACCIONES</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <table id="tablaDatos_conyuge" class="table display responsive nowrap  table-striped table-bordered table-condensed table-hover shadow-lg"style="width:100%">
                    <thead>
                    <th>INFORMACIÓN DE PAREJA</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <table id="tablaDatos_hijos" class="table display responsive nowrap  table-striped table-bordered table-condensed table-hover shadow-lg"style="width:100%">
                    <thead>
                    <th>INFORMACIÓN DE LOS HIJOS</th>
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
                                    <input type="hidden" id="idinformacionfamiliar" name="idinformacionfamiliar" readonly>
                                    <input type="hidden" id="idmiembro" name="idmiembro" readonly>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        Padre: *
                                        <input type="hidden" class="form-control" id="idmiembro_papa" name="idmiembro_papa" placeholder="idmiembro_papa" readonly/>
                                        <input type="text" class="form-control" id="nombre_miembro_papa" name="nombre_miembro_papa" placeholder="Ingrese el nombre del papá" autocomplete="off" required/>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        Madre: *
                                        <input type="hidden" class="form-control" id="idmiembro_mama" name="idmiembro_mama" placeholder="idmiembro_mama" readonly/>
                                        <input type="text" class="form-control" id="nombre_miembro_mama" name="nombre_miembro_mama" placeholder="Ingrese el nombre de la mamá" autocomplete="off" required/>
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

<script type="text/javascript" src="js/central_censar_miembro_info_familiar.js"></script>

<?php
}
ob_end_flush();
?>

