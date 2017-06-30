
<!-- PLANTILLA ESTANDAR -->


@extends('layouts.app')
<!-- TEXTO DEL HEADER -->
@section('htmlheader_title')
	Titulares por Genero
@endsection


@section('main-content')
    <!-- AQUI DEBEN LLAMAR EL HEADER PARA CADA VIEW CREADO EN "CONTENTHEADER"" -->
    <br>
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
                    <!-- AQUI DEBEN AGREGAR EL MENSAJE QUE QUIERAN EN EL PANEL HEAD -->
					<div class="panel-heading"> Titulares por Genero </div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
				 <div class="col-md-10 col-md-offset-1">
					<div class="input-group has-info form-inline">
             

                            <span class="input-group-addon">Desde</span>
                            <input class="form-control" type="text"  value="{{$edad_inicio}}" disabled="true">


                            <span class="input-group-addon">Hasta</span>
                            <input class="form-control" type="text"  value="{{$edad_fin}}" disabled="true">

                            <span class="input-group-addon">Canton</span>
                            <input class="form-control" type="text" value="{{$canton}}" disabled="true">

                      
                    </div>	
                    <br>
                    <br>
                 </div>

						
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Hombres</th>
									<th>Mujeres</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{$hombre}}</td>
									<td>{{$mujer}}</td>
								</tr>
							</tbody>
						</table>
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
	</section><!-- /.content -->
@endsection
