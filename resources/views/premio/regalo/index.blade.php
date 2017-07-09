@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Premios<a href="regalo/create"><button class="btn btn-success">Nuevo Premio</button></a></h3>
		@include('premio.regalo.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id Premio</th>
						<th>Cantidad</th>
						<th>Descripcion</th>
						<th>Valor</th>
						<th>Opciones</th>
					</thead>
					@foreach($regalos as $re)
						<tr>
						<td>{{$re->ID_PR}}</td>
						<td>{{$re->CANTIDAD}}</td>
						<td>{{$re->DESCRIPCION}}</td>
						<th>{{$re->VALOR}}</th>
							<td>
								<a href="{{URL::action('RegaloController@edit',$re->ID_PR)}}"><button class="btn btn-info">Editar</button></a>
								
							</td>					
						</tr>
					
					@endforeach
				</table>	
		</div>
		
	</div>
</div>	

@endsection