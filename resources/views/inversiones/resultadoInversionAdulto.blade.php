
<!-- PLANTILLA ESTANDAR -->


@extends('layouts.app')
<!-- TEXTO DEL HEADER -->
@section('htmlheader_title')
	Inversion en Adulto Mayor
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
					<div class="panel-heading"> Inversion en el programa adulto mayor </div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
  		{!! Form::open(['action' => 'inversionesController@store']) !!}						
				 <div class="col-md-10 col-md-offset-1">
					<div class="input-group has-info form-inline">
             
                  
                            <span class="input-group-addon" id="fechaInicio">Fecha Inicio</span>
                            <input class="form-control" type="text" name="fechaInicio" value="{{$fechaInicio}}" disabled="true">


                            <span class="input-group-addon" id="fechaFin">Fecha Fin</span>
                            <input class="form-control" type="text" name="fechaFin" value="{{$fechaFin}}" disabled="true">

                            <span class="input-group-addon" id="canton">Canton</span>
                            <input class="form-control" type="text" name="canton" value="{{$canton[0]->nombre}}" disabled="true">

                      
                    </div>	
                    <br>
                    <br>
                 </div>

						
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Programa</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Programa adulto mayor</td>
									<td>$ {{$dineroAdultoMayor}}<td>
								</tr>

								<tr>
									<td><b>TOTAL</b></td>
									<td><B>$ {{$dineroAdultoMayor}}</B></td>
								</tr>
								
							</tbody>
						</table>
						
					</div>
                <div class="form-group form-inline">
                    <h3><span class="label label-danger">{{ trans('Crear PDF') }}</span><h3>
                    <button id="guardar" disabled type="submit" class="btn btn-success btn-lg"> {{trans('Procesar')}} </button>
                </div>   


					{!!Form::close()!!}			

				</div>
			</div>
		</div>
	</div>
	</section><!-- /.content -->
@endsection
