@extends('layouts.app')

@section('htmlheader_title')
	Usuarios
@endsection
        
@section('main-content')

    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						Usuario
						<a href="{{ route('users.create') }}">
						<button type="button" class="btn btn-success btn-xs pull-right">
							Crear Usuario
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
										<th>Email</th>
										<th>Rol</th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
										<tr>
											<td>{{$user->username}}</td>
											<td>{{$user->email}}</td>
                                            <td>
												<!-- Es Administrador-->
												@if( $user->esAdministrador == 1 )
														<div class="btn-group btn-group-sm" role="group" aria-label="...">
															
															<a href="#" class="btn btn-danger" disabled="disabled">
																Administrador
															</a>
														</div>
												@else
													<!-- Es Gerente-->
													@if( $user->esGerencial == 1)
														<div class="btn-group btn-group-sm" role="group" aria-label="...">
															
															<a href="#" class="btn btn-success" disabled="disabled">
																Gerencial
															</a>
														</div>
													@else
														<!-- Es Gerente-->
														@if($user->esTransaccional == 1)
															<div class="btn-group btn-group-sm" role="group" aria-label="...">
																
																<a href="#" class="btn btn-info" disabled="disabled">
																	Tactico
																</a>
															</div>
														@endif
													@endif
												@endif

											</td>
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
