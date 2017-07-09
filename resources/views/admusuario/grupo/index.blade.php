@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	
		<h3 >Listado de Grupo<a href="grupo/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('admusuario.grupo.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Descripcion</th>
						<th>Opciones</th>
					</thead>
					@foreach($grupos as $gru)
					<tr>
						<td>{{$gru->CODIGO_G}}</td>
						<td>{{$gru->DESCRIPCION}}</td>
						<td>
							<a href="{{URL::action('GrupoController@edit',$gru->CODIGO_G)}}"><button class="btn btn-info">Editar</button></a>
							
						</td>
					</tr>
					
					@endforeach
				</table>	
		</div>
		{{$grupos->render()}}
	</div>
</div>	

@endsection