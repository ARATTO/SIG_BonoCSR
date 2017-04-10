@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('tntmessage.Usuario') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.user.paciente_head')
        <section class="content">
            <div class="container spark-screen">    
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ trans('tntmessage.Paciente') }}</div>
                                <div class="panel-body">
                                    @include('layouts.partials.flash')

                                    {!! Form::open(['route' => 'users.storepaciente', 'method' => 'POST', 'files' => true]) !!}
                                        <div class="col-md-4 col-md-offset-1">
                                            <div class="form-group">
                                                {!! form::label('Nombres','Nombres') !!}
                                                {!! form::text('nombres', null, ['class' => 'form-control', 'placeholder'=> 'Nombre de Usuario', 'required']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! form::label('Apellidos','Apellidos') !!}
                                                {!! form::text('apellidos', null, ['class' => 'form-control', 'placeholder'=> 'Apellidos de Usuario', 'required']) !!}
                                            </div>
                                            <div class="form-group">
                                                    <input type="checkbox" value="1" name="genero" id="checkboxGenero" class="form-control">
                                                    {!! form::label('checkbox',' Genero') !!}
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control datepicker" name="fechanacimiento">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-th"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>  
                                            <div class="form-group">
                                                {!! form::label('Direccion','Direccion') !!}
                                                {!! form::text('detalledireccion', null, ['class' => 'form-control', 'placeholder'=> 'Direccion de Usuario', 'required']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! form::label('Telefono','Telefono') !!}
                                                {!! form::text('telefono', null, ['class' => 'form-control', 'placeholder'=> '77777777', 'required']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! form::label('Telefono de Responsable','TelefonoRes') !!}
                                                {!! form::text('telefonoresponsable', null, ['class' => 'form-control', 'placeholder'=> '77777777', 'required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-md-offset-1">
                                            <div class="form-group">
                                                {!! form::label('Correo','Correo') !!}
                                                {!! form::text('email', null, ['class' => 'form-control', 'placeholder'=> 'xxxx_xx@ues.com', 'required']) !!}
                                            </div>
                                            <div class="form-group">    
                                                    <h4><span for="chosen-select" class="label label-info">Seleccione Estado Civil.</span><h4>
                                                    @if($estadoCivil != null)
                                                        <select name="idestadocivil" id="chosen-select" data-placeholder="Seleccione estado civil a asignar...">
                                                            @foreach ($estadoCivil as $estadoC)
                                                                <option value="{{ $estadoC->id }}">{{$estadoC->nombreestadocivil}}</option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        {!! form::label('#','No existen estados civiles en el Sistema') !!}
                                                    @endif    
                                            </div>
                                            <hr>  
                                            <div class="form-group">
                                                <h5><span class="label label-danger">**Contraseña inicial es numero de telefono</span><h5>
                                            </div>  
                                            <button type="submit" class="btn btn-success btn-lg"> {{trans('tntmessage.Crear')}} </button>
                                        </div>

                                    {!! Form::close() !!}                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section><!-- /.content -->
@endsection
