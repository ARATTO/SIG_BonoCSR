<!-- ////////////////////////////////////////////////// -->
<!-- ///ADMINISTRADOR////////////////////////////////// -->
<!-- ////////////////////////////////////////////////// -->

<!-- MENU ADMINISTRADOR -->
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('tntmessage.Admin') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <!-- Inicio Menu Usuario -->
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>{{ trans('tntmessage.Usuario') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('users.index') }}">{{ trans('tntmessage.VerUsuario') }}</a></li>
                            <li><a href="{{ route('users.create') }}">{{ trans('tntmessage.CrearUsuario') }}</a></li>
                        </ul>
                    </li>
                    <!-- Fin Menu Usuario -->
                </ul>
            </li>
<!-- FIN MENU ADMINISTRADOR -->

<!-- ////////////////////////////////////////////////// -->
<!-- ///FIN ADMINISTRADOR////////////////////////////// -->
<!-- ////////////////////////////////////////////////// -->