            <?php

            if($_SESSION['nivel']=='DEVELOPER' || $_SESSION['nivel']=='ADMIN' || $_SESSION['nivel']=='CENSISTA'){

            ?>
            <li class="nav-header">IGLESIA CENTRAL</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                    Miembros
                    <i class="right fas fa-sort-down"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="central_censar_miembro.php" class="nav-link">
                        <i class="fas fa-user-edit nav-icon"></i>
                        <p>Censar miembro</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Consultar censo</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Ministerios
                    <i class="right fas fa-sort-down"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="ministerios.php" class="nav-link">
                        <i class="fas fa-folder-open nav-icon"></i>
                        <p>Ver ministerios</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="cargos_ministeriales.php" class="nav-link">
                        <i class="fas fa-folder-open nav-icon"></i>
                        <p>Cargos ministeriales</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="fas fa-folder-open nav-icon"></i>
                        <p>Asignación de cargos</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Comisiones
                    <i class="right fas fa-sort-down"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="comisiones_select_ministerio.php" class="nav-link">
                        <i class="fas fa-folder-open nav-icon"></i>
                        <p>Ver comisiones</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="cargos_comisiones.php" class="nav-link">
                        <i class="fas fa-folder-open nav-icon"></i>
                        <p>Cargos de comisiones</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Asignación de cargos</p>
                        </a>
                    </li>
                </ul>
            </li>
            <?php

            }

            ?>