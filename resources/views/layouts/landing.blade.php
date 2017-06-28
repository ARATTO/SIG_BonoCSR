<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BONOCSR - {{ trans('adminlte_lang::message.landingdescription') }} ">
    <meta name="author" content="Sergi Tur Badenas - acacha.org">
    <link rel="shortcut icon" href="{{ asset('/img/logo.png') }}">

    <meta property="og:title" content="Adminlte-laravel" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }}" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org/" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="demo.adminlte.acacha.org" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title>BONOCSR</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/js/smoothscroll.js') }}"></script>


</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<!-- Fixed navbar -->
<div id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><b>BONO-CSR</b></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#home" class="smoothScroll">{{ trans('adminlte_lang::message.home') }}</a></li>
                <li><a href="#desc" class="smoothScroll">{{ trans('adminlte_lang::message.description') }}</a></li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else
                    <li><a href="/home">{{ Auth::user()->username }}</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>


<section id="home" name="home"></section>
<div id="headerwrap">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-12">
                <h1>
                    BONO<b>CSR</b> 
                    <img class="col-xs-3 hidden-xs hidden-sm hidden-md" src="{{ asset('/img/logo.png') }}">
                </h1>
                
                <hr>
                <h3>
                    SISTEMA INFORMÁTICO GERENCIAL PARA EL SISTEMA TRANSACCIONAL COMUNIDADES SOLIDARIAS RURALES (CSR).
                </h3>
                <h3>
                    <b>“EDUCACIÓN Y SALUD” y “ADULTO MAYOR”</b>
                </h3>
                <hr>
            </div>
            
        </div>
    </div> <!--/ .container -->
</div><!--/ #headerwrap -->


<section id="desc" name="desc"></section>
<!-- INTRO WRAP -->
<div id="intro">
    <div class="container">
        <div class="row centered">
            <h1>Diseñado para CSR</h1>
            <br>
            <br>
            <div class="col-lg-4">
                <img src="{{ asset('/img/intro01.png') }}" alt="">
                <h3>Diversos Usuarios</h3>
                <p>Seguridad sobre las salidas suministradas.</p>
            </div>
            <div class="col-lg-4">
                <img src="{{ asset('/img/intro02.png') }}" alt="">
                <h3>Administracion</h3>
                <p>Salidas Tacticas y Gerenciales en tiempo real.</p>
            </div>
            <div class="col-lg-4">
                <img src="{{ asset('/img/intro03.png') }}" alt="">
                <h3>Mantenimiento </h3>
                <p>Gestion gerencial y tactica de los diferentes bonos administrados.</p>
            </div>
        </div>
        <br>
        <hr>
    </div> <!--/ .container -->
</div><!--/ #introwrap -->


<div id="c">
    <div class="container">
        <p>
            <a href="#"></a><b>BONOCSR</b></a>.<br/>
            <strong>Copyright &copy; 2017 <a href="#">UES</a>.</strong></a>
            <br/>
            BONOCSR creado por Estudiantes 5to año Ingenieria de Sistemas Informaticos <a href="#">UES.</a>
            <br/>
            para Sistemas de Informacion Gerencial
        </p>

    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
