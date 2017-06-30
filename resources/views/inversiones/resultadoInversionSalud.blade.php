
<!-- PLANTILLA ESTANDAR -->


@extends('layouts.app')
<!-- TEXTO DEL HEADER -->
@section('htmlheader_title')
	Inversion en salud
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
					<div class="panel-heading"> Inversion Inversion en Salud </div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
		{!! Form::open(['action' => 'inversionesController@crearPDF']) !!}
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
									<td>Programa niños menores de 5 años</td>
									<td>$ {{$dineroChildMenor}}</td>
								</tr>
								<tr>
									<td>Programa niños bono educacion</td>
									<td>$ {{$dineroChildEstudiante}}</td>
								</tr>
								<tr>
									<td>Programa niños con discapacidades</td>
									<td>$ {{$dineroChildDiscapacitados}}</td>
								</tr>
								<tr>
									<td>Programa mujeres embarazadas</td>
									<td>$ {{$dineroEmbarazada}}</td>
								</tr>
								<tr>
									<td><b>TOTAL</b></td>
									<td><B>$ {{$dineroEmbarazada + $dineroChildDiscapacitados +$dineroChildEstudiante+$dineroChildMenor}}</B></td>
								</tr>
								
							</tbody>
						</table>
						
						
					</div>
                <div class="form-group form-inline">
                    <h3><span class="label label-danger">{{ trans('Descargar Reporte') }}</span><h3>
                    <button id="pdf" type="submit" class="btn btn-success btn-lg"> {{trans('Descargar PDF')}} </button>
                </div>   

			<div style="display:none">
				
				<input class="form-control" type="text" name="fechaInicio" value="{{$fechaInicio}}" >

				<input class="form-control" type="text" name="fechaFin" value="{{$fechaFin}}" >

				<input class="form-control" type="text" name="canton" value="{{$canton[0]->nombre}}" >

				<input class="form-control" type="text" name="dineroChildMenor" value="{{$dineroChildMenor}}" >

				<input class="form-control" type="text" name="dineroChildEstudiante" value="{{$dineroChildEstudiante}}" >

				<input class="form-control" type="text" name="dineroChildDiscapacitados" value="{{$dineroChildDiscapacitados}}" >

				<input class="form-control" type="text" name="dineroEmbarazada" value="{{$dineroEmbarazada}}" >

			</div>				
					{!!Form::close()!!}	
				</div>
			</div>
		</div>
	</div>
	</section><!-- /.content -->
@endsection
