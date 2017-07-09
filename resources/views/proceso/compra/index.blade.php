@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Compras <a href="compra/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('proceso.compra.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Codigo Trabajador</th>
						<th>Proveedor</th>				
						<th>Opciones</th>
					</thead>
					@foreach($notacompras as $nc)
					<tr>
						<td>{{$nc->ID_NC}}</td>
						<td>{{$nc->CI_T}}</td>
						<td>{{$nc->PROVEEDOR}}</td>
						<td>
							<a href="{{URL::action('NotaCompraController@show',$nc->ID_NC)}}"><button class="btn btn-primary">Detalles</button></a>
							<a href=""><button class="btn btn-danger">Anular</button></a>
						</td>					
					</tr>
					
					@endforeach
				</table>	
		</div>
		
	</div>
</div>	



@endsection