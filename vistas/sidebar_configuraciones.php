            <?php

            if($_SESSION['nivel']=='DEVELOPER' || $_SESSION['nivel']=='ADMIN'){

            ?>
            <li class="nav-header">CONFIGURACIONES</li>
            <li class="nav-item">
                <a href="control_usuarios.php" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p class="text">Control de usuarios</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="cambiar_contrasena.php" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p class="text">Cambiar contraseña</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="ocupaciones.php" class="nav-link">
                <i class="nav-icon fas fa-briefcase"></i>
                <p class="text">Ocupaciones</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="estado_civil.php" class="nav-link">
                <i class="nav-icon fas fa-heart"></i>
                <p class="text">Estado civil</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="idiomas.php" class="nav-link">
                <i class="nav-icon fas fa-globe-americas"></i>
                <p class="text">Idiomas</p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                    Direcciones
                    <i class="right fas fa-sort-down"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Departamentos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Municipios</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Barrios, caseríos, fincas y aldeas</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php

            }

            ?>