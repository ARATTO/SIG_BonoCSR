
<!-- PLANTILLA ESTANDAR -->


@extends('layouts.app')
<!-- TEXTO DEL HEADER -->
@section('htmlheader_title')
	Titulares por Genero
@endsection


@section('main-content')
    <!-- AQUI DEBEN LLAMAR EL HEADER PARA CADA VIEW CREADO EN "CONTENTHEADER"" -->
	
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

           {!! Form::open(['action' => 'MTitularesGenero@store']) !!}
                           	
            <div class="col-md-11 col-md-offset-1">
                <h3>
                    <span class="label label-primary">{{ trans('Seleccione el canton') }}</span>
                </h3>
                <hr>
                    <div class="input-group has-info form-inline">
                            <span class="input-group-addon" >Departamento</span>
                                @if($departamento != null)
                                    <select class="form-control" name="iddepartamento" id="departamento" data-placeholder="Seleccione el Departamento..."  required>
                                        @foreach ($departamento as $mun)
                                            <option value="{{ $mun->id }}">{{$mun->nombre}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    {!! form::label('#','departamento') !!}
                                @endif           
                  
                            <span class="input-group-addon" >Municipio</span>
                                {!! Form::select('municipio',[null],null,['id'=>'municipio','class'=>'form-control','required'=>'true','placeholder'=>'Seleccione un Municipio']) !!}

                            <span class="input-group-addon" >Canton</span>
                                {!! Form::select('canton',[null],null,['id'=>'canton','class'=>'form-control','required'=>'true','placeholder'=>'Seleccione un canton']) !!}              
                    </div>
                    
                    <hr>
                    <br>
                    <br>
                    <br>
                    <h3>
                        <span class="label label-primary">{{ trans('Seleccione el Rango de Edad') }}</span>
                    </h3>
                    <hr>

                    <div class="input-group has-info form-inline col-xs-5">
                        <span class="input-group-addon" >Desde</span>                                                                  
                            <input type="number" class="form-control" id="edad_inicio" name="edad_inicio" placeholder="18" required="true" min=18  onchange="compararEdades()"><br>
                        <span class="input-group-addon" >Hasta</span>                                                   
                            <input type="number" class="form-control" id="edad_fin" name="edad_fin" placeholder="22" required="true" min=18 onchange="compararEdades()"><br>  
                    </div>
                <hr>
                    

                <div class="form-group form-inline">
                    <h3><span class="label label-danger">{{ trans('') }}</span><h3>
                    <button id="guardar" disabled type="submit" class="btn btn-success btn-lg"> {{trans('Procesar')}} </button>
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

<script>
        
    function compararEdades() {
            var edad_inicio = document.getElementById('edad_inicio').value;
            var edad_fin = document.getElementById('edad_fin').value;

            var razon = edad_fin - edad_inicio;
                
            console.log(razon);
            if ( razon > 0 ) {
                document.getElementById('guardar').disabled= false;            
            }else{
                document.getElementById('guardar').disabled = true;
            }    
    }
</script>
    
</script>
