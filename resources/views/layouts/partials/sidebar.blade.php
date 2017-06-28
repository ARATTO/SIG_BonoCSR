<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/bono_csr/user8-128x128.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->username }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            
            @if( Auth::user()->esAdministrador == 1 )
                <!-- ////////////////////////////////////////////////// -->
                <!-- ///ADMINISTRADOR////////////////////////////////// -->
                <!-- ////////////////////////////////////////////////// -->
                @include('layouts.partials.nav.administrador')
                <!-- ////////////////////////////////////////////////// -->
                <!-- ///FIN ADMINISTRADOR////////////////////////////// -->
                <!-- ////////////////////////////////////////////////// -->
            @endif

            @if( Auth::user()->esGerencial == 1 )
            <!-- ////////////////////////////////////////////////// -->
            <!-- ///EGERENTE/////////////////////////////////////// -->
            <!-- ////////////////////////////////////////////////// -->
            @include('layouts.partials.nav.gerente')
            <!-- ////////////////////////////////////////////////// -->
            <!-- ///FIN GERENTE//////////////////////////////////// -->
            <!-- ////////////////////////////////////////////////// -->
            @endif

            @if( Auth::user()->esTransaccional == 1 )
            <!-- ////////////////////////////////////////////////// -->
            <!-- ///TACTICO//////////////////////////////////////// -->
            <!-- ////////////////////////////////////////////////// -->
            @include('layouts.partials.nav.tactico')  
            <!-- ////////////////////////////////////////////////// -->
            <!-- ///FIN TACTICO//////////////////////////////////// -->
            <!-- ////////////////////////////////////////////////// -->
            @endif

            <!-- ////////////////////////////////////////////////// -->
            <!-- //////////////////OTROS/////////////////// -->
            <!-- ////////////////////////////////////////////////// -->
            @include('layouts.partials.nav.otros')  
            <!-- ////////////////////////////////////////////////// -->
            <!-- ///FIN OTROS///////////////// -->
            <!-- ////////////////////////////////////////////////// -->
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
