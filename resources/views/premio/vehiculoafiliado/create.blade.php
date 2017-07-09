@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			

			{!!Form::open(array('url'=>'premio/vehiculoafiliado','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}



	<div class="row">
		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Ci Cliente</label>
				<select name="ci_cliente" class="form-control">
					@foreach ($clientefs as $cl)
						<option value="{{$cl->CI_C}}" selected>{{$cl->CI_C}}</option>	
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Vehiculo</label>
				<select name="p_vehiculo" class="form-control">
					@foreach ($vehiculos as $ve)
						<option value="{{$ve->PLACA}}" selected>{{$ve->PLACA}}</option>	
					@endforeach
				</select>
			</div>
		</div>
		
	</div>

	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>
			
			
			

			{!!Form::close()!!}

		</div>
	</div>

@endsection