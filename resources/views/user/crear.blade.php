@extends('layouts.app')

@section('htmlheader_title')
	Crear Usuario
@endsection
        
@section('main-content')
    
        <section class="content">
            <div class="container spark-screen">    
                <div class="row">
                    <div class="col-md-8 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading"> Crear Usuario</div>
                                <div class="panel-body">
                                    @include('layouts.partials.flash')

                                    {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'files' => true]) !!}
                                        <div class="col-md-10 col-md-offset-1">
                                                <div class="input-group has-info form-inline">
                                                        <span class="input-group-addon" id="username">Nombre</span>
                                                        {!! form::text('username', null, ['class' => 'form-control', 'placeholder'=> 'Garcia Gonzales Herrera Mendoza', 'required']) !!}
                                                </div>
                                                <hr>
                                                <div class="input-group has-info form-inline">
                                                        <span class="input-group-addon" id="email">Correo</span>
                                                        {!! form::email('email', null, ['class' => 'form-control', 'placeholder'=> 'xxx_xx@ues.com', 'required']) !!}
                                                </div>
                                                <hr>
                                                <div class="input-group has-info form-inline">
                                                        <span class="input-group-addon"></span>
                                                        <h4><span for="chosen-select" class="label label-info">Seleccione Rol.</span><h4>
                                                            <select name="rol" id="chosen-select" data-placeholder="Seleccione rol a asignar...">
                                                                    <option value="1">Administrador</option>
                                                                    <option value="2">Gerencial</option>
                                                                    <option value="3">Tactico</option>
                                                            </select>
                                                       
                                                        <h4><span for="chosen-select" class="label label-info">Seleccione ONG.</span><h4>
                                                        @if($ong != null)
                                                            <select name="ONG_id" id="chosen-select_" data-placeholder="Seleccione ONG a asignar...">
                                                                @foreach ($ong as $o)
                                                                    <option value="{{ $o->id }}">{{$o->descripcion}}</option>
                                                                @endforeach
                                                            </select>
                                                        @else
                                                            {!! form::label('#','No existen ONG en el Sistema') !!}
                                                        @endif  
                                                </div>
                                                <hr>
                                                <div class="input-group has-warning form-inline">
                                                    <span class="input-group-addon" id="password">Contraseña</span>
                                                    <input type="password" name="password" class="form-control" placeholder="********" required>

                                                    <span class="input-group-addon" id="password_">Repetir Contraseña</span>
                                                    <input type="password" name="password_confirmation" class="form-control" placeholder="********" required>
                                                </div>
                                                <hr>
                                            
                                             
                                                <div class="form-group form-inline">
                                                    <button type="submit" class="btn btn-success btn-lg"> {{trans('bonomessage.Crear')}} </button>
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
