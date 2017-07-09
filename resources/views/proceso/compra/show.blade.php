@extends('layouts.admin')
@section('contenido')


<div class="row">	
<div class="col-lg-12 col-md-6 col-dm-12 col-xs-12">
	<div class="form-group">
			  <label for="nombre">Trabajador</label>
            <p>{{$notacompra->CI_T}}</p>
		</div>
</div>

<div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
	<div class="form-group">
			<label>Proveedor</label>
			<p>YPFB</p>
		</div>
</div>
</div>	

<div class="row">
<div class="panel panel-primary">
<div class="panel-body">
	

		<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
			  <div class="table-responsive">
			<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
				<thead style="background-color:#caf5a9">
				<th>Combustible</th>
				<th>Cantidad</th>
				<th>Precio</th>
			</thead>
				<tfoot>
					<th></th>
					<th></th>
					<th><h4 id="total">Total: {{$notacompra->total}}</h4></th>
				</tfoot>
			<tbody>
				@foreach($notacompracombustibles as $ncc)
				<tr>
					<td>{{$ncc->CODIGO_C}}</td>
					<td>{{$ncc->CANTIDAD}}</td>
					<td>{{$ncc->PRECIO}}</td>
				</tr>
				
				@endforeach
			</tbody>
			</table>
			</div>
		</div>
	</div>
	</div>
</div>
  



@endsection