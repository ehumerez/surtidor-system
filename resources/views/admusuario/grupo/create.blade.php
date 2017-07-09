@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			

			{!!Form::open(array('url'=>'admusuario/grupo','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<h3>Nuevo Grupo</h3>

	<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion"  class="form-control" placeholder="Descripcion...">

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