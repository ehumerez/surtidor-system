@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-dm-12 col-xs-12">
	<h3>Nuevo Ingreso</h3>
	@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors-> all() as $error) 
					<li>
					{{$error}}
					</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>
		{!!Form::open(array('url'=>'proceso/compra','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
<div class="row">	
<div class="col-lg-12 col-md-6 col-dm-12 col-xs-12">
	<div class="form-group">
			  <label for="nombre">Trabajador</label>
             <select name="codigo_trabajador" id="codigo_trabajador" class="form-control selectpicker">
              @foreach($trabajadors as $tr)
              <option value="{{$tr->CI_T}}">{{$tr->CI_T}}</option>
              @endforeach
			</select>
		</div>
</div>

<div class="col-lg-4 col-md-4 col-dm-4 col-xs-12">
	<div class="form-group">
			<label>Proveedor</label>
			<select name="proveedor" class="form-control">
				<option value="YPFB"> YPFB </option>
			</select>
		</div>
</div>
</div>	

<div class="row">
<div class="panel panel-primary">
<div class="panel-body">
	
<div class="col-lg-2 col-md-2 col-dm-12 col-xs-12">
	<div class="form-group">	
		<label>Combustibles</label>
		<select name="pcodigo_combustible" id="pcodigo_combustible" class="form-control">
			@foreach($combustibles as $com)
			<option value="{{$com->CODIGO_C}}">{{$com->CODIGO_C}}</option>
			@endforeach
		</select>
	</div>
</div>	

<div class="col-lg-2 col-md-2 col-dm-12 col-xs-12">
	<div class="form-group">
	<label for="cantidad">Cantidad</label>
	<input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">
	</div>
</div>

<div class="col-lg-2 col-md-2 col-dm-12 col-xs-12">
		<div class="form-group">
		<label for="precio_compra">Precio de Compra</label>
		<input type="number" name="pprecio_compra" id="pprecio_compra" class="form-control" placeholder="precio de compra">
		</div>
</div>

	
	<div class="col-lg-2 col-md-2 col-dm-12 col-xs-12">
		<div class="form-group">
		<button class="btn btn-primary" type="button"  id="bt_add" >Agregar</button>
		</div>
	</div>

		<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
			  <div class="table-responsive">
			<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
				<thead style="background-color:#caf5a9">
				<th>Opcciones</th>
				<th>Combustible</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Subtotal</th>
			</thead>
				<tfoot>
					<th>Total</th>
					<th></th>
					<th></th>
					<th></th>
					<th><h4 id="total">$/. 0.00</h4></th>
				</tfoot>
			<tbody></tbody>
			</table>
			</div>
		</div>
	</div>
	</div>
		<div class="col-lg-6 col-md-6 col-dm-6 col-xs-12" id="guardar">
					<div class="form-group">
				<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
						<button class="btn btn-primary"  type="submit">Guardar</button>
						<button class="btn btn-danger" type="reset">Cancelar</button>
					</div>
				</div>
		</div>
   		{!!Form::close()!!}  


@push ('scripts')
		<script>

		$(document).ready(function(){
			$('#bt_add').click(function(){
				agregar();
			});
		});	

		var cont=0;
		total=0;
		subtotal=[];
		$("#guardar").hide();
function agregar()
		{
			codigo_combustible=$("#pcodigo_combustible").val();
			combustible=$("#pcodigo_combustible option:selected").text();
			cantidad=$("#pcantidad").val();
			precio_compra=$("#pprecio_compra").val();
			
		if (codigo_combustible!="" && cantidad!="" && cantidad>0 && precio_compra!="")
		{
		subtotal[cont]=(1*precio_compra);
		total=total+subtotal[cont];
		var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="codigo_combustible[]" value="'+codigo_combustible+'">'+combustible+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_compra[]" value="'+precio_compra+'"></td><td>'+subtotal[cont]+'</td></tr>';
		cont++;
		limpiar();
		    $('#total').html("$/ " + total);
		evaluar();
		  $('#detalles').append(fila);
		
		}
	else
	{
		alert("Error al ingresar el detalle ");
	}
		}
function limpiar()
			 {
			    $("#pproveedor").val("");
				$("#pprecio_compra").val("");
				$("#pcantidad").val("");
			 }
function evaluar()
	{
		if(total>0)
		{
			$("#guardar").show();
		}
		else
		{
			$("#guardar").hide();
		}	
	}
function eliminar(index)
	{
		total=total-subtotal[index];
		$('#total').html("$/. "+total);
		$('#fila'+index).remove();
		evaluar();
	}
</script>
@endpush
@endsection