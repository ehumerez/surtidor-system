@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			

			{!!Form::open(array('url'=>'perfil/personaadmi','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}



	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="ci_nit_p">Carnet de Identidad</label>
				<input type="text" name="ci_nit_p"  class="form-control" placeholder="Carnet de Identidad...">

			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="apeliido_paterno">Apellido Paterno</label>
				<input type="text" name="apellido_paterno" class="form-control" placeholder="Apellido Paterno...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="apeliido_materno">Apellido Materno</label>
				<input type="text" name="apellido_materno" class="form-control" placeholder="Apellido Materno...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Tipo de Persona</label>
				<select name="tipo_p" class="form-control">
					@foreach($tipo_personas as $tp)
						<option value="{{$tp->CODIGO_G}}" selected>{{$tp->DESCRIPCION}} </option>
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