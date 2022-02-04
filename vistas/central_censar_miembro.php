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
                <h1 class="m-0">CENSAR MIEMBRO</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="inicio.php">Incio</a></li>
                <li class="breadcrumb-item active">Censar miembro</li>
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
                        <!-- <div class="text-white p-2">Para ver las <b>comisiones</b> primero debe <b>seleccionar un ministerio</b></div> -->
                    </div>
                </div>
                <table id="tablaDatos" class="table display responsive nowrap  table-striped table-bordered table-condensed table-hover shadow-lg"style="width:100%">
                    <thead>
                    <th>FOTO</th>
                    <th>INFORMACIÓN</th>
                    <!-- <th>CUI</th> -->
                    <!-- <th>NOMBRE</th> -->
                    <!-- <th>DIRECCION</th> -->
                    <!-- <th>TELEFONO</th> -->
                    <th>ACCIONES</th>
                    <th>INFORMACIÓN <br>ADICIONAL</th>
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
                                    <input type="hidden" id="accion" name="accion" value="GUARDAR" readonly>
                                    <input type="hidden" id="idmiembro" name="idmiembro" readonly>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            Número de CUI: *
                                            <input type="text" class="form-control" id="cui" name="cui" placeholder="Ingrese el cui" required/>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            Nombre completo: *
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrse el nombre" required/>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            Fecha de nacimiento: *
                                            <!-- <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required/> -->
                                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required/>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            Genero: *
                                            <div class="p-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="genero_MASCULINO" name="genero" value="MASCULINO" checked>
                                                <label class="form-check-label" for="genero_MASCULINO">MASCULINO</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="genero_FEMENINO" name="genero" value="FEMENINO">
                                                <label class="form-check-label" for="genero_FEMENINO">FEMENINO</label>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            Estado Civil: *
                                            <div class="p-2" id="listado_estadocivil">
                                            <!-- SE GENERA EN EL JS DE FORMA DINAMICA -->
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            Ingrese la dirección: *
                                            <input type="hidden" class="form-control" id="idbcfa" name="idbcfa" placeholder="idbcfa" readonly required/>
                                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ej. Barrio, Caserío, Finca, Aldea" autocomplete="off" required/>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            Ingrese una referencia
                                            <input type="text" class="form-control" id="referencia" name="referencia" placeholder="Ingrese la referencia"/>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            Ingrese el número de teléfono:
                                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el número de teléfono"/>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            Ingrese su ocupación: *
                                            <input type="hidden" class="form-control" id="idocupaciones" name="idocupaciones" placeholder="idocupaciones" readonly required/>
                                            <input type="text" class="form-control" id="ocupaciones" name="ocupaciones" placeholder="Ingrese la ocupación" autocomplete="off" required/>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            Idiomas que habla: *
                                            <ul class="list-group" id="listado_idiomas">
                                                <!-- SE GENERA EN EL JS DE FORMA DINAMICA -->
                                            </ul>
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

<script type="text/javascript" src="js/central_censar_miembro.js"></script>

<?php
}
ob_end_flush();
?>

