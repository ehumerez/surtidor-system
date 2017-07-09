@extends ('layouts.admin')
@section ('contenido')



<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Combustible   <a href="combustible/create"><button class="btn btn-success">Nuevo    Combustible </button></a></h3>
		@include('almacen.combustible.search')

	</div>
</div>
<?php
	session_start();
	echo "as". $_SESSION['username'] ;
	echo $_SESSION['fecha']; 
	echo $_SESSION['hora'] ."<br>";
	$s=$_SESSION['id'] +1;
	echo $s ;
	//echo $_SESSION['id'];
?>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Codigo</th>
						<th>Descripcion</th>
						<th>Precio de Venta</th>
						<th>Unidad de Medida</th>
						<th>Opcione</th>
						@foreach($combustibles as $com)
						<tr>
						<td>{{$com->CODIGO_C}}</td>
						<td>{{$com->DESCRIPCION}}</td>
						<td>{{$com->PRECIO}}</td>
						<td>{{$com->ID_UNIDAD_MEDIDA}}</td>
							<td>
								<a href=""><button class="btn btn-info">Editar</button></a>
								
							</td>					
						</tr>
					
					@endforeach
					</thead>
					
				</table>	
		</div>
		
	</div>
</div>	

@endsection