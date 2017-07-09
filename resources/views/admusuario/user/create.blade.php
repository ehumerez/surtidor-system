@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			

			{!!Form::open(array('url'=>'admusuario/user','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

<h3>Nuevo Usuario</h3>

	<div class="row">
			

		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label for="usuario">ID Login</label>
				<input type="text" name="usuario" class="form-control" placeholder="ID Login...">
			</div>
		</div>
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label for="contraseña">Contraseña</label>
				<input type="text" name="contraseña" class="form-control" placeholder="Contraseña...">
			</div>
		</div>
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label>Carnet Trabajador</label>
				<select name="ci_nit_persona" class="form-control">
					@foreach($trabajadores as $tra)
						<option value="{{$tra->CI_T}}" selected>{{$tra->CI_T}} </option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label>Codigo Grupo</label>
				<select name="codigo_grupo" class="form-control">
					@foreach($grupos as $gru)
						<option value="{{$gru->CODIGO_G}}" selected>{{$gru->DESCRIPCION}} </option>
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