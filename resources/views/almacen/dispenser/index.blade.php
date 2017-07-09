@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Dispensadores  <a href="dispenser/create"><button class="btn btn-success">Nuevo   Dispenser </button></a></h3>
		@include('almacen.dispenser.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Estado</th>
						<th>Opcion</th>
					@foreach($dispensers as $inv)
						<tr>
						<td>{{$inv->ID_B}}</td>
						<td>{{$inv->ESTADO}}</td>
							<td>
								<a href="{{URL::action('DispenserController@edit',$inv->ID_B)}}"><button class="btn btn-info">Editar</button></a>
								
							</td>					
						</tr>
					
					@endforeach
					</thead>
					
				</table>	
		</div>
		
	</div>
</div>	

@endsection