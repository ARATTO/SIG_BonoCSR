
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
                                    <select class="form-control" name="iddepartamento" id="departamento" data-placeholder="Seleccione el Departamento..."  required>
                                        @foreach ($departamento as $mun)
                                            <option value="{{ $mun->id }}">{{$mun->nombre}}</option>
                                        @endforeach
                                    </select>
                                
                                @else
                                    {!! form::label('#','departamento') !!}
                                @endif           
                  
                            <span class="input-group-addon" id="segundonombre">Municipio</span>
                                {!! Form::select('municipio',[null],null,['id'=>'municipio','class'=>'form-control','required'=>'true','placeholder'=>'Seleccione un Municipio']) !!}


                            <span class="input-group-addon" id="segundonombre">Canton</span>
                                {!! Form::select('canton',[null],null,['id'=>'canton','class'=>'form-control','required'=>'true','placeholder'=>'Seleccione un canton']) !!}              
                    </div>

                    <br>
                    <br>
                    <br>
                    <h3>
                     <span class="label label-primary">{{ trans('Seleccione el Periodo') }}</span>
                     </h3>
                     <hr>

                    <div class="input-group has-info form-inline">
                            <span class="input-group-addon" id="primernombre">Fecha de Inicio</span>

                                        
                        <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" data-provide="datepicker" placeholder="mes/dia/año" required="true" data-date-format="yyyy-mm-dd" onchange="compararFechas()"><br>



                            <span class="input-group-addon" id="segundonombre">Fecha Fin</span>
                                                   
                        <input type="date" class="form-control" id="fechaFin" name="fechaFin" data-provide="datepicker" placeholder="mes/dia/año" required="true" data-date-format="yyyy-mm-dd" onchange="compararFechas()"><br>  
                    </div>

        


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
        $('.datepicker').datepicker({
        startDate: '-3d'
        });


            function compararFechas() {
            var finicio = document.getElementById('fechaInicio').value;
            var ffin= document.getElementById('fechaFin').value;

                var fecha1 = new Date(finicio);
                var fecha2 = new Date(ffin);

                var fecha3 = fecha2 - fecha1;

                var fecha = (((fecha3/1000.0)/60.0)/60)/24.0;
                
                console.log(fecha);
                if (fecha>=28    ) {
                    document.getElementById('guardar').disabled= false;
                    
                }else{
                    document.getElementById('guardar').disabled = true;
                }
                
        }

    </script>
    
</script>
