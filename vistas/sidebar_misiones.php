            <?php

            if($_SESSION['nivel']=='DEVELOPER' || $_SESSION['nivel']=='ADMIN' || $_SESSION['nivel']=='CENSISTA'){

            ?>
            <li class="nav-header">MISIONES</li>
            <li class="nav-item">
                <a href="misiones.php" class="nav-link">
                <i class="fas fa-place-of-worship nav-icon"></i>
                <p>Misiones</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                    Miembros
                    <i class="right fas fa-sort-down"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
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
            <?php

            }

            ?>