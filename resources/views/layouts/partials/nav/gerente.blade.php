<!-- ////////////////////////////////////////////////// -->
<!-- ///GERENTE//////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////// -->

<!-- MENU GERENTE -->
    <!-- MENU Gerencial -->
                <li class="treeview">
                    <a href="#"><i class='fa fa-link'></i> <span>{{ trans('REPORTES GERENCIALES') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#">Titulares divididos por Genero.</a></li>
                        <li><a href="#">Titulares de niños y embarazadas.</a></li>
                        <li><a href="#">Titulares de adulto mayor.</a></li>
                        <li><a href="{{route('seleccionarDatos')}}">{{ trans('Inversion total, Salud') }}</a></li>
                        <li><a href="{{route('inversionAdulto')}}">Inversion total, Adulto Mayor.</a></li>
                        <li><a href="{{route('inversionPromotor')}}">Dinero invertido en promotores</a></li>
                    </ul>
                </li>
    <!-- FIN MENU Gerencial -->
<!-- FIN MENU GERENTE -->

<!-- ////////////////////////////////////////////////// -->
<!-- ///FIN GERENTE//////////////////////////////////// -->
<!-- ////////////////////////////////////////////////// -->