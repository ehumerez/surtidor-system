@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			

			{!!Form::open(array('url'=>'perfil/trabajador','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}



	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Carnet</label>
				<select name="ci_nit_p" class="form-control">
					@foreach($personas as $per)
						<option value="{{$per->CI_NIT_P}}" selected>{{$per->CI_NIT_P}} </option>
					@endforeach
				</select>
			</div>
		</div>	
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="direcion">Direccion</label>
				<input type="text" name="direccion" class="form-control" placeholder="Direccion...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="email" class="form-control" placeholder="Email...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Tipo</label>
				<select name="tipo" class="form-control">
						<option value="A" selected>A</option>
						<option value="O" selected>O</option>
				</select>
			</div>
		</div>	
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fecha_inicio">Fecha Inicio</label>
				<input type="text" name="fecha_inicio" class="form-control" placeholder="Fecha Inicio...">
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