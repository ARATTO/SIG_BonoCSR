
<!-- PLANTILLA ESTANDAR -->


@extends('layouts.app')
<!-- TEXTO DEL HEADER -->
@section('htmlheader_title')
	Inversion de bono y salud
@endsection


@section('main-content')
    <!-- AQUI DEBEN LLAMAR EL HEADER PARA CADA VIEW CREADO EN "CONTENTHEADER"" -->
	@include('layouts.partials.contentheader._default')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
                    <!-- AQUI DEBEN AGREGAR EL MENSAJE QUE QUIERAN EN EL PANEL HEAD -->
					<div class="panel-heading"> Inversion de bono y salud </div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')

           {!! Form::open(['action' => 'inversionesController@store']) !!}
                           	
            <div class="col-md-11 col-md-offset-1">
                <h3>
                    <span class="label label-primary">{{ trans('Seleccione el canton') }}</span>
                </h3>
                <hr>
                    <div class="input-group has-info form-inline">
                            <span class="input-group-addon" id="primernombre">Departamento</span>
                                @if($departamento != null)
                                    <select class="form-control" name="idhospital" id="departamento" data-placeholder="Seleccione el Departamento..."  >
                                        @foreach ($departamento as $mun)
                                            <option value="{{ $mun->id }}">{{$mun->nombre}}</option>
                                        @endforeach
                                    </select>
                                
                                @else
                                    {!! form::label('#','departamento') !!}
                                @endif           
                  
                            <span class="input-group-addon" id="segundonombre">Municipio</span>
                                {!! Form::select('municipio',['placeholder'=>'Selecciona'],null,['id'=>'municipio','class'=>'form-control']) !!}


                            <span class="input-group-addon" id="segundonombre">Canton</span>
                                {!! Form::select('canton',['placeholder'=>'Selecciona'],null,['id'=>'canton','class'=>'form-control']) !!}                               
                    </div>
            </div>           
			{!!Form::close()!!}			
					</div>
				</div>
			</div>
		</div>
	</div>
	</section><!-- /.content -->
@endsection
