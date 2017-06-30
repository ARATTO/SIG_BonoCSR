<!-- PLANTILLA ESTANDAR -->


@extends('layouts.app')
<!-- TEXTO DEL HEADER -->
@section('htmlheader_title')
	Resultado niños que no fueron llevados a los controles
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
					<div class="panel-heading">Niños que no fueron llevados a los controles</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
				 <div class="col-md-10 col-md-offset-1">
					<div class="input-group has-info form-inline">
             
                  
                        <table>
                            <tbody>
	                            <tr>
	                             	<td>Fecha Inicio</td>
	                             	<td>Fecha Fin</td>
	                                <td>Municipio:</td>
		                            <td>Canton:</td>


	                            </tr>
	                            <tr>
		                            <td><input class="form-control" type="text" name="fechaInicio" value="{{$fechaInicio}}" disabled="true"></td>
		                            <td><input class="form-control" type="text" name="fechaFin" value="{{$fechaFin}}" disabled="true"></td>
	                            	<td><input class="form-control" type="text" name="municipio" value="{{$canton[0]->municipios->nombre}}" disabled="true"></td>
	                            	<td><input class="form-control" type="text" name="canton" value="{{$canton[0]->nombre}}" disabled="true"></td>
                                </tr>



                            </tbody>
                        </table>


                      
                    </div>	
                    <br>
                    <br>
                 </div>

						
						<table id="TablaLista" class="table table-striped table-bordered " cellspacing="0" width="70%">
								<thead>
									<tr>
										<th>Codigo</th>
										<th>Apellidos</th>
										<th>Nombres</th>
										<th>Titular</th>
										<th>Motivo</th>
									</tr>
								</thead>
								<tbody>
								@foreach($kidsCero as $kid)
									<tr>
									<td>{{$kid->codigo}}</td>
									<td>{{$kid->apellidos}}</td>
									<td>{{$kid->nombre}}</td>
									<td>{{$kid->titulares->apellido}} {{$kid->titulares->nombre}}</td>
									<td>{{$kid->bitacoraChildMenor[0]->motivoPorNoAsistir}}</td>
									</tr>
								@endforeach
				
								</tbody>
							</table>
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
	</section><!-- /.content -->
@endsection