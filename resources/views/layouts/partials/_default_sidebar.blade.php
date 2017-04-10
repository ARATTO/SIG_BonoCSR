
<!-- EJEMPLO DE COMO CREAR UN SIDE BARR PARA CAD NAV -->

<!-- MENU ADMINISTRADOR -->
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <!-- Inicio Menu Usuario -->
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Usuario</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('users.index') }}">Ver Usuario</a></li>
                            <li><a href="{{ route('users.create') }}">Crear Usuario</a></li>
                        </ul>
                    </li>
                    <!-- Fin Menu Usuario -->
                    <!-- Inicio Menu Materias -->
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Materia</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('materias.index') }}">Ver Materia</a></li>
                            <li><a href="{{ route('materias.create') }}">Crear Materia</a></li>
                        </ul>
                    </li>
                    <!-- Fin Menu Materias -->
                    <!-- Inicio Menu Ciclos -->
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>Ciclo</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('ciclos.index') }}">Ver Ciclo</a></li>
                            <li><a href="{{ route('ciclos.create') }}">Crear Ciclo</a></li>
                        </ul>
                    </li>
                    <!-- Fin Menu Ciclos -->
                </ul>
            </li>
<!-- FIN MENU ADMINISTRADOR -->