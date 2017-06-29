<!-- PLANTILLA ESTANDAR -->


@extends('layouts.app')
<!-- TEXTO DEL HEADER -->
@section('htmlheader_title')
	Menores Fallecidos
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
					<div class="panel-heading">Menores fallecidos por municipio y canton</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
				 <div class="col-md-10 col-md-offset-1">
					<div class="input-group has-info form-inline">
             
                  
                            <span class="input-group-addon" id="fechaInicio">Fecha Inicio</span>
                            <input class="form-control" type="text" name="fechaInicio" value="{{$fechaInicio}}" disabled="true">


                            <span class="input-group-addon" id="fechaFin">Fecha Fin</span>
                            <input class="form-control" type="text" name="fechaFin" value="{{$fechaFin}}" disabled="true">
                       
                            <span class="input-group-addon" id="canton">Municipio</span>
                            <input class="form-control" type="text" name="municipio" value="{{$municipio[0]->nombre}}" disabled="true">

                            <span class="input-group-addon" id="canton">Canton</span>
                            <input class="form-control" type="text" name="canton" value="{{$canton[0]->nombre}}" disabled="true">

                      
                    </div>	
                    <br>
                    <br>
                 </div>

						
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Codigo</th>
									<th>Apellido</th>
									<th>Nombre</th>
									<th>Fecha Nacimiento</th>
								</tr>
							</thead>
							<tbody>
					
								
							</tbody>
						</table>
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
	</section><!-- /.content -->
@endsection
