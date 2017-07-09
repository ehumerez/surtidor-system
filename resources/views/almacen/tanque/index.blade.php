@extends ('layouts.admin')
@section ('contenido')



<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Estado de Tanques  <a href="tanque/create"><button class="btn btn-success">Crear Nuevo Tanque </button></a></h3>
		@include('almacen.tanque.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Codigo</th>
						<th>Capacidad Disponible</th>
						<th>Capacidad Minima</th>
						<th>Capacidad Maxima</th>
						<th>Codigo Combustible</th>
						<th>Descripcion de Combustible</th>
						<th>Estado de Tanque</th>
						<th>Opcion</th>

					@foreach($tanques as $tan)
						<tr>
						<td>{{$tan->CODIGO_T}}</td>
						<td>{{$tan->CAPACIDAD_DISPONIBLE}}</td>
						<td>{{$tan->CAPACIDAD_MINIMA}}</td>
						<td>{{$tan->CAPACIDAD_MAXIMA}}</td>
						<td>{{$tan->CODIGO_COMBUSTIBLE}}</td>
						<td>{{$tan->DESCRIPCION}}</td>
						<td>{{$tan->ESTADO}}</td>
						<td>
								<a href="{{URL::action('TanqueController@edit',$tan->CODIGO_T)}}"><button class="btn btn-info">Editar</button></a>
								
						</td>					
						</tr>
					
					@endforeach

					</thead>
					
				</table>	
		</div>
		
	</div>
</div>	

@endsection