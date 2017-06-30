<!-- PLANTILLA ESTANDAR -->


@extends('layouts.app')
<!-- TEXTO DEL HEADER -->
@section('htmlheader_title')
	Menores faltando a clases
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
					<div class="panel-heading">Menores faltando a clases por municipio y canton por periodo asignado</div>
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
	                            	<td><input class="form-control" type="text" name="municipio" value="{{$municipio[0]->nombre}}" disabled="true"></td>
	                            	<td><input class="form-control" type="text" name="canton" value="{{$canton[0]->nombre}}" disabled="true"></td>
                                </tr>



                            </tbody>
                        </table>


                      
                    </div>	
                    <br>
                    <br>
                 </div>

						
						<table id="TablaLista" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Codigo</th>
										<th>Apellidos</th>
										<th>Nombres</th>
										<th>Fecha Nacimiento</th>
									</tr>
								</thead>
								<tbody>
									@foreach($u1 as $u)
										<tr>
											<td>{{$u->codigo}}</td>
											<td>{{$u->apellidos}}</td>
                                            <td>{{$u->nombre}}</td>
                                            <td>{{$u->fechaNacimiento}}</td>
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
