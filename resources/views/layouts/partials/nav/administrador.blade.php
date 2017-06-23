<!-- ////////////////////////////////////////////////// -->
<!-- ///ADMINISTRADOR////////////////////////////////// -->
<!-- ////////////////////////////////////////////////// -->

<!-- MENU ADMINISTRADOR -->
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('bonomessage.Admin') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <!-- Inicio Menu Usuario -->
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>{{ trans('bonomessage.Usuario') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route( 'users.index' ) }}">{{ trans('bonomessage.VerUsuario') }}</a></li>
                            <li><a href="{{ route( 'users.create' ) }}">{{ trans('bonomessage.CrearUsuario') }}</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>{{ trans('DATOS') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('etl')}}">{{ trans('Cargar Datos') }}</a></li>
                        </ul>
                    </li>                    
                    
                    <!-- Fin Menu Usuario -->
                </ul>
            </li>
<!-- FIN MENU ADMINISTRADOR -->

<!-- ////////////////////////////////////////////////// -->
<!-- ///FIN ADMINISTRADOR////////////////////////////// -->
<!-- ////////////////////////////////////////////////// -->

<!-- MENU Gerencial -->
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('REPORTES GERENCIALES') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('seleccionarDatos')}}">{{ trans('Inversion en Salud y adulto mayor') }}</a></li>
                </ul>
            </li>
<!-- FIN MENU Gerencial -->