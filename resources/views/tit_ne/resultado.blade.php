
<!-- PLANTILLA ESTANDAR -->


@extends('layouts.app')
<!-- TEXTO DEL HEADER -->
@section('htmlheader_title')
	Titulares Niños y Embarazadas "MONTO {{$cantidad}}"
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
					<div class="panel-heading"> Titulares Niños y Embarazadas "MONTO {{$cantidad}}" </div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
				 <div class="col-md-10 col-md-offset-1">
					<div class="input-group has-info form-inline">
             
                            <span class="input-group-addon">Desde</span>
                            <input class="form-control" type="text"  value="{{$fecha_inicio}}" disabled="true">

                            <span class="input-group-addon">Hasta</span>
                            <input class="form-control" type="text"  value="{{$fecha_fin}}" disabled="true">

                            <span class="input-group-addon">Canton</span>
                            <input class="form-control" type="text" value="{{$canton->nombre}}" disabled="true">

                            <span class="input-group-addon">Monto</span>
                            <input class="form-control" type="text" value="${{$cantidad}}" disabled="true">
                    </div>	
                    <br>
                    <br>
                 </div>
						<table class="table table-striped col-xs-7">
							<thead>
								<tr>
									<th>Bono Embarazadas</th>
									<th>Bono Niños</th>
                                    <th><b> TOTAL </b></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{$embarazadas}} titulares</td>
									<td>{{$ninos}} titulares</td>
                                    <td><b>{{$total}}</b> Titulares</td>
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
