
<!-- PLANTILLA ESTANDAR -->


@extends('layouts.app')

@section('htmlheader_title')
	INICIO
@endsection


@section('main-content')
    <!-- AQUI DEBEN LLAMAR EL HEADER PARA CADA VIEW CREADO EN "CONTENTHEADER"" -->
    <br>
	<div style=" display: flex; justify-content: center;font-weight: bold;font-size: xx-large">
	<br>
		<p>ETL</p>
	</div>
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
                    <!-- AQUI DEBEN AGREGAR EL MENSAJE QUE QUIERAN EN EL PANEL HEAD -->
					<div class="panel-heading"> Cargar Datos </div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')						
						
						


						

				{!! Form::open(['action' => 'EtlController@store','class'=>'form-horizontal','enctype'=>'multipart/form-data' ]) !!}
			          
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				      <div class="box-body">
   
				      	<div  class="form-group col-xs-12">
				             <label>Agregar Archivo de Excel </label>
				              <input name="archivo" id="archivo" type="file"   class="form-control"  required accept=".xls,.xlsx" />
				              <br>
				      	</div>
				      	
				     	 <div class="box-footer" >
						                  
        			     {!! form::submit('Guardar', ['class'=> 'btn btn-primary btn-lg' ]) !!}
				      	</div>
				      </div>

      			  {!! Form::close() !!}







					</div>
				</div>
			</div>
		</div>
	</div>
	</section><!-- /.content -->
@endsection
