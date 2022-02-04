<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="icon"   href="../media/img/identidad/logo.png" type="image/png" />
    <title>IGNA CHAMELCO</title>

    <!-- BOOTSRAP -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- ICONOS FONTAWESOME -->
    <link rel="stylesheet" href="../assets/css/all.min.css">

    <!-- SWEET ALERT-->
    <link rel="stylesheet" href="../assets/plugins/SweetAlert/dist/sweetalert2.min.css">

    <!-- DATATABLES DE JQUERY -->
    <link rel="stylesheet" type="text/css" href="../assets/plugins/DataTables/datatables.min.css"/>
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"> -->

    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- CSS DE TEMPLATE -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    

    <div class="login-box">
        <div class="login-logo text-center">
        <a href=".."><b>Iglesia del Nazareno</b><br>San Juan Chamelco</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Ingrese sus credenciales de acceso</p>

            <form name="formulario" id="formulario" method="POST">
                <input type="hidden" id="accion" name="accion" value="VERIFICAR_USUARIO">
                <div class="input-group mb-3">
                    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario">
                    <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña">
                    <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                    <button type="submit" class="btn btn-primary btn-block" id="ingresar" name="ingresar">Ingresar</button>                    
                    </div>
                </div>
            </form>
            
            <!-- <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="register.html" class="text-center">Register a new membership</a>
            </p> -->

        </div>
        <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- SCRIPTS -->
    <script src="../assets/js/all.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/plugins/SweetAlert/dist/sweetalert2.all.min.js"></script>
    <!-- <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script> -->
    <script type="text/javascript" src="../assets/plugins/DataTables/datatables.min.js"></script>
    <script src="js/login.js"></script>
    <!-- AdminLTE -->
    <script src="../dist/js/adminlte.js"></script>
    
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../dist/js/demo.js"></script> -->


</body>
</html>