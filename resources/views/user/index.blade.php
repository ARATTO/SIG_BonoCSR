@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('tntmessage.Usuario') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.user.index_head')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						{{ trans('tntmessage.Usuario') }}
						<a href="{{ route('users.create') }}">
						<button type="button" class="btn btn-success btn-xs pull-right">
							{{ trans('tntmessage.CrearUsuario') }}
						</button>
						</a>
					</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
							<table id="TablaLista" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Genero</th>
                                        <th>Correo</th>
										<th>Nacimiento</th>
										<th>Rol</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Genero</th>
                                        <th>Correo</th>
										<th>Nacimiento</th>
										<th>Rol</th>
									</tr>
								</tfoot>
								<tbody>
									@foreach($users as $user)
										<tr>
											<td>{{$user->nombres}}</td>
                                            <td>{{$user->apellidos}}</td>
                                            <td>{{$user->genero}}</td>
											<td>{{$user->email}}</td>
                                            <td>{{$user->fechanacimiento}}</td>
                                            <td>{{$user->roles->nombrerol}}</td>
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
