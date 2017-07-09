@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Mangueras  <a href="manguera/create"><button class="btn btn-success">Nuevo   Manguera </button></a></h3>
		@include('almacen.manguera.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Descripcion</th>
						<th>Meter</th>
						<th>Estado</th>
						<th>Opcion</th>
					@foreach($mangueras as $inv)
						<tr>
						<td>{{$inv->ID_M}}</td>
						<td>{{$inv->DESCRIPCION}}</td>
						<td>{{$inv->METER}}</td>
						<td>{{$inv->ESTADO}}</td>
						
							<td>
								<a href="{{URL::action('MangueraController@edit',$inv->ID_M)}}"><button class="btn btn-info">Editar</button></a>
								
							</td>					
						</tr>
					
					@endforeach
					</thead>
					
				</table>	
		</div>
		{{$mangueras->render()}}
	</div>
</div>	

@endsection