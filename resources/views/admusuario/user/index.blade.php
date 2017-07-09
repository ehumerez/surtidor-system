@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Usuarios<a href="user/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('admusuario.user.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Usuario</th>
						<th>Contraseña</th>
						<th>Ci</th>
						<th>Codigo Grupo</th>
						<th>Opciones</th>
					</thead>
					@foreach($usuarios as $usu)
					<tr>
						<td>{{$usu->USUARIO}}</td>
						<td>{{$usu->CONTRASENA}}</td>
						<td>{{$usu->CI_NIT_PERSONA}}</td>
						<td>{{$usu->CODIGO_GRUPO}}</td>
						<td>
							<a href="{{URL::action('UsuarioController@edit',$usu->USUARIO)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$usu->USUARIO}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					
					@endforeach
				</table>	
		</div>
		{{$usuarios->render()}}
	</div>
</div>	

@endsection