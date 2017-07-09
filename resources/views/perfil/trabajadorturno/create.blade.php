@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			

			{!!Form::open(array('url'=>'perfil/trabajadorturno','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}



	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Turno</label>
				<select name="codigo_turno" class="form-control">
					@foreach($turnos as $tur)
						<option value="{{$tur->CODIGO_T}}" selected>{{$tur->DESCRIPCION}} </option>
					@endforeach
				</select>
			</div>
		</div>	
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Carnet</label>
				<select name="ci_trabajador" class="form-control">
					@foreach($trabajadores as $tra)
						<option value="{{$tra->CI_T}}" selected>{{$tra->CI_T}} </option>
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