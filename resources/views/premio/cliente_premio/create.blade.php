@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			

			{!!Form::open(array('url'=>'premio/cliente_premio','method'=>'POST','autocomplete'=>'off'))!!}
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
				<label>Id Premio</label>
				<select name="id_premio" class="form-control">
					@foreach ($premios as $cl)
						<option value="{{$cl->ID_PR}}" selected>{{$cl->ID_PR}}</option>	
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Estado</label>
				<select name="estado" class="form-control">
					<option value="estado">Aceptado</option>
					<option value="estado">No Aceptado</option>
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="cantidad">Cantidad</label>
				<input type="text" name="cantidad" class="form-control" placeholder="Cantidad...">
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