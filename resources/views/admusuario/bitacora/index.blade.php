@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3 >Listado de Bitacora</h3>
		@include('admusuario.bitacora.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Ininio</th>
						<th>Fin</th>
						<th>Actor</th>
						<th>Opcion</th>
					</thead>
					@foreach($bitacoras as $bit)
					<tr>
						<td>{{$bit->ID_B}}</td>
						<td>{{$bit->INICIO}}</td>
						<td>{{$bit->FIN}}</td>
						<td>{{$bit->ACTOR}}</td>
						<td>
							<a href="{{URL::action('BitacoraController@show',$bit->ID_B)}}"><button class="btn btn-primary">Detalles</button></a>

						</td>
					</tr>
					
					@endforeach
				</table>	
		</div>
		{{$bitacoras->render()}}
	</div>
</div>	

@endsection