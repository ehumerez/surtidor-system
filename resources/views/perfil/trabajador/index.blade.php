@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Traabajadores<a href="trabajador/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('perfil.trabajador.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Ci Trabajador</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Dirreccion</th>
						<th>Email</th>
						<th>Tipo</th>
						<th>Fecha Inicio</th>
						<th>Cargo</th>
						<th>Opciones</th>
					</thead>
					@foreach($trabajadores as $per)
					<tr>
						<td>{{$per->CI_T}}</td>
						<td>{{$per->NOMBRE}}</td>
						<td>{{$per->APELLIDO_PATERNO}}</td>
						<td>{{$per->DIRECCION}}</td>
						<td>{{$per->EMAIL}}</td>
						<td>{{$per->TIPO}}</td>
						<td>{{$per->FECHA_INICIO}}</td>
						<td>{{$per->DESCRIPCION}}</td>	
						<td>
							<a href="{{URL::action('TrabajadorController@edit',$per->CI_T)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$per->CI_T}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					
					@endforeach
				</table>	
		</div>
		{{$trabajadores->render()}}
	</div>
</div>	

@endsection