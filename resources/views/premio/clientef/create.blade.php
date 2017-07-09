@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			

			{!!Form::open(array('url'=>'premio/clientef','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<h3>Nuevo Cliente Fiel</h3>

	<div class="row">

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Carnet</label>
				<select name="ci_c" class="form-control">
					@foreach($personas as $per)
						<option value="{{$per->CI_NIT_P}}" selected>{{$per->CI_NIT_P}} </option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="direcion">Puntos Inicial</label>
				<input type="text" name="puntos_acumulados" class="form-control" placeholder="Puntos Inicial...">
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