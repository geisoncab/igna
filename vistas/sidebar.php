    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="inicio.php" class="brand-link">
        <img src="../media/img/identidad/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Iglesia del Nazareno</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="../media/img/usuarios/defaultm.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/" class="d-block"><?=$nombre_miembro;?></a>
                <small>
                <a class="d-block" href="../controladores/login.php?op=CR"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a>
                </small>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            
            <!-- Se maneja así para que no choque cuando se agregue nuevas opciones o se vinculen las páginas  -->
            <?php
                require 'sidebar_iglesiacentral.php';
                require 'sidebar_misiones.php';
                require 'sidebar_certificadosreportes.php';
                require 'sidebar_configuraciones.php';
            ?>            
            <!-- Se maneja así para que no choque cuando se agregue nuevas opciones o se vinculen las páginas  -->

            </ul>
            <br><br><br>
            <br><br><br>
            <br><br><br>
            <br><br><br>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>